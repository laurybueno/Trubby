<?php

/*
 * Arquivo de funções para utilização da API do Trubby
 *
 * Neste arquivo, utilizando das funções nativas de curl, leremos requisições do tipo: POST, GET, PUT, DELETE, OPTIONS
*/

// CAMINHO DA API
$url_api = 'api/';

// *****************************************************************************
// ****************************FUNÇÕES DE REQUISIÇÂO****************************
// *****************************************************************************

// *****************************************************************************
// CHAMADA: GET
// *****************************************************************************
function le_estoque($id_usuario){

    global $url_api;

    $url = $url_api;

    $url = $url.'estoque.php?id_usuario='.$id_usuario;

    return curlGET($url);

}

function le_receita($id_usuario, $id_produto = NULL){

    global $url_api;

    $url = $url_api;

    if(!is_null($id_usuario)) $url = $url.'receitas.php?id_usuario='.$id_usuario;

    if(!is_null($id_produto)) $url = $url.'&id_produto='.$id_produto;

    return curlGET($url);

}

function le_cardapio($id_usuario, $id_produto = NULL){

    global $url_api;

    $url = $url_api;

    $url = $url.'cardapio.php?id_usuario='.$id_usuario;

    if(!is_null($id_produto)) $url = $url.'&id_produto='.$id_produto;

    return curlGET($url);

}

function le_caixa($id_usuario, $id_venda = NULL){

    global $url_api;

    $url = $url_api;

    $url = $url.'caixa.php?id_usuario='.$id_usuario;

    if(!is_null($id_venda)) $url = $url.'&id_venda='.$id_venda;

    //echo $url;

    return curlGET($url);

}

// *****************************************************************************
// CHAMADA: POST
// *****************************************************************************
function update_estoque($array){

    global $url_api;

    $url = $url_api;

    $url = $url.'estoque.php';

    curlPOST($url, json_encode($array, TRUE));

}

function update_receita($array){

    global $url_api;

    $url = $url_api;

    $url = $url.'receitas.php';

    curlPOST($url, json_encode($array, TRUE));

}

function insere_cardapio($array){

    global $url_api;

    $url = $url_api;

    $url = $url.'cardapio.php';

    curlPOST($url, json_encode($array, TRUE));

}

function insere_caixa($array){

    global $url_api;

    $url = $url_api;

    $url = $url.'caixa.php';

    curlPOST($url, json_encode($array, TRUE));

}

function cadastro($array){

    global $url_api;

    $url = $url_api;

    $url = $url.'usuario.php';

    curlPOST($url, json_encode($array, TRUE));

}
// *****************************************************************************
// CHAMADA: PUT
// *****************************************************************************
function modifica_cardapio($array){

    global $url_api;

    $url = $url_api;

    $url = $url.'cardapio.php';

    curlPUT($url, json_encode($array, TRUE));

}

function modifica_receita($array){

    global $url_api;

    $url = $url_api;

    $url = $url.'receitas.php';

    curlPUT($url, json_encode($array, TRUE));

}

function login_valida($array){

    global $url_api;

    $url = $url_api;

    $url = $url.'usuario.php';

    $aux = curlPUTr($url, json_encode($array, TRUE));

    // Filtra a variável string de $resposta[validade] para um boolean válido
    $aux[validade] = filter_var($aux[validade], FILTER_VALIDATE_BOOLEAN);

    return $aux;

}
// *****************************************************************************
// CHAMADA: DELETE
// *****************************************************************************
function deleta_estoque($id_usuario, $id_produto){

    global $url_api;

    $url = $url_api;

    $url = $url.'estoque.php?id_usuario='.$id_usuario.'&id_produto='.$id_produto;

    echo $url;

    return curlDELETE($url);

}

function deleta_cardapio($id_usuario, $id_produto){

    global $url_api;

    $url = $url_api;

    $url = $url.'cardapio.php?id_usuario='.$id_usuario.'&id_produto='.$id_produto;

    return curlDELETE($url);

}

function deleta_receita($id_usuario, $id_produto){

    global $url_api;

    $url = $url_api;

    $url = $url.'receitas.php?id_usuario='.$id_usuario.'&id_produto='.$id_produto;

    return curlDELETE($url);

}

function deleta_venda($id_venda){

    global $url_api;

    $url = $url_api;

    $url = $url.'caixa.php?id_venda='.$id_venda;

    return curlDELETE($url);

}

function deleta_usuario($id_usuario){

    global $url_api;

    $url = $url_api;

    $url = $url.'usuario.php?id_usuario='.$id_usuario;

    return curlDELETE($url);

}

// *****************************************************************************
// CHAMADA: OPTIONS
// *****************************************************************************
function options_cardapio($id_usuario){

    global $url_api;

    $url = $url_api;

    $url = $url.'cardapio.php?id_usuario='.$id_usuario;

    return curlOPTIONS($url);

}

// *****************************************************************************
// ******************************FUNÇÕES AUXILIARES*****************************
// ************************************CURL*************************************
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

function curlOPTIONS($url){
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'Codular Sample cURL Request',
        CURLOPT_CUSTOMREQUEST => "OPTIONS",
    ));

    $resp  = curl_exec($curl);

    curl_close($curl);

    $array = json_decode($resp, TRUE);

    return $array;
}

function curlPUT($url, $json){
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'Codular Sample cURL Request',
        CURLOPT_CUSTOMREQUEST => "PUT",
        CURLOPT_POSTFIELDS => $json
    ));

    $content  = curl_exec($curl);

    curl_close($curl);

}

function curlPUTr($url, $json){
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'Codular Sample cURL Request',
        CURLOPT_CUSTOMREQUEST => "PUT",
        CURLOPT_POSTFIELDS => $json
    ));

    $resp  = curl_exec($curl);

    curl_close($curl);

    $array = json_decode($resp, TRUE);

    return $array;

}

function curlPUTt($url, $json){
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://trubby-flashfox.c9.io/http.php',
        CURLOPT_USERAGENT => 'Codular Sample cURL Request',
        CURLOPT_CUSTOMREQUEST => "PUT",
        CURLOPT_POSTFIELDS => $json
    ));

    $content  = curl_exec($curl);

    curl_close($curl);

    echo $content;

}

?>
