<?php
include "../bootstrap.php";
include "../usaApi.php";

include "../valida_session.inc.php";
if($login === false){
    header("Location: ../usuario/naoLogado.php");
}
 
//Verifica de POST tem algum valor
if (!empty($_POST['submitted'])) {

    // Cria as variáveis dinamicamente
    foreach ($_POST as $chave => $valor) {
        // Remove todas as tags HTML
    	// Remove os espaços em branco do valor
    	$$chave = trim(strip_tags($valor));
    	
    }

    
    //print(json_encode($arrayInfo, TRUE));
    
    deletaCardapio($idUsuario, $id_produto);

    header("Location: ../cardapio/mostraCardapio.php");
    
}   
?>