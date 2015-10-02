<?php
    include "../bootstrap.php";

    require_once("../connection.php");
?>
        <?php

            include "../valida_session.inc.php";
            if($login === false){
                header("Location: ../usuario/naoLogado.php");
            }
                
        ?>
<?php

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
        
        $sql =  "INSERT INTO `trubby`.`estoque` (
                    `id_usuario` ,
                    `nome` ,
                    `quantidade` ,
                    `quantidade_tipo` ,
                    `custo`
                )
                VALUES (
                    '$idUsuario','".$nomeItem."','".$quantidade."','".$unidade."','".$precoUnidade."'
                );";
        
        echo $sql;        
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
            <a href="../estoque/mostraestoque.php" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>
            <h4 class="modal-title">Inserir novo item</h4>
        </div>
        <div class="container">
            <form class="form-horizontal"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" method="POST">
                
                <!-- Nome -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nomeItem">Nome do item*:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="nomeItem" name="nomeItem" placeholder="Ex.: Morango" value='<?php echo htmlentities($nomeItem)?>'>
                    </div>
                </div>
                
                <!-- Quantidade -->
                <div class="<?php echo htmlentities($classQuantidade)?>">
                    <label class="control-label col-sm-3" for="quantidade">Quantidade*:</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Ex.: 60" value='<?php echo htmlentities($quantidade)?>'>
                    </div>
                </div>
                
                <!-- Unidade -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="unidades">Unidade*:</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="unidade" name="unidade">
                            <option <?php echo $unidade =='Lt'?'selected':''; ?>>Lt</option>
                            <option <?php echo $unidade =='Kg'?'selected':''; ?>>Kg</option>
                            <option <?php echo $unidade =='Dz'?'selected':''; ?>>Dz</option>
                            <option <?php echo $unidade =='Mç'?'selected':''; ?>>Mç</option>
                            <option <?php echo $unidade =='Us'?'selected':''; ?>>Us</option>
                            <option <?php echo $unidade =='Co'?'selected':''; ?>>Co</option>
                            <option <?php echo $unidade =='Qb'?'selected':''; ?>>Qb</option>
                        </select>
                    </div>
                </div>
                
                <!-- Preço -->
                <div class="<?php echo htmlentities($classPrecoUnidade)?>">
                    <label class="control-label col-sm-3" for="precoUnidade">Preço da unidade*:</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <div class="input-group-addon">R$</div>
                            <input type="text" class="form-control" id="precoUnidade" name="precoUnidade" placeholder="Ex.: 2,50" value='<?php echo htmlentities($precoUnidade)?>'>
                        </div>
                    </div>
                </div>
                
                <!-- BOTÃO DE CONCLUIR -->
                <div class="form-group">        
                    <div align="center">
                        <span class="label label-danger">
                            <?php
                                echo  $_SESSION["nomeItem"]. " " . $_SESSION["erro"] . "<br>";
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