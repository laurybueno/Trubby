<?php
include "../valida_session.inc.php";

include "../usaApi.php";
    
if($login === false){
    header("Location: ../usuario/naoLogado.php");
}

include "../bootstrap.php";
include "deletaReceita.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <script src="../1.RESOURCES/jquery-1.11.3.min.js"></script>
        <script src="../1.RESOURCES/bootstrap/js/bootstrap.min.js"></script>
        <script src="../1.RESOURCES/jquery.tablesorter.min.js"></script>
    </head>
    <body>
        <div class="container">
            </br>
            
            <a href="../index.php" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>
            
            </br>
            </br>
            </br>
    
            <div class="container">
                <!-- script para ordenar a tabela -->
                <script type="text/javascript" >
                    $(document).ready(function() { 
                        $("#tabelaReceita").tablesorter(); 
                    }); 
                </script>

                <script>
                    $(document).on("click", ".open-DeletaDialog", function () {
                         var nomeItem = $(this).data("nome");
                         $(".modal-body #nomeItem").val(nomeItem);
                    });
                    
                    $(document).on("click", ".open-ModificaDialog", function () {
                        var idItem = $(this).data("id");
                        $(".modal-body #idDoItem").val( idItem );
                        
                        var nomeItem = $(this).data("nome");
                        var qnt = $(this).data("qnt");
                        var tipo = $(this).data("qnttipo");
                        var custo = $(this).data("custo");
                        $(".modal-body #nomeItem").val(nomeItem);
                        $(".modal-body #quantidade").val(qnt);
                        $(".modal-body #unidade").val(tipo);
                        $(".modal-body #precoUnidade").val(custo);
                    });
                    
                </script>
                        
            
                <!-- script para linkar a linha da tabela-->
                <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $(".clickable-row").click(function() {
                            window.document.location = $(this).data("href");
                        });
                    });
                </script>
                <?php

                    $decoded = leReceita($id_usuario = $idUsuario);
                    

                ?> 
                <table class="table table-striped" id="tabelaReceita">
                    <thead>
                        <tr>
                            <td> <strong>Nome da receita</strong> </td>
                            <td> <strong>Foto</strong> </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                foreach($decoded as $key => $aux) {
                                    echo
                                        '
                                        <td>' .$aux['nome_tecnico'] .'</td>
                                        <td>' .$aux['foto'] .'</td>
                                        ';
                            ?>
                            <td>
                                <form class="form-horizontal"  action="" role="form" method="POST">
                                    <button type="button" data-id="<?php echo $aux['id_produto']?>" data-nome="<?php echo $aux['nome']?>" data-qnt="<?php echo $aux['quantidade']?>" data-qnttipo="<?php echo $aux['quantidade_tipo']?>" data-custo="<?php echo $aux['custo']?>" class="open-ModificaDialog btn btn-info btn-lg" data-toggle="modal" data-target="#modificarItemEstoque">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Modificar
                                    </button>
                                 </form>
                            </td>
                            <td>
                                <form class="form-horizontal"  action="" role="form" method="POST">
                                    <button type="button" data-id="<?php echo $aux['id_produto']?>" class="open-DeletaDialog btn btn-info btn-lg" data-toggle="modal" data-target="#deletarItemEstoque">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                            <?php        
                               }
                            ?>
                    </tbody>
                </table>
                <p>
                    <a class="btn btn btn-info btn-lg" href="insereReceita.php" role="button">Inserir nova receita</a>
                </p>
            </div>
        </div>
    </body>
</html>