<?php
    include "bootstrap.php";
?>

<?php
// Inicia a session
session_start();

$erro = false;
$msg_erro = '';

echo 'teste';

$classQuantidade = 'form-group';
$classPrecoUnidade = 'form-group';

//Verifica de POST tem algum valor
if (!empty($_POST['submitted'])) {

    echo 'entrou no if!';
    
    //$nome = trim($_POST['nomeItem']);


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
    if ((!isset( $quantidade ) || !is_numeric($quantidade) || !maiorIgualZero($quantidade)) && !$erro) {
        $msg_erro = 'A Quantidade deve ser um valor numérico maior ou igual a zero.';
        $erro = true;
        $quantidade = '';
        $classQuantidade = 'form-group has-error';
    }
    
    // Verifica se $precoUnidade realmente existe e se é um número. 
    // Também verifica se não existe nenhum erro anterior
    if ((!isset($precoUnidade) || !formatoReal($precoUnidade) || !maiorIgualZero($precoUnidade)) && !$erro ) {
    	$msg_erro = 'O Preço da Unidade deve ser um valor em reais, com duas casas decimais maior ou igual a zero (Ex:10,50).';
    	$erro = true;
    	$precoUnidade = '';
    	$classPrecoUnidade = 'form-group has-error';
    }

    // Se existir algum erro, mostra o erro
    if (false === $erro) {
    	$_SESSION["erro"] = 'Inserido com Sucesso';
    	//header("Location: insereEstoque.php");
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
            <a href="../estoque/mostraestoque.php" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>
            <h4 class="modal-title">Inserir novo item</h4>
        </div>
        <div class="container">
            <form class="form-horizontal"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nomeItem">Nome do item*:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="nomeItem" name="nomeItem" placeholder="Ex.: Morango" value='<?php echo htmlentities($nomeItem)?>'>
                    </div>
                </div>
                <div class="<?php echo htmlentities($classQuantidade)?>">
                    <label class="control-label col-sm-3" for="quantidade">Quantidade*:</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Ex.: 60" value='<?php echo htmlentities($quantidade)?>'>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="unidades">Unidade*:</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="unidade" name="unidade">
                            <option <?php echo $unidade =='Unidade'?'selected':''; ?>>Unidade</option>
                            <option <?php echo $unidade =='Grama'?'selected':''; ?>>Grama</option>
                            <option <?php echo $unidade =='Ml'?'selected':''; ?>>Ml</option>
                        </select>
                    </div>
                </div>
                <div class="<?php echo htmlentities($classPrecoUnidade)?>">
                    <label class="control-label col-sm-3" for="precoUnidade">Preço da unidade*:</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <div class="input-group-addon">R$</div>
                            <input type="text" class="form-control" id="precoUnidade" name="precoUnidade" placeholder="Ex.: 2,50" value='<?php echo htmlentities($precoUnidade)?>'>
                        </div>
                    </div>
                </div>
                <div class="form-group">        
                    <div align="center">
                        <span class="label label-success">
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