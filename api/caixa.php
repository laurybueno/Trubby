<?php

/*
 * Recebe comandos relacionados a vendas a serem computadas pela API Trubby.
 
  *	******GET********
		entrada: id_usuario
		saída: JSON com todas as vendas registradas para esse usuário
	OU
		entrada: id_usuario e id_caixa
		saída: JSON com informações completas sobre a venda especificada
		
 *	******POST********
	Cabe a esse método disparar os gatilhos que consomem itens em estoque. Da mesma forma, cabe a ele lançar os métodos responsáveis por checar se os ingredientes de itens em cardápio estão se esgotando
		entrada: JSON com todos os dados pertinentes à nova venda a ser computada, assim como todos os itens dessa venda
		saida: vazia
	
 *	******DELETE********	 
	Esse método deverá modificar o status de validade da venda em questão. Se ela estiver válida, ela ficará inválida. Se estiver inválida, ela deverá ficar válida.
		entrada: id_caixa na URL
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
    
    case 'DELETE':
        deleta();
        break;
    
    default:
        requisicao_incorreta();
        break;
}

// Encerra a execução da API após o disparo de uma função.
die();
 

?>