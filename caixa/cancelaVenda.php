<?php
include "../bootstrap.php";

include "../valida_session.inc.php";
if($login === false){
    header("Location: ../usuario/naoLogado.php");
}

unset($_SESSION['venda_atual']);
    
header("Location: ../caixa/mostraCaixa.php");

    
?>
