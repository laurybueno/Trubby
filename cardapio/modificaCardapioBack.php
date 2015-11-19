<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";

//Verifica de POST tem algum valor
if (!empty($_POST['submitted'])) {
    
    // Cria as variáveis dinamicamente
    foreach ($_POST as $chave => $valor) {
        // Remove todas as tags HTML
    	// Remove os espaços em branco do valor
    	$$chave = trim(strip_tags($valor));
    	
    }
    
    $arrayInfo = array(
            id_produto => $idItem,
            preco_venda => $precoVenda,
            alerta_amarelo => $alertaAmarelo,
            alerta_vermelho => $alertaVermelho
        );
        
    //print(json_encode($arrayInfo, TRUE));    

    modifica_cardapio($arrayInfo);
    
    header('Location: ../cardapio/mostra_cardapio.php');    
    
}

?>