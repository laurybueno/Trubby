<!-- Modal -->
<div id="inserirIngredienteExtra" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Inserir novo ingrediente primario?</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal"  role="form" >

                    <!--nome do ingrediente com dropdown -->
                     <div class="form-group" >
                        <label class="control-label col-sm-3" for="nomeIngrediente">Nome do ingrediente*:</label>
                        <div class="col-sm-7">
                            <select>
                                <?php
                                $sql = "SELECT `id_estoque`,`nome` FROM `estoque` WHERE id_usuario = 10";
                                $resultado = mysql_query($sql);
                                mysql_close($con);
                                    while($linha = mysql_fetch_array($resultado)){
                                        echo '<option '.$linha['id_estoque'].'>'.$linha['nome'].'</option>';
                                    }
                                ?>
                            </select> 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="qntUtilizada">Quantidade utilizada*:</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="qntUtilizada" name="qntUtilizada" placeholder="quantidade utilizada em ****unidade do ingrediente*** Ex.: 200" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="qntLiquida">Quantidade liquida*:</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="qntLiquida" name="qntLiquida" placeholder="quantidade liquida em ****unidade do ingrediente*** Ex.: 200" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="rendimento">Rendimento/fator de correção (%)*:</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="rendimento" name="rendimento" placeholder="rendimento/fator de correção Ex.: 100" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="precoExtra">Preço extra (R$)*:</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="precoExtra" name="precoExtra" placeholder="Ex: 2,50" >
                        </div>
                    </div>
                    <div class="form-group">        
                        <div align="center">
                            <button  class="btn btn-primary" onclick="insereIngredienteExtra(this.form)">Confirmar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>