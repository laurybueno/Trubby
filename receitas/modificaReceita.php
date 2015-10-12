<?php
    include "../bootstrap.php";
    include "insereIngrediente.php";
    include "../valida_session.inc.php";
    if($login === false){
        header("Location: ../usuario/naoLogado.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="../1.RESOURCES/jquery-1.11.3.min.js"></script>
        <script src="../1.RESOURCES/bootstrap/js/bootstrap.min.js"></script>
        <script src="../1.RESOURCES/jquery.tablesorter.min.js"></script>
    </head>
    <body>
        <div class="container">
            <a href="../receitas/mostraReceita.php" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>
             <div class="container-fluid">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        
                        <li><a href="../estoque/mostraestoque.php">Estoque</a></li>
                        <li><a href="../receitas/mostraReceita.php">Receitas</a></li>
                        <li><a href="#">Caixa</a></li>
                        <li><a href="#">Cardápio</a></li>
                    </ul>
                </div>
            </div>
    
                
                
            <div class ="container">
                <form class="form-horizontal"  action="../receitas/.php" role="form" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="nomeItem">Nome da ficha técnica*:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nomeItem" name="nomeItem" placeholder="Ex.:crepe de morango" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="nPorcoes">Número de porções*:</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="nPorcoes" name="nPorcoes" placeholder="Ex.: 2" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pesoPorcao">Peso da porção (g)*:</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="pesoPorcao" name="pesoPorcao" placeholder="peso da porção em gramas Ex.: 2" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="precoVenda">Preço de venda*:</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="precoVenda" name="precoVenda" placeholder="preço de venda em reais Ex.: 2,50" >
                            </div>
                        </div>
                        <h2>Ingredientes:</h2>
                        <h4>Ingredientes primários</h4>
                       <div class="form-group">        
                            <div align="center">
                                <button id="submit" name="submitted" type="submit" value="Send" class="btn glyphicon glyphicon-plus btn-info" aria-hidden="true" data-toggle="modal" data-target="#inserirIngrediente"></button>
                            </div>
                        </div>
                        <h4>Ingredientes secundários</h4>
                        <div class="form-group">        
                            <div align="center">
                                <button id="submit" name="submitted" type="submit" value="Send" class="btn glyphicon glyphicon-plus btn-info" aria-hidden="true" data-toggle="modal" data-target="#inserirIngrediente"></button>
                            </div>
                        </div>
                        <h4>Ingredientes extras</h4>
                        <div class="form-group">        
                            <div align="center">
                                <button id="submit" name="submitted" type="submit" value="Send" class="btn glyphicon glyphicon-plus btn-info" aria-hidden="true" data-toggle="modal" data-target="#inserirIngrediente"></button>
                            </div>
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="obs">Observações:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="obs" name="obs" >
                            </div>
                        </div>
                        <div class="form-group">        
                            <div align="center">
                                <button id="submit" name="submitted" type="submit" value="Send" class="btn btn-primary">Confirmar</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </body>
</html>