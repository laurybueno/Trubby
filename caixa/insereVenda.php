<?php
include "../bootstrap.php";

include "../usaApi.php";

include "../valida_session.inc.php";
if($login === false){
    header("Location: ../usuario/naoLogado.php");
}

$arrayInfo = array(
        id_usuario => $idUsuario,
        venda_itens => $_SESSION['venda_atual']
    );
    

insereCaixa($arrayInfo);

unset($_SESSION['venda_atual']);
    
header("Location: ../caixa/mostraCaixa.php");

    
?>
