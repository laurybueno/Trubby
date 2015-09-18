<?php
    include "../bootstrap.php";
?>

<?php
// Inicia a session
session_start();

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
    }

    // Se existir algum erro, mostra o erro
    if (false === $erro) {
        
    	require_once("../connection.php");
    	
        $sql =  "INSERT INTO `trubby`.`estoque` (
                    `id_usuario` ,
                    `nome` ,
                    `quantidade` ,
                    `quantidade_tipo` ,
                    `custo`
                )
                VALUES (
                    '0','".$nomeItem."','".$quantidade."','".$unidade."','".$precoUnidade."'
                );";
                
        $resultado = mysql_query($sql);
        mysql_close($con);
    	
    	//header("Location: insereEstoque.php");
    	
    	if(!$resultado){
    	    $_SESSION["erro"] = 'Falha no Banco de Dados, tente novamente!';
    	} else $_SESSION["erro"] = 'Inserido com Sucesso';
    	
    } else {
        $_SESSION["erro"] = $msg_erro;
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

<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <div class="container">
            <a href="mostraReceita.php" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>
            <h4 class="modal-title">Inserir nova ficha técnica</h4>
        </div>
        <div class="container">
            <form class="form-horizontal"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nomeItem">Nome da ficha técnica*:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="nomeItem" name="nomeItem" placeholder="Ex.: crepe de morango" value='<?php echo htmlentities($nomeItem)?>'>
                    </div>
                </div>
                <div class="<?php echo htmlentities($classNPorcoes)?>">
                    <label class="control-label col-sm-3" for="nPorcoes">Quantidade*:</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="nPorcoes" name="nPorcoes" placeholder="Ex.: 2" value='<?php echo htmlentities($nPorcoes)?>'>
                    </div>
                </div>
                <div class="<?php echo htmlentities($classPeso)?>">
                    <label class="control-label col-sm-3" for="pesoPorcao">Peso da porção (g)*:</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="pesoPorcao" name="pesoPorcao" placeholder="peso da porção em gramas Ex.: 2" value='<?php echo htmlentities($nPorcoes)?>'>
                    </div>
                </div>


                <div class="form-group">        
                    <div align="center">
                        <span class="label label-danger">
                            <?php
                                echo  $_SESSION["nomeItem"]. " " . $_SESSION["erro"] . "<br>";
                                session_destroy(); 
                            ?>
                        </span>
                        <br>
                        <input id="submit" name="submitted" type="submit" value="Enviar" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>