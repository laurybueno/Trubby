<?php

require_once("functions.inc.php");
require_once("connection.php");

/*
 * Ao receber um GET com id de usuário, esta página deverá retornar a lista de itens no estoque do dado usuário.
 * Ao receber um POST, ela deverá inserir um novo item no estoque do usuário especificado ou modificar esse item, caso o id_produto já esteja especificado na requisição.
 * Ao receber um DELETE, ela vai deletar o item especificado.
 */


// ****************************************************************************
// Checa qual o tipo de requisição recebida e encaminha o comando para a função adequada
// ****************************************************************************
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        insere_modifica();
        break;

    case 'GET':
        lista();
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
// Requisição POST: área de inserção/modificação de item no estoque
// ****************************************************************************
// Requisição POST envia 6 campos para esta página: id_usuario, id_produto, nome, quantidade, quantidade_tipo, custo.
// Se o campo id_estoque for igual a 0, o webService entenderá que o item deve ser novo e fará a inserção.
// Caso contrário, ele entenderá que se trata de uma atualização e fará as operações devidas para atualizar o item.
function insere_modifica(){

    // Recebe os dados formatados em JSON entregues no corpo da requisição HTTP
    $entrada = leJSON();

    // Se a requisição contiver erros, a execução será interrompida e o cliente receberá um código 400
    if(!isset($entrada['id_produto'])) requisicao_incorreta();

    // corrige a separação decimal do campo custo
    $entrada['custo'] = str_replace(",",".",$entrada['custo']);

    // checa se a operação será uma inserção ou uma atualização
    if($entrada['id_produto'] == 0){ // realiza a inserção

        // primeiro insere na tabela de produto e resgata o id_produto escolhido pelo banco de dados
        $sql = "INSERT INTO `produto` (nome) VALUES ('".$entrada[nome]."')";
        mysql_query($sql) or die("Erro na inserção de produto");
        $id = mysql_insert_id();

        // realiza a inserção equivalente na tabela de estoque
        $sql = "
            INSERT INTO `estoque` (id_produto,id_usuario,quantidade,quantidade_tipo,custo)
                VALUES
                    ('".$id."',
                    '".$entrada['id_usuario']."',
                    '".$entrada['quantidade']."',
                    '".$entrada['quantidade_tipo']."',
                    '".$entrada['custo']."')";


        mysql_query($sql) or die("Erro na inserção em estoque");

    }
    else { // realiza a atualização
        // recupera os dados atuais sobre o item que será modificado
        $item = mysql_fetch_array(mysql_query("SELECT * FROM `estoque` WHERE id_produto='".$entrada['id_produto']."'"))
            or die("Erro na recuperação dos dados antigos");

        // calcula os novos valores de quantidade de preço por unidade
        $item['custo'] = ($item['quantidade']*$item['custo']+$entrada['quantidade']*$entrada['custo'])/($entrada['quantidade'] + $item['quantidade']);
        $item['quantidade'] += $entrada['quantidade'];

        // atualiza as informações de estoque no banco de dados
        mysql_query("
                    UPDATE estoque SET
                        quantidade='".$item['quantidade']."',
                        quantidade_tipo='".$entrada['quantidade_tipo']."',
                        custo='".$item['custo']."'
                    WHERE
                        id_produto='".$entrada['id_produto']."'
                    ")
                    or die("Erro na atualização de estoque");

        // como o nome fantasia da ficha pode ter sido modificado também, atualiza a entrada na tabela de produto também
        mysql_query("
                    UPDATE produto SET
                        nome='".$entrada['nome']."'
                    WHERE
                        id_produto='".$entrada['id_produto']."'
        ") or die("Erro na atualização de produto");

    }

}


// ****************************************************************************
// Requisição DELETE: área que deleta item no estoque
// ****************************************************************************
// Requisição DELETE envia 2 campos para esta página via URI (acessível pelo array _GET): id_usuario, id_produto.
function deleta(){

    // Se houver um erro na requisição, retorna BAD REQUEST
    if(!isset($_GET['id_usuario']) || $_GET['id_usuario']==0) requisicao_incorreta();

    // Se houver algum erro na requisição, encerra o programa
    if(! ( isset($_GET['id_produto']) && $_GET['id_produto']!=0 && isset($_GET['id_produto']) && $_GET['id_produto'] != 0 )) requisicao_incorreta();


    // o comando a seguir elimina os dados tanto na tabela produto, quanto na tabela estoque
    mysql_query("DELETE FROM produto
                WHERE
                id_produto='".$_GET['id_produto']."'
                ") or
                die("Erro ao deletar dados.");

}


// ****************************************************************************
// Requisição GET: área que prepara a lista de itens de estoque do usuário determinado
// ****************************************************************************
// Exemplo de requisição /api/estoque.php?id_usuario=14
function lista(){

    $idusuario = $_GET['id_usuario'];
    $sql = "SELECT * FROM `produto` INNER JOIN `estoque` ON produto.id_produto = estoque.id_produto WHERE id_usuario = '$idusuario'";
    error_log($sql);
    $aux = mysql_query($sql);
    $resultado = queryParaArray($aux);

    // print_r($resultado);

    // troca o separador decimal do campo de custo de ponto por vírgula
    for($i = 0; $i < sizeof($resultado); $i++){
        $resultado[$i]['custo'] = str_replace(".",",",$resultado[$i]['custo']);
    }

    // Formata os dados em um JSON
    $json_response = json_encode($resultado);

    // Declara o tipo de conteúdo a ser enviado para o cliente
    header('Content-Type: application/json; charset=utf-8');

    // Envia os dados
    echo $json_response;

}

// ********************************************************
//------------------FUNÇÕES VALIDADORAS------------------\\
// ********************************************************

// Função que valida os dados da inserção/modificação, sendos estes em especifico Quantidade e Custo
function validaInsercao(){

    $erro = FALSE;

    foreach ($_POST as $chave => $valor) {
        // Remove todas as tags HTML
    	// Remove os espaços em branco do valor
    	$$chave = trim(strip_tags($valor));

    	// Verifica se tem algum valor nulo
    	if (empty($valor)) {
    	    $erro = TRUE;
    	}
    }

    // Verifica se $quatidade realmente existe e se é um número.
    if (!isset($_POST['quantidade']) || !is_numeric($_POST['quantidade']) || !maiorIgualZero($_POST['quantidade'])) {
        $erro = TRUE;
    }

    // Verifica se $precoUnidade realmente existe e se esta no formato ideal.
    if (!isset($_POST['custo']) || !formatoReal($_POST['custo']) || !maiorIgualZero($_POST['custo'])) {
    	$erro = TRUE;
    } else {
        $_POST['custo'] = str_replace(",",".", $_POST['custo']);
    }

    return $erro;

}

// ********************************************************




// ********************************************************
//------------------FUNÇÕES AUXILIARES------------------\\
// ********************************************************

function maiorIgualZero($valor){
    if($valor >= 0){
        return true;
    } return false;
}

// Função que confirma de existem 2 digitos após a virgula (para verificar se o formato do dinheiro está correto)
function formatoReal($valor){
    list($whole, $decimal) = explode(',', $valor);

    $tamanhoDecimal = strlen((string)$decimal);

    if($tamanhoDecimal == 2){
        return true;
    } return false;
}


// ********************************************************

?>
