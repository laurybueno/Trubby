<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";

unset($_SESSION['venda_atual']);
    
header("Location: ../caixa/mostraCaixa.php");

    
?>
