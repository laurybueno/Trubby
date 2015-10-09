
<!-- Modal -->
<div id="insereReceita" class="modal fade" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Inserir nova ficha tecnica</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal"  action="../estoque/modificaItemBack.php" role="form" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="nomeItem">Nome da ficha técnica*:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nomeItem" name="nomeItem" placeholder="Ex.:crepe de morango" value='<?php echo htmlentities($nomeItem)?>'>
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
                            <input type="number" class="form-control" id="pesoPorcao" name="pesoPorcao" placeholder="peso da porção em gramas Ex.: 2" value='<?php echo htmlentities($nPorcoes)?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="precoVenda">Preço de venda*:</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="precoVenda" name="precoVenda" placeholder="preço de venda em reais Ex.: 2,50" value='<?php echo htmlentities($nPorcoes)?>'>
                        </div>
                    </div>
                    <h2>Ingredientes:</h2>
                    <h4>Ingredientes primários</h4>
                    <!--nome do ingrediente com dropdown -->
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="qntUtilizada">Quantidade utilizada*:</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="qntUtilizada" name="qntUtilizada" placeholder="quantidade utilizada em ****unidade do ingrediente*** Ex.: 200" value='<?php echo htmlentities($nPorcoes)?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="qntLiquida">Quantidade liquida*:</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="qntLiquida" name="qntLiquida" placeholder="quantidade liquida em ****unidade do ingrediente*** Ex.: 200" value='<?php echo htmlentities($nPorcoes)?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="rendimento">Rendimento/fator de correção (%)*:</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="rendimento" name="rendimento" placeholder="rendimento/fator de correção Ex.: 100" value='<?php echo htmlentities($nPorcoes)?>'>
                        </div>
                    </div>
                    <!-- função js para poder colocar mains ingredientes -->
                    <h4>Ingredientes secundários</h4>
                    <!--nome do ingrediente com dropdown -->
                    <!--quantidade utilizada -->
                    <!--quantidade liquida -->
                    <!--rendimento/fator de correção -->
                    <!-- função js para poder colocar mains ingredientes -->
                    <h4>Ingredientes extras</h4>
                    <!--nome do ingrediente com dropdown -->
                    <!--quantidade utilizada -->
                    <!--quantidade liquida -->
                    <!--rendimento/fator de correção -->
                    <!--preço adicional do ingrediente -->
                    <!-- função js para poder colocar mains ingredientes -->
                    
                    
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="obs">Observações:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="obs" name="obs" value='<?php echo htmlentities($nomeItem)?>'>
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
