<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/header.inc.php";

//Verifica de POST tem algum valor
if (!empty($_POST['submitted'])) {

    $array_info = array(
            id_usuario => $dados_usuario[id_usuario],
            id_produto => '0',
            nome => $_POST[nome_item],
            quantidade => $_POST[quantidade],
            quantidade_tipo => $_POST[unidade],
            custo => $_POST[preco_unidade]
        );
        
    //print(json_encode($array_info, TRUE));    

    update_estoque($array_info);
    
    header('Location: ../estoque/mostra_estoque.php');    
    
}

?>

<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <div class="container">
            </br>
            <a href="../estoque/mostra_estoque.php" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>
            </br>
            </br>
            </br>
            <h4 class="modal-title">Inserir novo item</h4>
        </div>
        <div class="container">
            <form class="form-horizontal"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" method="POST">
                
                <!-- Nome -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nome_item">Nome do item:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="nome_item" name="nome_item">
                    </div>
                </div>
                
                <!-- Quantidade -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="quantidade">Quantidade:</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="quantidade" name="quantidade">
                    </div>
                </div>
                
                <!-- Unidade -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="unidades">Unidade:</label>
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
                <div class="form-group">
                    <label class="control-label col-sm-3" for="preco_unidade">Preço da unidade:</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <div class="input-group-addon">R$</div>
                            <input type="text" class="form-control" id="preco_unidade" name="preco_unidade">
                        </div>
                    </div>
                </div>
                
                <!-- BOTÃO DE CONCLUIR -->
                <div class="form-group">        
                    <div align="center">
                        <br>
                        <input id="submit" name="submitted" type="submit" value="Enviar" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>