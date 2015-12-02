<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";

$arrayInfo = array(
        id_usuario => $dados_usuario[id_usuario],
        venda_itens => $_SESSION['venda_atual']
    );
    

insere_caixa($arrayInfo);

unset($_SESSION['venda_atual']);
    
header("Location: ../caixa/");

    
?>
