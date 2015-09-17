<?php
    include "../bootstrap.php" 
?>
<?php
    session_start();
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
            <form class="form-horizontal"  action="../estoque/insereBackEnd.php" role="form" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nomeItem">Nome do item*:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="nomeItem" name="nomeItem" placeholder="Ex.: Morango">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="quantidade">Quantidade*:</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Ex.: 60">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="unidades">Unidade*:</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="unidade" name="unidade">
                            <option>Unidade</option>
                            <option>Grama</option>
                            <option>Ml</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="precoUnidade">Preço da unidade*:</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <div class="input-group-addon">R$</div>
                            <input type="text" class="form-control" id="precoUnidade" name="precoUnidade" placeholder="Ex.: 2,50">
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
                        <button id="submit" name="submit" type="submit" value="Send" class="btn btn-success">Inserir</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>