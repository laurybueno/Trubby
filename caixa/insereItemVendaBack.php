<?php
include "../bootstrap.php";

include "../valida_session.inc.php";
if($login === false){
    header("Location: ../usuario/naoLogado.php");
}

if (!empty($_POST['submitted'])) {
    
    $item = array();
    $id_e_preco = $_POST['produto'];
    $dados_produto = explode(".", $id_e_preco);
    $arrayInfo = array(
            id_produto => $dados_produto[0],
            quantidade => $_POST['quantidade'],
            preco_venda => $_POST['quantidade'] * $dados_produto[2],
        );
        
    $_SESSION['venda_atual'][$_POST['key']] = $arrayInfo;
        
    //echo "<pre>";
        //print_r($_SESSION['venda_atual']);
        //print_r($_POST);
        //print_r($ingredientes);
        //print_r($arrayInfo);
    //echo "</pre>";
    
    header("Location: ../caixa/mostraVenda.php");
    
}
    
?>