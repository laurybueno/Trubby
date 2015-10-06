<?php

require_once("../connection.php");

//Retorna a lista de itens no estoque de determinado usuário
function listaEstoque($idusuario){
    $sql = "SELECT `id_estoque`,`nome` , `quantidade` , `quantidade_tipo` , `custo` , `data_modificacao` FROM `estoque` WHERE id_usuario = '$idusuario'";
    $resultado = mysql_query($sql);
    return queryToArray($resultado);
}

//Transforma o resultado de uma querry em um array
function queryToArray($query){
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