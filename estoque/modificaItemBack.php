<?php
    include "../valida_session.inc.php";
        
    if($login === false){
        header("Location: ../usuario/naoLogado.php");
    }
    
?>
<?php
require_once("../connection.php");
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

    // Verifica se $quatidade realmente existe e se é um número. 
    // Também verifica se não existe nenhum erro anterior
    if ((!isset($quantidade) || !is_numeric($quantidade) || !maiorIgualZero($quantidade)) && !$erro) {
        $msg_erro = 'A Quantidade deve ser um valor numérico maior ou igual a zero.';
        $erro = true;
        $quantidade = '';
        $classQuantidade = 'form-group has-error'; //Borda vermelha
    }
    
    // Verifica se $precoUnidade realmente existe e se é um número. 
    // Também verifica se não existe nenhum erro anterior
    if ((!isset($precoUnidade) || !formatoReal($precoUnidade) || !maiorIgualZero($precoUnidade)) && !$erro ) {
    	$msg_erro = 'O Preço da Unidade deve ser um valor em reais, com duas casas decimais maior ou igual a zero (Ex:10,50).';
    	$erro = true;
    	$precoUnidade = '';
    	$classPrecoUnidade = 'form-group has-error'; //Borda vermelha
    } else {
        $precoUnidade = str_replace(",",".", $precoUnidade);
    }

    // Se existir algum erro, mostra o erro
    if (false === $erro) {
        
        /*
        $sql =  "INSERT INTO `trubby`.`estoque` (
                    `id_usuario` ,
                    `nome` ,
                    `quantidade` ,
                    `quantidade_tipo` ,
                    `custo`
                )
                VALUES (
                    '$idUsuario','$nomeItem','$quantidade','$unidade','$precoUnidade'
                );";
        */
        
        $sql = "UPDATE `trubby`.`estoque` SET
        
                    `nome` = '$nomeItem', 
                    `quantidade` = '$quantidade', 
                    `quantidade_tipo` = '$unidade', 
                    `custo` = '$precoUnidade'
                    
                    WHERE `id_estoque` = '$idDoItem'
                    ;";
        
                 
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