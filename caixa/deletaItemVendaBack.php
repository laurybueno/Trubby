<?php
include "../bootstrap.php";

include "../valida_session.inc.php";
if($login === false){
    header("Location: ../usuario/naoLogado.php");
}

if (!empty($_POST['submitted'])) {
    

        
    unset($_SESSION['venda_atual'][$_POST['key']]);
    array_splice($_SESSION['venda_atual'], 1, -1);
        

    header("Location: ../caixa/mostraVenda.php");
    
}
    
?>
