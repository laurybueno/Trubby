<?php

/* 
 * Funções de uso geral na API do Trubby.
 *
*/


// Retorna um BAD REQUEST em caso de erro na requisição
function requisicao_incorreta(){
    header('HTTP/1.1 400 BAD REQUEST');
    die();
}


// Captura o corpo JSON da requisição HTTP realizada
function leJSON(){
    return json_decode(file_get_contents('php://input'), true);
}


// Captura o corpo JSON da requisição HTTP realizada
function escreveJSON($array){
 
    // Declara o tipo de conteúdo a ser enviado para o cliente
    header('Content-Type: application/json; charset=utf-8');
    
    // Formata os dados em um JSON
    return json_encode($array);
}

function queryParaArray($query){
    $aaux = array();
    while($r = mysql_fetch_assoc($query)) {
        $aaux[] = $r;
    }
    return $aaux;
} 

?>