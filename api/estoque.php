<?php

include "brain.php";

require_once("../connection.php");

//Retorna a lista de itens no estoque de um usuário X passado por get (idusuario=)
if(strcasecmp($_GET['method'],'listaestoque') == 0){
    $response['code'] = 1;
    $response['status'] = $api_response_code[ $response['code'] ]['HTTP Response'];
    
    $idusuario = $_GET['idusuario'];
    $sql = "SELECT `id_estoque`,`nome` , `quantidade` , `quantidade_tipo` , `custo` , `data_modificacao` FROM `estoque` WHERE id_usuario = '$idusuario'";
    $aux = mysql_query($sql);
    $resultado = queryParaArray($aux);
    
    $response['data'] = $resultado; 
}

//MANDA A RESPOSTA APÓS PASSAR PELO MÉTODO SELECIONADO
deliver_response($_GET['format'], $response);


//------------------FUNÇÕES AUXILIARES------------------\\

//Transforma o resultado de uma querry em um array
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

//Função que confirma de existem 2 digitos após a virgula (para verificar se o formato do dinheiro está correto)
function formatoReal($valor){
    list($whole, $decimal) = explode(',', $valor);
    
    $tamanhoDecimal = strlen((string)$decimal);
    
    if($tamanhoDecimal == 2){
        return true;
    } return false;
}
                
?>