<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";
?>
<!-- Modal -->
<div id="modificarItemCardapio" class="modal fade" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modificar item</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal"  action="../cardapio/modificaCardapioBack.php" role="form" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="idDoItem"></label>
                        <div class="col-sm-7">
                            <input type="hidden" class="form-control" id="idItem" name="idItem">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="nomeItem">Nome do item:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nomeItem" name="nomeItem" disabled>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="precoVenda">Preço de venda (em reais):</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="precoVenda" name="precoVenda" placeholder="Ex.: 4,50">
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="alertaAmarelo">Alerta amarelo:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="alertaAmarelo" name="alertaAmarelo" placeholder="Ex.: 50">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="alertaVermelho">Alerta vermelho:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="alertaVermelho" name="alertaVermelho" placeholder="Ex.: 15">
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
    </div>
</div>
