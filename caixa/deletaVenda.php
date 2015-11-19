<?php

include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";
?>

<!-- Modal -->
<div id="deletarVenda" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Deletar item</h2>
            </div>
            <div class="modal-body">
                <form class="form-horizontal"  action="../caixa/deletaVendaBack.php" role="form" method="post">
                    <h4>Qual item quer deletar:</h4>
                    <input type="text" class="form-control" id="id" name="id">
                    <div class="form-group">        
                        <div align="center">
                            <input id="submit" name="submitted" type="submit" value="Confirmar" class="btn btn-lg btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
