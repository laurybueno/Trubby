<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";

if (!empty($_POST['submitted'])) {
    

        
    unset($_SESSION['venda_atual'][$_POST['key']]);
    array_splice($_SESSION['venda_atual'], 1, -1);
        

    header("Location: ../caixa/mostraVenda.php");
    
}
    
?>
