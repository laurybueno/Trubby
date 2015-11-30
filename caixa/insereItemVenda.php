<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";
?>

<!-- Modal -->
<div id="adicionarItemVenda" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Adicionar item</h2>
            </div>
            <div class="modal-body">
                <form class="form-horizontal"  action="../caixa/insereItemVendaBack.php" role="form" method="post">
                    <input type="hidden" class="form-control" id="key" name="key">
                    <h4>Qual item quer adicionar:</h4>
                    
                    <?php $decoded = le_cardapio($dados_usuario[id_usuario]); ?>
                    <label for="produto">Produto:</label>
                    <select id="produto" name="produto" class="form-control">
                        <?php
                            foreach($decoded as $key => $aux){
                                echo
                                    '
                                    <option>'.$aux['id_produto'].'. '.$aux['nome'].'. '.$aux['preco_venda'].'</option>
                                    ';
                            }
                        ?>
                    </select>
                    <label for="quantidade">Quantidade:</label>
                    <input type="number" class="form-control" id="quantidade" name="quantidade">
                    </br>
                    <div class="form-group">        
                        <div align="center">
                            <input id="submit" name="submitted" type="submit" value="Confirmar" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
