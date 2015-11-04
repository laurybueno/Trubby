<?php

/*
 * Arquivo de funções para utilização da API do Trubby
 *
 * Neste arquivo, utilizando das funções nativas de curl, leremos requisições do tipo: POST, GET, PUT, DELETE
*/

// CAMINHO DA API
$url = 'http://trubby-flashfox.c9.io/api/';

// *****************************************************************************
// ****************************FUNÇÕES DE REQUISIÇÂO****************************
// *****************************************************************************

// *****************************************************************************
// CHAMADA: GET
// Retorna um array contruido pelo JSON da resposta da API
// *****************************************************************************
function leEstoque($id_usuario){
    
    global $url;

    $url = $url.'estoque.php?id_usuario='.$id_usuario;
    
    return curlGET($url);
    
}

//WIP \/
function leReceita($id_usuario = null, $id_produto = null){
        
    global $url;

    //$url = $url.'receitas.php?id_usuario='.$id_usuario;
    
    if(!is_null($id_usuario)) $url = $url.'receitas.php?id_usuario='.$id_usuario; 

    if(!is_null($id_produto)) $url = $url.'receitas.php?id_produto='.$id_produto; 

    return curlGET($url);
    
}

function leCardapio($id_usuario, $id_produto = null){
    
    global $url;

    $url = $url.'cardapio.php?id_usuario='.$id_usuario;
    
    if(!is_null($id_produto)) $url = $url.'&id_produto='.$id_produto; 

    return curlGET($url);
    
}

function leCaixa($id_usuario = null, $id_produto = null){
    
    global $url;

    //$url = $url.'caixa.php?id_usuario='.$id_usuario;
    
    if(!is_null($id_usuario)) $url = $url.'caixa.php?id_usuario='.$id_usuario; 

    if(!is_null($id_produto)) $url = $url.'caixa.php?id_produto='.$id_produto; 

    return curlGET($url);
    
}

// *****************************************************************************
// CHAMADA: POST
// *****************************************************************************
function updateEstoque($array){
    
    global $url;
    
    $url = $url.'estoque.php';
    
    curlPOST($url, json_encode($array, TRUE));
    
}

function insereReceita(){
    
}

// *****************************************************************************
// CHAMADA: PUT
// *****************************************************************************

// *****************************************************************************
// CHAMADA: DELETE
// *****************************************************************************
function deletaEstoque($id_usuario, $id_produto){
    
    global $url;

    $url = $url.'estoque.php?id_usuario='.$id_usuario.'&id_produto='.$id_produto;
    
    return curlDELETE($url);    
    
}

function deletaCardapio($id_usuario, $id_produto){
    
    global $url;

    $url = $url.'cardapio.php?id_usuario='.$id_usuario.'&id_produto='.$id_produto;
    
    return curlDELETE($url);    
    
}

// *****************************************************************************
// ******************************FUNÇÕES AUXILIARES*****************************
// *****************************************************************************

function curlGET($url){
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    
    $resp = curl_exec($curl);
    
    curl_close($curl);
    
    $array = json_decode($resp, TRUE);
    
    return $array;
}

function curlPOSTt($url, $json){
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://trubby-flashfox.c9.io/http.php',
        CURLOPT_USERAGENT => 'Codular Sample cURL Request',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $json
    ));
    
    $resp = curl_exec($curl);
    
    $content  = curl_exec($curl);
    
    curl_close($curl);
    
    echo $content;
}

function curlPOST($url, $json){
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'Codular Sample cURL Request',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $json
    ));
    
    $content  = curl_exec($curl);
    
    curl_close($curl);
    
}

function curlDELETE($url){
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'Codular Sample cURL Request',
        CURLOPT_CUSTOMREQUEST => "DELETE",
    ));
    
    $content  = curl_exec($curl);
    
    curl_close($curl);
}

?>
