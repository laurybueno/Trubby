<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/valida_session.inc.php";

$get_estoque = le_estoque($dados_usuario[id_usuario]);
$get_receita = le_receita($dados_usuario[id_usuario]);
$get_cardapio = le_cardapio($dados_usuario[id_usuario]);
$get_caixa = le_caixa($dados_usuario[id_usuario]);

$options_cardapio = options_cardapio($dados_usuario[id_usuario]);

echo "GETS: </br>";
    echo "ESTOQUE:";
echo "<pre>";
print_r($get_estoque);
echo "</pre>";
    echo "RECEITAS:";
echo "<pre>";
print_r($get_receita);
echo "</pre>";
    echo "CARDAPIO:";
echo "<pre>";
print_r($get_cardapio);
echo "</pre>";
    echo "CAIXA:";
echo "<pre>";
print_r($get_caixa);
echo "</pre>";

echo "OPTIONS: </br>";
    echo "CARDAPIO:";
echo "<pre>";
print_r($options_cardapio);
echo "</pre>";






?>