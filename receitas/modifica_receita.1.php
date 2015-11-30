<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/header.inc.php";

if (!empty($_POST[submitted])) {

    $ingredientes = array();
    $id_e_nome = $_POST[nome];
    
    for($i = 0; $i < $_POST[contador]; $i++){
        //echo $i . " " . $_POST['contador'];
        $id_produto = explode(".", $id_e_nome[$i]);
        $ingredientes[$i] = array(
            id_estoque => $id_produto[0],
            quantidade_liq => $_POST[quantidade_liquida][$i],
            quantidade_brt => $_POST[quantidade_utilizada][$i],
            rendimento => $_POST[rendimento][$i],
            tipo => "primario",
            preco_extra => "0"
        );
    }
    
    $array_info = array(
            id_produto => $_GET[id_produto],
            id_usuario => $dados_usuario[id_usuario],
            nome_tecnico => $_POST[nome_receita],
            modo_preparo => $_POST[modo_preparo],
            seq_montagem => $_POST[seq_montagem],
            equipamento => $_POST[equipamento],
            n_porcoes => $_POST[n_porcoes],
            peso_porcao => $_POST[peso_porcao],
            obs => $_POST[obs],
            foto => "foto.jpg",
            ingredientes => $ingredientes
        );
    
    /*
    echo '<pre>';
    echo print_r($_POST);
    echo print_r($array_info);
    echo '</pre>';
    */
    
    
    modifica_receita($array_info);
    
    header("Location: ../receitas/mostra_receita.php");
    
}

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
            
            $estoque = le_estoque($dados_usuario[id_usuario]);
            
            /*
            echo '<pre>';
            echo print_r($receita);
            echo '</pre>';
            
            
            echo '<pre>';
            echo print_r($estoque);
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
                            <input type="text" class="form-control" id="nome_receita" name="nome_receita" value="<?= $receita[nome_tecnico]?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="modo_preparo">Modo de preparo:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="modo_preparo" name="modo_preparo" value="<?= $receita[modo_preparo]?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="seq_montagem">Sequencia de montagem:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="seq_montagem" name="seq_montagem" value="<?= $receita[seq_montagem]?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="equipamento">Equipamentos:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="equipamento" name="equipamento" value="<?= $receita[equipamento]?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="n_porcoes">Número de porções:</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="n_porcoes" name="n_porcoes" value="<?= $receita[n_porcoes]?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="peso_porcao">Peso da porção (g):</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="peso_porcao" name="peso_porcao" value="<?= $receita[peso_porcao]?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="obs">Observações:</label>
                        <div class="col-sm-7">
                            <!--<textarea class="form-control" rows="3"></textarea>-->
                            <input type="text" class="form-control" id="obs" name="obs" value="<?= $receita[obs]?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="contador">Contador Ingredientes:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="contador" name="contador" value="<?= (count($receita[ingredientes]) + 1)?>">
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
                                        <td>

                                            <select id="nome[]" name="nome[]" class="form-control">

                                                <option><?= $ingrediente[id_estoque].'. '.$ingrediente[nome]?></option>

                                            </select>
                                            
                                        </td>
                                        <td><input id="quantidade_utilizada[]" name="quantidade_utilizada[]" required type="number" class="form-control" value="<?= $ingrediente[quantidade_brt]?>"></td>
                                        <td><input id="quantidade_liquida[]" name="quantidade_liquida[]" required type="number" class="form-control" value="<?= $ingrediente[quantidade_liq]?>"></td>
                                        <td><input id="rendimento[]" name="rendimento[]" required type="number" class="form-control" value="<?= $ingrediente[rendimento]?>"></td>
                                        <td>
                                            <button id="BtnAdd_0" name="BtnAdd_0" type="button" class="clone btn btn-success"><i class="fa fa-plus-circle">+</i></button>
                                            <button id="BtnDel_0" name="BtnDel_0" type="button" class="remove btn btn-danger"><i class="fa fa-trash-o"></i>-</button>
                                        </td>
                                    </tr>

                                <?php
                                // INGREDIENTES ATUAIS
                                }
                                
                                ?>
                                
                                <tr id="clonedInput0" class="clonedInput" name="clonedInput0">
                                        <td>

                                            <select id="nome[]" name="nome[]" class="form-control">
                                                <?php
                                                    foreach($estoque as $key => $aux) {
                                                        echo
                                                            '
                                                            <option>'.$aux[id_produto].'. '.$aux[nome].'</option>
                                                            ';
                                                    }
                                                ?>
                                            </select>
                                            
                                        </td>
                                        <td><input id="quantidade_utilizada[]" name="quantidade_utilizada[]" required type="number" class="form-control"></td>
                                        <td><input id="quantidade_liquida[]" name="quantidade_liquida[]" required type="number" class="form-control"></td>
                                        <td><input id="rendimento[]" name="rendimento[]" required type="number" class="form-control"></td>
                                        <td>
                                            <button id="BtnAdd_0" name="BtnAdd_0" type="button" class="clone btn btn-success"><i class="fa fa-plus-circle">+</i></button>
                                            <button id="BtnDel_0" name="BtnDel_0" type="button" class="remove btn btn-danger"><i class="fa fa-trash-o"></i>-</button>
                                        </td>
                                    </tr>
                            
                            </tbody>
                            </table>
                    </div>
                    <br class="clearfix" />

                    <div class="form-group">        
                        <div align="center">
                            <input id="submit" name="submitted" type="submit" value="Confirmar" class="btn btn-lg btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>