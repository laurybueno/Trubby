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
            
            <a href="../cardapio/mostra_cardapio.php" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>
            
            </br>
            </br>
            </br>
            
            <?php
            
                $detalhes = le_cardapio($dados_usuario[id_usuario], $_GET[id_produto]);
                
            ?>
            
            <form class="form-horizontal" role="form" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nome">Nome:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="nome" name="nome" value="<?= $detalhes[nome]?>" disabled>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" for="precoVenda">Preço de venda (em reais)*:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="precoVenda" name="precoVenda" placeholder="Ex.: 4,50" value="<?= $detalhes[preco_venda]?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="alertaAmarelo">Alerta amarelo*:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="alertaAmarelo" name="alertaAmarelo" placeholder="Ex.: 50" value="<?= $detalhes[alerta_amarelo]?>" disabled>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" for="alertaVermelho">Alerta vermelho*:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="lertaVermelho" name="alertaVermelho" placeholder="Ex.: 15" value="<?= $detalhes[alerta_vermelho]?>" disabled>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>