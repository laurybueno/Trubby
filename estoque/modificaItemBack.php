<?php
include "../valida_session.inc.php";
        
if($login === false){
    header("Location: ../usuario/naoLogado.php");
}
    
include "../usaApi.php";

//Verifica de POST tem algum valor
if (!empty($_POST['submitted'])) {
    
    // Cria as variáveis dinamicamente
    foreach ($_POST as $chave => $valor) {
        // Remove todas as tags HTML
    	// Remove os espaços em branco do valor
    	$$chave = trim(strip_tags($valor));
    	
    }
    
    $arrayInfo = array(
            id_usuario => $idUsuario,
            id_produto => $idDoItem,
            nome => $nomeItem,
            quantidade => $quantidade,
            quantidade_tipo => $unidade,
            custo => $precoUnidade
        );
        
    //print(json_encode($arrayInfo, TRUE));    

    updateEstoque($arrayInfo);
    
    header('Location: ../estoque/mostraestoque.php');    
    
}

?>