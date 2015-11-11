<?php
include "../bootstrap.php";

include "../usaApi.php";

include "../valida_session.inc.php";
if($login === false){
    header("Location: ../usuario/naoLogado.php");
}


if (!empty($_POST['submitted'])) {
    

    deletaVenda($_POST['id']);    


    header("Location: ../caixa/mostraCaixa.php");
    
}
    
?>
