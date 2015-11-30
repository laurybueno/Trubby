<?php

include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";

if (!empty($_POST['submitted'])) {
    

    deleta_venda($_POST['id']);    


    header("Location: ../caixa/");
    
}
    
?>
