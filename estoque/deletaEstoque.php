<?php
    include "../bootstrap.php";
    require_once("../connection.php");
    include "../valida_session.inc.php";
    if($login === false){
        header("Location: ../usuario/naoLogado.php");
    }
    
?>

<!-- Modal -->
<div id="deletarItemEstoque" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Deletar item</h2>
            </div>
            <div class="modal-body">
                <form class="form-horizontal"  action="../estoque/deletaEstoqueBack.php" role="form" method="post">
                    <?php
                        echo "teste";
                        echo $id;
                    ?>
                    <h4>Você tem certeza que deseja deletar tal item?</h4>
                    <input type="hidden" name="idDoItem" id="idDoItem" value=""/>
                    <p>Essa ação não pode ser desfeita</p>
                    
                    <?php
                        $variable = $sql;
                        echo $variable;
                        echo $_SESSION["idItem"];
                        echo "teste";
                        echo $teste;
                                        
                    ?>
                    
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
