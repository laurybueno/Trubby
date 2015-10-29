<?php

/*
 *  Página responsável por receber as requisições sobre cardápio da API Trubby.
 *	******GET********
		entrada: id_usuario na URL da requisição
		saída: lista JSON com todos os itens atualmente no cardapio
	OU
		entrada: id_usuario, id_cardapio
		saída: JSON com dados detalhados do item de cardapio especificado
		
 *	******POST********
		entrada: JSON com todos os dados pertinentes a um novo item de cardapio, exceto o id_cardapio
		saida: vazia
	
*	******PUT********	
		entrada: JSON com todos os dados do item de cardapio a ser modificado, incluindo campos que não sofreram qualquer mudança
		saída: vazia
		
*	******DELETE********	 
		entrada: id_cardapio do item a ser deletado na URL da requisição
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

// ****************************************************************************
// GET: recebe dados na URL da requisição HTTP. Essas dados podem ser id_usuario ou id_usuario e id_cardapio.
// ****************************************************************************
function lista(){
	
	// Descobre se deve listar todos os itens de cardapio, ou todas as informações de um item específico
	if(!isset($_GET['id_cardapio'])){
		
		// realiza a query de listagem de itens de cardapio
		$sql = "SELECT * FROM `trubby`.`cardapio`";
		
		// organiza as informações em um array e converte em JSON
		
	}
	else {
		
		// lê dados detalhados do item de cardapio especificado
		
		// converte os dados para JSON e envia para o cliente
		
	}
	
}


// ****************************************************************************
// POST: recebe dados em formato JSON via corpo da requisição HTTP. Esses dados serão inseridos como um novo item de cardápio
// ****************************************************************************
function insere(){
	
	// executa a query de inserção de item no cardapio
	
}



// ****************************************************************************
// PUT: recebe dados em formato JSON via corpo da requisição HTTP. Esses dados serão parte de um UPDATE no banco
// ****************************************************************************
function modifica(){
	
	// realiza um update com todas as informações recebidas
	
}


// ****************************************************************************
// DELETE: recebe id_cardapio na URL da requisição para saber qual entrada deve ser apagada do banco
// ****************************************************************************
function deleta(){
	
	// realiza a query para deletar o item de cardapio especificado
	
}



?>
