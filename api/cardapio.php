<?php

/*
 *  Página responsável por receber as requisições sobre cardápio da API Trubby.
 *	******GET********
		entrada: id_usuario na URL da requisição
		saída: lista JSON com todos os itens atualmente no cardapio
	OU
		entrada: id_usuario, id_produto
		saída: JSON com dados detalhados do item de cardapio especificado
		
 *	******POST********
		entrada: JSON com todos os dados pertinentes a um novo item de cardapio
		saida: vazia
	
*	******PUT********	
		entrada: JSON com todos os dados do item de cardapio a ser modificado, incluindo campos que não sofreram qualquer mudança
		saída: vazia
		
*	******DELETE********	 
		entrada: id_cardapio e id_usuario do item a ser deletado na URL da requisição
		saída: vazia
 
 */

 
require_once("functions.inc.php");
require_once("../connection.php");


// ****************************************************************************
// Checa qual o tipo de requisição recebida e encaminha o comando para a função adequada
// ****************************************************************************
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        lista();
        break;
    
    case 'POST':
        insere();
        break;
    
    case 'PUT':
        modifica();
        break;
    
    case 'DELETE':
        deleta();
        break;
    
    default:
        requisicao_incorreta();
        break;
}

// Encerra a execução da API após o disparo de uma função.
die();
// Vale observar que tanto id_produto quanto id_usuario não podem ser modificados por aqui.

// ****************************************************************************
// GET: recebe dados na URL da requisição HTTP. Essas dados podem ser id_usuario ou id_usuario e id_produto.
// ****************************************************************************
function lista(){
	
	// Descobre se deve listar todos os itens de cardapio, ou todas as informações de um item específico
	if(!isset($_GET['id_produto'])){
		
		// realiza a query de listagem de itens de cardapio
		$sql = "SELECT * FROM 
					`cardapio` INNER JOIN `produto` 
					ON cardapio.id_produto = produto.id_produto 
				WHERE `id_usuario` = '".$_GET[id_usuario]."'";
				
		$resultado = mysql_query($sql);
		
		// organiza as informações em um array e converte em JSON
		$retorno = array();
		for($i = 0; $linha = mysql_fetch_assoc($resultado); $i++){
           $retorno[$i] = $linha;
        }
		
		echo escreveJSON($retorno);
		
	}
	else {
		
		// lê dados detalhados do item de cardapio especificado
		$resultado = mysql_query("
			SELECT * FROM  
					`cardapio` INNER JOIN `produto` 
					ON cardapio.id_produto = produto.id_produto
				WHERE `id_usuario` = '".$_GET[id_usuario]."' AND `id_produto` = '".$_GET[id_usuario]."';
		");
		

		$retorno = mysql_fetch_assoc($resultado);

		// converte os dados para JSON e envia para o cliente
		echo escreveJSON($retorno);
		
	}
	
}


// ****************************************************************************
// POST: recebe dados em formato JSON via corpo da requisição HTTP. 
// ****************************************************************************
function insere(){
	
	$entrada = leJSON();
	
	// executa a query de inserção de item no cardapio
	mysql_query("
		INSERT INTO `cardapio` (
			id_produto,
			id_usuario,
			preco_venda,
			alerta_amarelo,
			alerta_vermelho
		) VALUES (
			'".$entrada[id_produto]."','".$entrada[id_usuario]."','".$entrada[preco_venda]."','".$entrada[alerta_amarelo]."','".$entrada[alerta_vermelho]."'
		);
	");
	
}



// ****************************************************************************
// PUT: recebe dados em formato JSON via corpo da requisição HTTP. Esses dados serão parte de um UPDATE no banco.
// Vale observar que tanto id_produto quanto id_usuario não podem ser modificados por aqui.
// ****************************************************************************
function modifica(){
	
	$entrada = leJSON();
	
	// realiza um update com todas as informações recebidas
	mysql_query("
		UPDATE `cardapio` SET
			`preco_venda` = '".$entrada[preco_venda]."',
			`alerta_amarelo` = '".$entrada[alerta_amarelo]."',
			`alerta_vermelho` = '".$entrada[alerta_vermelho]."'
		WHERE `id_produto` = '".$entrada[id_produto]."'
	");
	
}


// ****************************************************************************
// DELETE: recebe id_cardapio e id_usuario na URL da requisição para saber qual entrada deve ser apagada do banco
// ****************************************************************************
function deleta(){
	
	$entrada = leJSON();
	
	// realiza a query para deletar o item de cardapio especificado
	mysql_query("
		DELETE FROM `cardapio`
			WHERE `id_produto` = '".$_GET[id_produto]."' AND `id_usuario` = '".$_GET[id_usuario]."';
	") or die(mysql_error());
	
}



?>
