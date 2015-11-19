<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/header.inc.php";

if (!empty($_POST['submitted'])) {
    
    $ingredientes = array();
    $id_e_nome = $_POST['nome'];
    $id_produto = explode(".", $id_e_nome); 

    $arrayInfo = array(
            id_produto => $id_produto[0],
            id_usuario => $dados_usuario[id_usuario],
            preco_venda => $_POST['precoVenda'],
            alerta_amarelo => $_POST['alertaAmarelo'],
            alerta_vermelho => $_POST['alertaVermelho']
        );
        
    //echo "<pre>";
        //print_r($_POST);
        //print_r($arrayInfo);
    //echo "</pre>";
    
    insere_cardapio($arrayInfo);
    
    header("Location: ../cardapio/mostra_cardapio.php");
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <div class="container">
            </br>
            
            <a href="../cardapio/mostra_cardapio.php" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>
            
            </br>
            </br>
            </br>
            
            <?php
            
                //CHAMA A API
                $decoded = options_cardapio($dados_usuario[id_usuario]);
                
            ?>
            
            <form class="form-horizontal" role="form" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nomeItem">Nome do item*:</label>
                    <div class="col-sm-7">
                        <select name="nome" class="form-control">
                            <?php
                                foreach($decoded as $key => $aux) {
                                    echo
                                        '
                                        <option>'.$aux['id_produto'].'. '.$aux['nome'].'</option>
                                        ';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" for="precoVenda">Preço de venda (em reais)*:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="precoVenda" name="precoVenda" placeholder="Ex.: 4,50" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="alertaAmarelo">Alerta amarelo*:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="alertaAmarelo" name="alertaAmarelo" placeholder="Ex.: 50" >
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" for="alertaVermelho">Alerta vermelho*:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="lertaVermelho" name="alertaVermelho" placeholder="Ex.: 15" >
                    </div>
                </div>
                
                <div class="form-group">        
                    <div align="center">
                        <input id="submit" name="submitted" type="submit" value="Inserir no Cardapio" class="btn btn-lg btn-primary btn-block">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>