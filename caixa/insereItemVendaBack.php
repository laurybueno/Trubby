<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";

if (!empty($_POST['submitted'])) {
    
    $item = array();
    $id_e_preco = $_POST['produto'];
    $dados_produto = explode(".", $id_e_preco);
    
    //Manipulação do preço
    $preco_unitario = str_replace(",",".",$dados_produto[2]);
    $preco_real = $_POST['quantidade'] * $preco_unitario;
    //$preco_real = str_replace(".",",",$preco_real);
    
    $arrayInfo = array(
            id_produto => $dados_produto[0],
            quantidade => $_POST['quantidade'],
            preco_venda => $preco_real,
        );
        
    $_SESSION['venda_atual'][$_POST['key']] = $arrayInfo;
        
    header("Location: ../caixa/inserir.php");
    
}
    
?>