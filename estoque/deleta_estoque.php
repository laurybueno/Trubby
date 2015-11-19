<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";
?>

<!-- Modal -->
<div id="deletar_item_estoque" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Deletar item</h2>
            </div>
            <div class="modal-body">
                <form class="form-horizontal"  action="../estoque/deleta_estoque_back.php" role="form" method="post">
                    <h4>Você tem certeza que deseja deletar este item?</h4>
                    <input type="hidden" name="id_produto" id="id_produto"/>
                    <p>Essa ação não pode ser desfeita</p>
                    <div class="form-group">        
                        <div align="center">
                            <button id="submit" name="submitted" type="submit" value="Send" class="btn btn-primary">Confirmar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
