 <?php
    // Start the session
    session_start();
?>

<?php

    $erro = false;
    
    //Verifica de POST tem algum valor
    if ( !isset( $_POST ) || empty( $_POST ) ) {
        $erro = "Nada foi postado.";
    }

    // Cria as variáveis dinamicamente
    foreach ( $_POST as $chave => $valor ) {
    	// Remove todas as tags HTML
    	// Remove os espaços em branco do valor
    	$$chave = trim( strip_tags( $valor ) );
    	
    	// Verifica se tem algum valor nulo
    	if ( empty ( $valor ) ) {
    	    $erro = 'Existem campos em branco.';
    	}
    }

    // Verifica se $quatidade realmente existe e se é um número. 
    // Também verifica se não existe nenhum erro anterior
    echo $quantidade . '<br><br>';
    if ((!isset( $quantidade ) || !is_numeric($quantidade) || !maiorIgualZero($quantidade)) && !$erro) {
        $erro = 'A Quantidade deve ser um valor numérico maior ou igual a zero.';
    }
    // Verifica se $precoUnidade realmente existe e se é um número. 
    // Também verifica se não existe nenhum erro anterior
    echo $precoUnidade . '<br><br>';
    if ((!isset($precoUnidade) || !formatoReal($precoUnidade) || !maiorIgualZero($precoUnidade)) && !$erro ) {
    	$erro = 'O Preço da Unidade deve ser um valor em reais, com duas casas decimais maior ou igual a zero (Ex:10,50).';
    }

    // Se existir algum erro, mostra o erro
    if ($erro) {
        $_SESSION["erro"]= $erro;
    	echo $erro;
    	header("Location: ../mostraestoque.php");
    } else {
    	// Se a variável erro continuar com valor falso
    	// Você pode fazer o que preferir aqui, por exemplo, 
    	// enviar para a base de dados, ou enviar um email
    	// Tanto faz. Vou apenas exibir os dados na tela.
    	//echo "<h1> Veja os dados enviados</h1>";
    	$erro= "$nomeItem inserido com sucesso";
        $_SESSION["erro"]=  $erro;

        header("Location: ../mostraestoque.php");

    	
    	foreach ($_POST as $chave => $valor) {
    		echo '<b>' . $chave . '</b>: ' . $valor . '<br><br>';
    	}
    }
    
    function maiorIgualZero($valor){
        if( $valor >= 0){
            return true;
        } return false;
    }

	function formatoReal($valor){
	    list($whole, $decimal) = explode(',', $valor);
	    echo $decimal . '<br><br>';
	    
	    $tamanhoDecimal = strlen((string)$decimal);
	    echo $tamanhoDecimal . '<br><br>';
	    
	    if($tamanhoDecimal == 2){
	        return true;
	    } return false;
	}
                    
?>
