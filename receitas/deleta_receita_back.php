<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";

//Verifica de POST tem algum valor
if (!empty($_POST['submitted'])) {

    //print(json_encode($arrayInfo, TRUE));
    
    deleta_receita($dados_usuario[id_usuario], $_POST[id_produto]);

    header("Location: ../receitas/");
    
}   

?>