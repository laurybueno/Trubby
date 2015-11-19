<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/header.inc.php";

if(!$dados_usuario[validade]){
    header('Location: ../usuario/nao_logado.php');
}

include "deleta_receita.php";

?>

<!DOCTYPE html>
<html>
    <head>
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
                        $("#tabela_receita").tablesorter(); 
                    }); 
                </script>

                <script>
                    $(document).on("click", ".open-DeletaDialog", function () {
                        var id = $(this).data("id");
                        $(".modal-body #id_produto").val(id);
                    });
                </script>
                        
            
                <!-- script para linkar a linha da tabela ( O LUCAS FEZ ISSO N SEI OQ É PLS HELP )-->
                <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $(".clickable-row").click(function() {
                            window.document.location = $(this).data("href");
                        });
                    });
                </script>
                
                <?php

                    $resposta = le_receita($id_usuario = $dados_usuario[id_usuario]);
                    

                ?> 
                
                <table class="table table-striped" id="tabela_receita">
                    <thead>
                        <tr>
                            <td> <strong>Nome da receita</strong> </td>
                            <td> <strong>Foto</strong> </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                foreach($resposta as $key => $aux) {
                                    echo
                                        '
                                        <td>' .$aux[foto] .'</td>
                                        <td>' .$aux[nome_tecnico] .'</td>
                                        ';
                            ?>
                            <td>
                                <form class="form-horizontal"  action="" role="form" method="POST">
                                    <a href="../receitas/modifica_receita.php?id_produto=<?= $aux[id_produto]?>" class="btn btn-info btn-lg">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Modificar</a>
                                 </form>
                            </td>
                            <td>
                                <form class="form-horizontal"  action="" role="form" method="POST">
                                    <button type="button" data-id="<?= $aux[id_produto]?>" class="open-DeletaDialog btn btn-info btn-lg" data-toggle="modal" data-target="#deletar_receita">
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
                    <a class="btn btn btn-info btn-lg" href="insere_receita.php" role="button">Inserir nova receita</a>
                </p>
            </div>
        </div>
    </body>
</html>