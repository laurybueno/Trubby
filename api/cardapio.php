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

*	******OPTIONS********	
		entrada: id_usuario do cliente ativo
		saída: JSON com lita de dados completa de todos os itens de estoque e fichas técnicas que não estão listadas em cardápio
		
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
    
    case 'OPTIONS':
        opcoes();
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
           // troca pontos por vírgulas nos separadores decimais
           $linha['preco_venda'] = str_replace(".",",",$linha['preco_venda']);
           $linha['alerta_amarelo'] = str_replace(".",",",$linha['alerta_amarelo']);
           $linha['alerta_vermelho'] = str_replace(".",",",$linha['alerta_vermelho']);
           
           // salva resultado
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
		
		// troca pontos por vírgulas nos separadores decimais
		$retorno['preco_venda'] = str_replace(".",",",$retorno['preco_venda']);
		$retorno['alerta_vermelho'] = str_replace(".",",",$retorno['alerta_vermelho']);
		$retorno['alerta_amarelo'] = str_replace(".",",",$retorno['alerta_amarelo']);

		// converte os dados para JSON e envia para o cliente
		echo escreveJSON($retorno);
	
	}
	
}


// ****************************************************************************
// POST: recebe dados em formato JSON via corpo da requisição HTTP. 
// ****************************************************************************
function insere(){
	
	$entrada = leJSON();
	
	// corrige separadores decimais
	$entrada['preco_venda'] = str_replace(",",".",$entrada['preco_venda']);
	$entrada['alerta_amarelo'] = str_replace(",",".",$entrada['alerta_amarelo']);
	$entrada['alerta_vermelho'] = str_replace(",",".",$entrada['alerta_vermelho']);
	
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
	
	// corrige separadores decimais
	$entrada['preco_venda'] = str_replace(",",".",$entrada['preco_venda']);
	$entrada['alerta_amarelo'] = str_replace(",",".",$entrada['alerta_amarelo']);
	$entrada['alerta_vermelho'] = str_replace(",",".",$entrada['alerta_vermelho']);
	
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
// OPTIONS: recebe um id_usuario pela URL da requisição e retorna todos os itens de estoque e fichas que não estão listados em cardápio no momento
// ****************************************************************************
function opcoes(){
	
	$query = "
		SELECT fichas.id_produto, produto.nome FROM fichas INNER JOIN produto ON fichas.id_produto=produto.id_produto
		WHERE fichas.id_usuario = $_GET[id_usuario] AND fichas.id_produto NOT IN (SELECT cardapio.id_produto FROM cardapio WHERE cardapio.id_usuario = $_GET[id_usuario])

		UNION

		SELECT estoque.id_produto, produto.nome FROM estoque INNER JOIN produto ON estoque.id_produto=produto.id_produto
		WHERE estoque.id_usuario = $_GET[id_usuario] AND estoque.id_produto NOT IN (SELECT cardapio.id_produto FROM cardapio WHERE cardapio.id_usuario = $_GET[id_usuario])
		";
	
	$resultado = mysql_query($query);
	
	$retorno = array();
	for($i = 0; $linha = mysql_fetch_assoc($resultado); $i++){
		$retorno[$i] = $linha;
	}
	
	echo escreveJSON($retorno);
	
}	


// ****************************************************************************
// DELETE: recebe id_cardapio e id_usuario na URL da requisição para saber qual entrada deve ser apagada do banco
// ****************************************************************************
function deleta(){
	
	// realiza a query para deletar o item de cardapio especificado
	mysql_query("
		DELETE FROM `cardapio`
			WHERE `id_produto` = '".$_GET[id_produto]."' AND `id_usuario` = '".$_GET[id_usuario]."';
	") or die(mysql_error());
	
}



?>