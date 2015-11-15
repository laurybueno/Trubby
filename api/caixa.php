<?php

/*
 * Recebe comandos relacionados a vendas a serem computadas pela API Trubby.
 
  *	******GET********
		entrada: id_usuario
		saída: JSON com todas as vendas registradas para esse usuário
	OU
		entrada: id_venda
		saída: JSON com informações completas sobre a venda especificada
		
		
 *	******POST********
	Cabe a esse método disparar os gatilhos que consomem itens em estoque. Da mesma forma, cabe a ele lançar os métodos responsáveis por checar se os ingredientes de itens em cardápio estão se esgotando
		entrada: JSON com todos os dados pertinentes à nova venda a ser computada, assim como todos os itens dessa venda
		saida: vazia
	
 *	******DELETE********	 
	Esse método deverá apagar a venda especificada e reverter os gatilhos de estoque
		entrada: id_venda na URL
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
        cancela();
        break;
    
    default:
        requisicao_incorreta();
        break;
}

// Encerra a execução da API após o disparo de uma função.
die();

// ****************************************************************************
// POST: cadastra nova venda e dispara os gatilhos de diminuição de estoque
// ****************************************************************************
function insere(){
    
    // recebe todos os elementos da venda especificada
    $entrada = leJSON();
    
    
    // insere a venda base na tabela "vendas"
    mysql_query("
        INSERT INTO `vendas` (
            id_usuario
        ) VALUES (
            '".$entrada[id_usuario]."'
        );
    ");
    
    // recupera o id escolhido pelo banco para a nova venda
    $id = mysql_insert_id();
    
    
    // insere cada um dos itens da venda especificada em "vendas_itens"
    foreach($entrada[venda_itens] as $item){
        
        mysql_query("
            INSERT INTO `vendas_itens` (
                id_venda,
                id_produto,
                quantidade,
                preco_venda
            ) VALUES (
            '".$id."','".$item[id_produto]."','".$item[quantidade]."','".$item[preco_venda]."');
        ");
        
    }
    
    
    // dispara gatilhos para remover os ingredientes usados do estoque
    consomeEstoque($entrada['venda_itens']);
    
}

/*
 *  Gatilhos de remoção de itens do estoque serão disparados pela função a seguir.
 * Se um parâmetro FALSE for recebido pelo atributo "remocao", a função tentará restituir os itens removidos de estoque pelas vendas especificadas.
 */
function consomeEstoque($vendas, $remocao = TRUE){
    
    
    
}


// ****************************************************************************
// GET: lista todas as vendas de um dado usuário, ou lista os detalhes de uma venda específica
// Envia por URL o id_usuario ou o id_venda
// Exemplo de requisição /api/caixa.php?id_usuario=14
// ****************************************************************************
function lista(){
    
    // Se o id_venda não estiver definido, a API vai listar todas as vendas do usuário dado
    if(!isset($_GET['id_venda'])){
    
        $resultado = mysql_query("
            SELECT vendas.*, 
                    SUM(preco_venda) as total_venda 
                FROM vendas INNER JOIN vendas_itens 
                    ON vendas.id_venda=vendas_itens.id_venda 
                WHERE 
                    id_usuario='".$_GET[id_usuario]."' 
                GROUP BY vendas.id_venda;
        ");
        
        $retorno = array();
        for($i = 0; $linha = mysql_fetch_assoc($resultado); $i++)
            $retorno[$i] = $linha;
        
        echo escreveJSON($retorno);
        
    }
    else{
        // Se o id_venda estiver definido, os detalhes da venda serão exibidos
        $resultado = mysql_query("SELECT `vendas_itens`.*, `produto`.nome 
                                        FROM `vendas_itens` LEFT JOIN `produto` 
                                            ON `vendas_itens`.id_produto = `produto`.id_produto 
                                        WHERE `vendas_itens`.id_venda = $_GET[id_venda]"
                                );
        
        $retorno = array();
        $retorno['total_venda'] = 0;
        for($i = 0; $linha = mysql_fetch_assoc($resultado); $i++){
            $retorno[$i] = $linha;
            $retorno['total_venda'] += $linha['preco_venda'];
        }
        
        echo escreveJSON($retorno);
        
    }
    
}

// ****************************************************************************
// DELETE: deleta uma venda já computada na base de dados
// Envia por URL o id do usuario através da variavel id_venda
// Exemplo de requisição /api/caixa.php?id_venda=10
// ****************************************************************************
function cancela(){
    
    $sql = "DELETE FROM vendas WHERE id_venda = $_GET[id_venda]";
    
    mysql_query($sql) or die("Erro ao deletar a venda específica.");
    
    // dispara gatilhos para devolver itens consumidos ao estoque
    
    
}

?>