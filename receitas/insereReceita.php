<?php
    include "../valida_session.inc.php";
    if($login === false){
        header("Location: ../usuario/naoLogado.php");
    }
    include "../bootstrap.php";
    include "insereIngrediente.php";
    include "insereIngredienteSecundario.php";
    include "insereIngredienteExtra.php";
    
    if (!empty($_POST['submitted'])) {
        require_once("../connection.php");
        $sql =  "INSERT INTO `trubby`.`fichas` (
                `id_usuario`, 
                `nome`, 
                `modo_preparo`, 
                `seq_montagem`, 
                `equipamento`,
                `n_porcoes`,
                `peso_porcao`,
                `obs`
                )
                VALUES (
                    '$idUsuario','$nomeReceita','$modoPreparo','$seqMontagem','$equipamento','$nPorcoes','$pesoPorcao','$obs'
                );";
        $resultado = mysql_query($sql,$con);
        mysql_close($con);
        
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
        <script>
            function insereIngredientePrimario(form) {
                var table = document.getElementById("ingrediente_primario");
                var row = table.insertRow(1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                cell1.innerHTML = form.nome.value;
                cell2.innerHTML = form.qntUtilizada.value;
                cell3.innerHTML = form.qntLiquida.value;
                cell4.innerHTML = form.rendimento.value;
            }
            
            function insereIngredienteSecundario(form) {
                var table = document.getElementById("ingrediente_secundario");
                var row = table.insertRow(1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                cell1.innerHTML = form.nome.value;
                cell2.innerHTML = form.qntUtilizada.value;
                cell3.innerHTML = form.qntLiquida.value;
                cell4.innerHTML = form.rendimento.value;
            }
            
            function insereIngredienteExtra(form) {
                var table = document.getElementById("ingrediente_extra");
                var row = table.insertRow(0);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                cell1.innerHTML = form.nome.value;
                cell2.innerHTML = form.qntUtilizada.value;
                cell3.innerHTML = form.qntLiquida.value;
                cell4.innerHTML = form.rendimento.value;
                cell5.innerHTML = form.precoExtra.value;
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
                <form class="form-horizontal" role="form" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="nomeReceita">Nome da ficha técnica*:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nomeReceita" name="nomeReceita" placeholder="Ex.:crepe de morango" value='<?php echo htmlentities($nomeReceita)?>' >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="modoPreparo">Modo de preparo*:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="modoPreparo" name="modoPreparo" value='<?php echo htmlentities($modoPreparo)?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="seqMontagem">Sequencia de montagem*:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="seqMontagem" name="seqMontagem" value='<?php echo htmlentities($seqMontagem)?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="equipamento">Equipamentos:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="equipamento" name="equipamento" value='<?php echo htmlentities($equipamento)?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="nPorcoes">Número de porções*:</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="nPorcoes" name="nPorcoes" placeholder="Ex.: 2" value='<?php echo htmlentities($nPorcoes)?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="pesoPorcao">Peso da porção (g)*:</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="pesoPorcao" name="pesoPorcao" placeholder="peso da porção em gramas Ex.: 2" value='<?php echo htmlentities($pesoPorcao)?>'>
                        </div>
                    </div>
                    <h2>Ingredientes:</h2>
                    <h4>Ingredientes primários</h4>
                    <table class="table table-striped" id= "ingrediente_primario">
                        <tr>
                            <td>Nome do ingrediente</td>
                            <td>Quantidade utilizada</td>
                            <td>Quantidade líquida</td>
                            <td>Rendimento</td>
                        </tr>
                    </table>
                    <div class="form-group">        
                        <div align="center">
                            <button id="submit"  type="submit" class="btn glyphicon glyphicon-plus btn-info" aria-hidden="true" data-toggle="modal" data-target="#inserirIngrediente"></button>
                        </div>
                    </div>
                    <h4>Ingredientes secundários</h4>
                    <table class="table table-striped" id= "ingrediente_secundario">
                        <tr>
                            <td>Nome do ingrediente</td>
                            <td>Quantidade utilizada</td>
                            <td>Quantidade líquida</td>
                            <td>Rendimento</td>
                        </tr>
                    </table>
                    <div class="form-group">
                        <div align="center">
                            <button id="submit" name="submit" type="submit" value="Send" class="btn glyphicon glyphicon-plus btn-info" aria-hidden="true" data-toggle="modal" data-target="#inserirIngredienteSecundario"></button>
                        </div>
                    </div>
                    <h4>Ingredientes extras</h4>
                    <table class="table table-striped" id= "ingrediente_extra">
                        <tr>
                            <td>Nome do ingrediente</td>
                            <td>Quantidade utilizada</td>
                            <td>Quantidade líquida</td>
                            <td>Rendimento</td>
                            <td>Preço extra</td>
                        </tr>
                    </table>
                    <div class="form-group">
                        <div align="center">
                            <button id="submit" name="submit" type="submit" value="Send" class="btn glyphicon glyphicon-plus btn-info" aria-hidden="true" data-toggle="modal" data-target="#inserirIngredienteExtra"></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="obs">Observações:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="obs" name="obs" value='<?php echo htmlentities($obs)?>'>
                        </div>
                    </div>
                    <div class="form-group">        
                        <div align="center">
                            <button id="submit" name="submitted" type="button" value="Send" class="btn btn-sucess">Inserir receita</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>