<?php
    // Inicia a session
    session_start();

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
    	header("Location: ../estoque/insereItemModal.php");
    } else {
    	// Se a variável erro continuar com valor falso
    	// Você pode fazer o que preferir aqui, por exemplo, 
    	// enviar para a base de dados, ou enviar um email
    	// Tanto faz. Vou apenas exibir os dados na tela.
    	//echo "<h1> Veja os dados enviados</h1>";
    	$erro= "$nomeItem inserido com sucesso";
        
        
        require_once("../connection.php");
                    
        $sql =  "INSERT INTO `trubby`.`estoque` (
                    `id_usuario` ,
                    `nome` ,
                    `quantidade` ,
                    `quantidade_tipo` ,
                    `custo` ,
                    `data_modificacao`
                )
                VALUES (
                    '0','" .$nomeItem ."','".$quantidade ."','". $unidade."',' ".$precoUnidade."',
                    CURRENT_TIMESTAMP
                );";
        $resultado = mysql_query($sql);
        mysql_close($con);
        
        $_SESSION["erro"]=  $erro;
        
        header("Location: ../estoque/insereItemModal.php");

    	
    	foreach ($_POST as $chave => $valor) {
    		echo '<b>' . $chave . '</b>: ' . $valor . '<br><br>';
    	}
    }
    
    function maiorIgualZero($valor){
        if($valor >= 0){
            return true;
        } return false;
    }

	function formatoReal($valor){
	    list($whole, $decimal) = explode(',', $valor);
	    
	    $tamanhoDecimal = strlen((string)$decimal);
	    
	    if($tamanhoDecimal == 2){
	        return true;
	    } return false;
	}
                    
?>
