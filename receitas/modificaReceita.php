<?php
    include "../bootstrap.php";
    include "../valida_session.inc.php";
    if($login === false){
        header("Location: ../usuario/naoLogado.php");
    }
    include "insereIngrediente.php";
    include "insereIngredienteExtra.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="../1.RESOURCES/jquery-1.11.3.min.js"></script>
        <script src="../1.RESOURCES/bootstrap/js/bootstrap.min.js"></script>
        <script src="../1.RESOURCES/jquery.tablesorter.min.js"></script>
    </head>
    <body>
                <script>
            function insereIngredientePrimario() {
                var table = document.getElementById("ingrediente_primario");
                var row = table.insertRow(0);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                cell1.innerHTML = "NEW CELL1";
                cell2.innerHTML = "NEW CELL2";
                cell3.innerHTML = "NEW CELL2";
                cell4.innerHTML = "NEW CELL2";
            }
            
             function insereIngredienteSecundario() {
                var table = document.getElementById("ingrediente_secundario");
                var row = table.insertRow(0);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                cell1.innerHTML = "NEW CELL1";
                cell2.innerHTML = "NEW CELL2";
                cell3.innerHTML = "NEW CELL2";
                cell4.innerHTML = "NEW CELL2";
            }
            
             function insereIngredienteExtra() {
                var table = document.getElementById("ingrediente_extra");
                var row = table.insertRow(0);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell4 = row.insertCell(4);
                var cell5 = row.insertCell(5);
                cell1.innerHTML = "NEW CELL1";
                cell2.innerHTML = "NEW CELL2";
                cell3.innerHTML = "NEW CELL2";
                cell4.innerHTML = "NEW CELL2";
                cell5.innerHTML = "NEW CELL2";
            }
        </script>
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
                    <table class="table table-striped" id= "ingrediente_primario"></table>
                    <div class="form-group">        
                        <div align="center">
                            <button id="submit" name="submitted" type="submit" value="Send" class="btn glyphicon glyphicon-plus btn-info" aria-hidden="true" data-toggle="modal" data-target="#inserirIngrediente"></button>
                        </div>
                    </div>
                    <h4>Ingredientes secundários</h4>
                    <table class="table table-striped" id= "ingrediente_secundario"></table>
                    <div class="form-group">        
                        <div align="center">
                            <button id="submit" name="submitted" type="submit" value="Send" class="btn glyphicon glyphicon-plus btn-info" aria-hidden="true" data-toggle="modal" data-target="#inserirIngrediente"></button>
                        </div>
                    </div>
                    <h4>Ingredientes extras</h4>
                    <table class="table table-striped" id= "ingrediente_extra"></table>
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