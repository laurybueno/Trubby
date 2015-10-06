<?php
include "../bootstrap.php";
require_once("../connection.php");
include "../valida_session.inc.php";
if($login === false){
    header("Location: ../usuario/naoLogado.php");
}
 
$erro = false;
$msg_erro = '';

$classQuantidade = 'form-group';
$classPrecoUnidade = 'form-group';

//Verifica de POST tem algum valor
if (!empty($_POST['submitted'])) {

    // Cria as variáveis dinamicamente
    foreach ($_POST as $chave => $valor) {
        // Remove todas as tags HTML
    	// Remove os espaços em branco do valor
    	$$chave = trim(strip_tags($valor));
    	
    	// Verifica se tem algum valor nulo
    	if (empty($valor)) {
    	    $msg_erro = 'Existem campos em branco.';
    	}
    }

    // Se existir algum erro, mostra o erro
    if (false === $erro) {

        $sql = "DELETE FROM `trubby`.`estoque` WHERE  `id_estoque`= '$idDoItem';";
        
                 
        echo "teste";            
        echo $sql;            
        
        $resultado = mysql_query($sql);
        mysql_close($con);
    	
    	//header("Location: mostraestoque.php");
    	
    	if(!$resultado){
    	    $_SESSION["erro"] = 'Falha no Banco de Dados, tente novamente!';
    	} else $_SESSION["erro"] = $sql;
    	
    } else {
        $_SESSION["erro"] = $msg_erro;
    }
    
    header("Location: mostraestoque.php");
    
}   
?>