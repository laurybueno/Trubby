<?php
    include "../valida_session.inc.php";
        
    if($login === false){
        header("Location: ../usuario/naoLogado.php");
    }
    
?>
<!-- Modal -->
<div id="modificarItemEstoque" class="modal fade" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modificar item</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal"  action="../estoque/modificaItemBack.php" role="form" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="idDoItem"></label>
                        <div class="col-sm-7">
                            <input type="hidden" class="form-control" id="idDoItem" name="idDoItem" placeholder="Ex.: Morango" value='<?php echo htmlentities($nomeItem)?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="nomeItem">Nome do item*:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nomeItem" name="nomeItem" placeholder="Ex.: Morango" value='<?php echo htmlentities($nomeItem)?>'>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="quantidade">Quantidade*:</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Ex.: 60" value='<?php echo htmlentities($quantidade)?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="unidades">Unidade*:</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="unidade" name="unidade">
                                <option value = "Lt" <?php echo $unidade =='Lt'?'selected':''; ?>>Lt</option>
                                <option value = "Kg" <?php echo $unidade =='Kg'?'selected':''; ?>>Kg</option>
                                <option value = "Dz" <?php echo $unidade =='Dz'?'selected':''; ?>>Dz</option>
                                <option value = "Mç" <?php echo $unidade =='Mç'?'selected':''; ?>>Mç</option>
                                <option value = "Us" <?php echo $unidade =='Us'?'selected':''; ?>>Us</option>
                                <option value = "Co" <?php echo $unidade =='Co'?'selected':''; ?>>Co</option>
                                <option value = "Qb" <?php echo $unidade =='Qb'?'selected':''; ?>>Qb</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="precoUnidade">Preço da unidade*:</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <div class="input-group-addon">R$</div>
                                <input type="text" class="form-control" id="precoUnidade" name="precoUnidade" placeholder="Ex.: 2,50" value='<?php echo htmlentities($precoUnidade)?>'>
                            </div>
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
