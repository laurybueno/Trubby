<?php

/*
 * Ponto de entrada para o controle de receitas na API Trubby.
 * Ao receber GET com id_usuario, ele retorna todas as receitas cadastradas para esse dado usuário.
 * Ao receber GET com id_produto e id_usuario, ele retorna todos os dados e da receita especificada, assim como todos os ingredientes que ela contém.
 
 
 * Ao receber POST, o sistema testa o JSON no body da request. É esperado que esse body contenha todos os campos da receita e todos os campos dos ingredientes correspondentes a ela.
 * Nesse caso, a receita será entendida como nova e incluída no banco de dados.
 
 * Ao receber PUT, a API entende que deve atualizar uma receita já existente, assim como seus ingredientes. O corpo da requisição deverá trazer um JSON com todos os dados (modificados e não modificados)
 
 * Ao receber um DELETE, a requisição deverá incluir id_usuario e id_produto na URL. A API tentará deletar a receita e todos os seus ingredientes do banco de dados.
 *
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

// após a realização de uma operação, encerra a execução do script
die();


// ****************************************************************************
// GET: recebe dados na URL da requisição HTTP. Essas dados podem ser id_usuario ou id_usuario e id_produto.
// ****************************************************************************
function lista(){
    
    // Se o id_produto não foi recebido, então lista todas as receitas do usuário dado
    if(!isset($_GET['id_produto'])){
        
        $sql = "SELECT * FROM `fichas` WHERE `id_usuario` = '".$_GET[id_usuario]."'";

        $resultado = mysql_query($sql);
        
        $retorno = array();
        
        // Lê todas as linhas de resultado e prepara o array que será transformado em JSON
        for($i = 0; $linha = mysql_fetch_assoc($resultado); $i++){
           $retorno[$i] = $linha;
        }
        
        // print_r($retorno);
        
        // envia o JSON para o cliente
        echo escreveJSON($retorno);
        
    }
    else {
        // Se foi recebido também um id_produto, então entrega todos os dados relativos a essa receita, incluindo dados de ingredientes
        $sql = "SELECT * FROM `fichas` WHERE `id_produto` = '".$_GET[id_produto]."'";
        $resultado = mysql_query($sql);
        
        $resposta = mysql_fetch_assoc($resultado);
        
        // encontra todos os ingredientes dessa receita e os armazena no array de resposta
        $sql = "SELECT * FROM  `ingredientes_uso` WHERE `id_ficha` = '".$_GET[id_produto]."'";
        $resultado = mysql_query($sql);
        
        $resposta['ingredientes'] = array();
        
        for($i = 0; $linha  = mysql_fetch_assoc($resultado); $i++){
            $resposta['ingredientes'][$i] = $linha;
        }
        
        // print_r($resposta);
        
        echo escreveJSON($resposta);
        
    }
}


// ****************************************************************************
// POST: recebe dados JSON no corpo da requisição HTTP
// ****************************************************************************
function insere(){
    
	// decodifica o JSON em arrays para realizar a inserção
	$entrada = leJSON();
	
	// De posse dos dados em arrays, realiza as inserções necessárias no banco de dados
	// primeiro, a ficha técnica deve ser inserida e seu id no banco de dados deve ser recebido pelo programa
	
	mysql_query("
	            INSERT INTO `produto` (nome) VALUES ('".$entrada[nome_tecnico]."');
	") or die("Problema na inserção de produto");
	
	$id = mysql_insert_id();
	
	
	$sql =  "INSERT INTO `trubby`.`fichas` (
                `id_produto`,
                `id_usuario`, 
                `nome_tecnico`, 
                `modo_preparo`, 
                `seq_montagem`, 
                `equipamento`,
                `n_porcoes`,
                `peso_porcao`,
                `obs`,
                `foto`
                )
                VALUES (
                    '$id', '$entrada[id_usuario]','$entrada[nome_tecnico]','$entrada[modo_preparo]','$entrada[seq_montagem]','$entrada[equipamento]','$entrada[n_porcoes]','$entrada[peso_porcao]','$entrada[obs]', '$entrada[foto]'
                );";
    
    
    $resultado = mysql_query($sql);
	
	
	// se não houver ingredientes para serem inseridos, encerra a execução
	if(!is_array($entrada['ingredientes'])) return;
	
	// realiza as inserções de ingredientes na tabela de ingredientes_uso do banco de dados
	foreach($entrada['ingredientes'] as $ingrediente){
	    $sql =  "INSERT INTO `trubby`.`ingredientes_uso` (
                `id_ficha`, 
                `id_estoque`, 
                `quantidade_liq`,
                `quantidade_brt`,
                `rendimento`,
                `tipo`,
                `preco_extra`
                )
                VALUES (
                    '$id','$ingrediente[id_estoque]','$ingrediente[quantidade_liq]','$ingrediente[quantidade_brt]','$ingrediente[rendimento]','$ingrediente[tipo]','$ingrediente[preco_extra]'
                );";
    $resultado = mysql_query($sql);
	}

}


// ****************************************************************************
// PUT: recebe dados JSON no corpo da requisição HTTP e modifica uma receita já esxistente no banco de dados.
// Vale observar que o JSON virá com todos os dados de receita e ingredientes, inclusive os que não foram modificados.
// ****************************************************************************
function modifica(){
    // decodifica o JSON em arrays para realizar as modificações
	$entrada = leJSON();
	
	// Modifica a receita no banco de dados
	$sql =  "UPDATE  `trubby`.`fichas` SET  
    	        `nome_tecnico` =  '".$entrada[nome_tecnico]."',
    	        `modo_preparo` =  '".$entrada[modo_preparo]."',
    	        `seq_montagem` =  '".$entrada[seq_montagem]."',
    	        `equipamento` =  '".$entrada[equipamento]."',
    	        `n_porcoes` =  '".$entrada[n_porcoes]."',
    	        `peso_porcao` =  '".$entrada[peso_porcao]."',
    	        `obs` =  '".$entrada[obs]."',
    	        `foto` =  '".$entrada[foto]."'
	        WHERE  `fichas`.`id_produto` ='".$entrada[id_produto]."';";
	        
    $resultado = mysql_query($sql) or die("Problema ao modificar ficha técnica");
	
	// Modifica cada um dos ingredientes associados a essa receita
	foreach($entrada['ingredientes'] as $ingrediente){
	    
	    $sql = "UPDATE  `trubby`.`ingredientes_uso` SET  
	                `quantidade_liq` =  '".$ingrediente[quantidade_liq]."',
	                `quantidade_brt` =  '".$ingrediente[quantidade_brt]."',
	                `rendimento` =  '".$ingrediente[rendimento]."',
	                `preco_extra` =  '".$ingrediente[preco_extra]."'
                WHERE  `ingredientes_uso`.`id_ficha` = ".$ingrediente[id_ficha]." 
                AND  `ingredientes_uso`.`id_estoque` = ".$ingrediente[id_estoque].";";
                
	    $resultado = mysql_query($sql) or die("Problema ao atualizar os ingredientes em uso");
	}
	
}


// ****************************************************************************
// DELETE: recebe id_usuario e id_produto na URL da requisição, ou seja, via GET.
// A função a seguir também deleta todos os ingredientes usados pela receita especificada na tabela ingredientes_uso
// ****************************************************************************
function deleta(){
    
    // deleta todos os ingredientes da ficha técnica
    $sql = "DELETE FROM `trubby`.`ingredientes_uso` WHERE `ingredientes_uso`.`id_ficha` = ".$_GET[id_produto].";";
    mysql_query($sql);
    
    // deleta a própria ficha técnica
    $sql = "DELETE FROM `trubby`.`fichas` 
                WHERE `fichas`.`id_produto` = ".$_GET['id_produto'].";";
    mysql_query($sql);
    
}

?>