<?php
    include "../bootstrap.php";

    include "../usaApi.php";

    require_once("../connection.php");

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
    	
    }
    
    $arrayInfo = array(
            id_usuario => $idUsuario,
            id_produto => '0',
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

<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <div class="container">
            </br>
            <a href="../estoque/mostraestoque.php" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>
            </br>
            </br>
            </br>
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