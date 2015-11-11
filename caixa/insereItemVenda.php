<?php
include "../bootstrap.php";

include "../valida_session.inc.php";
if($login === false){
    header("Location: ../usuario/naoLogado.php");
}
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
                    
                    <?php $decoded = leCardapio($idUsuario); ?>
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
                    <input type="text" class="form-control" id="quantidade" name="quantidade">
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
