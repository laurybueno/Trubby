<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/header.inc.php";
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>

        <div class="container">
            </br>
            
            <?php
            
            
            $receita = le_receita($dados_usuario[id_usuario], $_GET['id_produto']);
            
            /*
            echo '<pre>';
            echo print_r($receita);
            echo '</pre>';
            */
            
            ?>
            
            <a href="../receitas/mostra_receita.php" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>
            
            </br>
            </br>
            </br>
            
            <div class ="container">
                <form class="form-horizontal" role="form" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="nome_receita">Nome da ficha técnica:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nome_receita" name="nome_receita" value="<?= $receita[nome_tecnico]?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="modo_preparo">Modo de preparo:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="modo_preparo" name="modo_preparo" value="<?= $receita[modo_preparo]?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="seq_montagem">Sequencia de montagem:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="seq_montagem" name="seq_montagem" value="<?= $receita[seq_montagem]?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="equipamento">Equipamentos:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="equipamento" name="equipamento" value="<?= $receita[equipamento]?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="n_porcoes">Número de porções:</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="n_porcoes" name="n_porcoes" value="<?= $receita[n_porcoes]?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="peso_porcao">Peso da porção (g):</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="peso_porcao" name="peso_porcao" value="<?= $receita[peso_porcao]?>" disabled>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="obs">Observações:</label>
                        <div class="col-sm-7">
                            <!--<textarea class="form-control" rows="3"></textarea>-->
                            <input type="text" class="form-control" id="obs" name="obs" value="<?= $receita[obs]?>" disabled>
                        </div>
                    </div>
                    
                    <h2>Ingredientes:</h2>
                    <h4>Ingredientes primários</h4>
                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>Nome do ingrediente</td>
                                    <td>Quantidade utilizada</td>
                                    <td>Quantidade líquida</td>
                                    <td>Rendimento</td>
                                </tr>
                            </thead>
                            
                            <tbody class="tbodyClone">
                                
                                <?php
                                // INGREDIENTES ATUAIS
                                foreach($receita[ingredientes] as $key => $ingrediente){

                                ?>

                                    <tr id="clonedInput0" class="clonedInput" name="clonedInput0">
                                        <td><input id="nome[]" name="nome[]" required type="text" class="form-control" value="<?= $ingrediente[nome]?>" disabled></td>
                                        <td><input id="quantidade_utilizada[]" name="quantidade_utilizada[]" required type="number" class="form-control" value="<?= $ingrediente[quantidade_brt]?>" disabled></td>
                                        <td><input id="quantidade_liquida[]" name="quantidade_liquida[]" required type="number" class="form-control" value="<?= $ingrediente[quantidade_liq]?>" disabled></td>
                                        <td><input id="rendimento[]" name="rendimento[]" required type="number" class="form-control" value="<?= $ingrediente[rendimento]?>" disabled></td>
                                    </tr>

                                <?php
                                // INGREDIENTES ATUAIS
                                }
                                
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                    <br class="clearfix" />
                </form>
            </div>
        </div>
    </body>
</html>