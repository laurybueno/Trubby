<?php

include "brain.php";

require_once("../connection.php");

/* 
 * Ao receber um GET com id de usuário, esta página deverá retornar a lista de itens no estoque do dado usuário.
 * Ao receber um POST, ela deverã inserir um novo item no estoque do usuário especificado ou modificar esse item, caso o id_estoque já esteja especificado na requisição.
 * Ao receber um DELETE, ela vai deletar o item especificado.
 */


// Retorna um BAD REQUEST em caso de erro na requisição
function requisicao_incorreta(){
    header('HTTP/1.1 400 BAD REQUEST');
    die();
}



// **************************************************************
// Checa qual o tipo de requisição recebida e encaminha o comando para a função adequada
// **************************************************************
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



// **************************************************************
// Requisição POST: área de inserção/modificação de item no estoque
// **************************************************************
// Requisição POST envia 6 campos para esta página: id_usuario, id_estoque, nome, quantidade, quantidade_tipo, custo.
// Se o campo id_estoque for igual a 0, o webService entenderá que o item deve ser novo e fará a inserção.
// Caso contrário, ele entenderá que se trata de uma atualização e fará as operações devidas para atualizar o item.
function insere_modifica(){
    
    // Se a requisição contiver erros, a execução será interrompida e o cliente receberá um código 400
    if(!isset($_POST['id_estoque'])) requisicao_incorreta();
    
    // checa se a operação será uma inserção ou uma atualização
    if($_POST['id_estoque'] == 0){ // realiza a inserção
        
        $sql = "
        INSERT INTO `estoque` (id_usuario,nome,quantidade,quantidade_tipo,custo)
        VALUES 
        ('".$_POST['id_usuario']."',
        '".$_POST['nome']."',
        '".$_POST['quantidade']."',
        '".$_POST['quantidade_tipo']."',
        '".$_POST['custo']."')";
        
        mysql_query($sql) or die("Erro na inserção de dados");
    
    }
    else{ // realiza a atualização
        // recupera os dados atuais sobre o item que será modificado
        $item = mysql_fetch_array(mysql_query("SELECT * FROM `estoque` WHERE id_estoque='".$_POST['id_estoque']."'"))
            or die("Erro na recuperação dos dados antigos");
        
        
        // calcula os novos valores de quantidade de preço por unidade
        $item['custo'] = ($item['quantidade']*$item['custo']+$_POST['quantidade']*$_POST['custo'])/($_POST['custo'] + $item['custo']);
        $item['quantidade'] += $_POST['quantidade'];
        
        // atualiza as informações no banco de dados
        mysql_query("
                    UPDATE estoque SET
                    nome='".$_POST['nome']."',
                    quantidade='".$item['quantidade']."',
                    quantidade_tipo='".$_POST['quantidade_tipo']."',
                    custo='".$item['custo']."'
                    WHERE 
                    id_estoque='".$_POST['id_estoque']."'
                    ")
                    or die("Erro na atualização de dados");
        
        
    }
    
    // encerra a execução do webService
    die();
}





// **************************************************************
// Requisição DELETE: área que deleta item no estoque
// **************************************************************
// Requisição DELETE envia 2 campos para esta página via URI (acessível pelo array _GET): id_usuario, id_estoque.
function deleta(){
    
    // Se houver um erro na requisição, retorna BAD REQUEST
    if(!isset($_GET['id_usuario']) || $_GET['id_usuario']==0) requisicao_incorreta();
    
    // Se houver algum erro na requisição, encerra o programa
    if(! ( isset($_GET['id_estoque']) && $_GET['id_estoque']!=0 && isset($_GET['id_usuario']) && $_GET['id_usuario'] != 0 )) requisicao_incorreta();
    
    mysql_query("DELETE FROM estoque
                WHERE 
                id_estoque='".$_GET['id_estoque']."' AND
                id_usuario='".$_GET['id_usuario']."'
                ") or
                die("Erro ao deletar dados.");
    
    // Encerra a execução do webService
    die();
    
}


// **************************************************************
// Requisição GET: área que prepara a lista de itens de estoque do usuário determinado
// **************************************************************
// Exemplo de requisição /api/estoque.php?id_usuario=14
function lista(){
    
    $idusuario = $_GET['id_usuario'];
    $sql = "SELECT `id_estoque` , `id_usuario` , `nome` , `quantidade` , `quantidade_tipo` , `custo` , `data_modificacao` FROM `estoque` WHERE id_usuario = '$idusuario'";
    $aux = mysql_query($sql);
    $resultado = queryParaArray($aux);
    
    // Formata os dados em um JSON
    $json_response = json_encode($resultado);
 
 
    // Declara o tipo de conteúdo a ser enviado para o cliente
    header('Content-Type: application/json; charset=utf-8');
  
    // Envia os dados
    echo $json_response;
    
    // encerra a execução do webService
    die();

}

//------------------FUNÇÕES AUXILIARES------------------\\

// Transforma o resultado de uma querry em um array
function queryParaArray($query){
    $aaux = array();
    while($r = mysql_fetch_assoc($query)) {
        $aaux[] = $r;
    }
    return $aaux;
}    

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
                
?>