<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/header.inc.php";

if(!$dados_usuario[validade]){
    header('Location: ../usuario/nao_logado.php');
}

include "modifica_item_modal.php";
include "deleta_estoque.php";

?>


<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>

        <script type="text/javascript" >
            $(document).ready(function() { 
                $("#tabela_estoque").tablesorter({ 
                    sortInitialOrder: 'desc',sortList: [[4,1]]
                });
            });
        </script>

        <script>
            $(document).on("click", ".open-DeletaDialog", function () {
                 var id = $(this).data("id");
                 $(".modal-body #id_produto").val(id);
            });
        </script>
        
        <script>
            $(document).on("click", ".open-ModificaDialog", function () {
                var id_item = $(this).data("id");
                var nome_item = $(this).data("nome");
                var qnt = $(this).data("qnt");
                var tipo = $(this).data("qnttipo");
                var custo = $(this).data("custo");
                $(".modal-body #id_item").val( id_item );
                $(".modal-body #nome_item").val(nome_item);
                $(".modal-body #quantidade").val(qnt);
                $(".modal-body #unidade").val(tipo);
                $(".modal-body #preco_unidade").val(custo);
            });
            
        </script>
        
        


        <div class="container">
            </br>
            
            <a href="../index.php" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>
            
            </br>
            </br>
            </br>
            
            <?php
            // ******* CHAMADA PARA API *******
            
            $decoded = le_estoque($dados_usuario[id_usuario]);

            // *******                  *******
            ?>
            
                
                <table class="table table-striped" id="tabela_estoque">
                    <thead>
                        <tr>
                            <td> <strong>Nome do ingrediente</strong> </td>
                            <td> <strong>Quantidade</strong> </td>
                            <td> <strong>Unidade</strong> </td>
                            <td> <strong>Preço unitário (R$)</strong> </td>
                            <td> <strong>Data da ultima modificação</strong></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                foreach($decoded as $key => $aux) {
                                    echo
                                        '
                                        <td>' .$aux[nome] .'</td>
                                        <td>' .$aux[quantidade] .'</td>
                                        <td>' .$aux[quantidade_tipo] .'</td>
                                        <td>' .$aux[custo] .'</td>
                                        <td>' .$aux[data_modificacao] .'</td>
                                        ';
                            ?>
                            <td>
                                <form class="form-horizontal"  action="" role="form" method="POST">
                                    <button type="button"   data-id="<?php echo $aux[id_produto]?>" 
                                                            data-nome="<?php echo $aux[nome]?>" 
                                                            data-qnt="<?php echo $aux[quantidade]?>" 
                                                            data-qnttipo="<?php echo $aux[quantidade_tipo]?>" 
                                                            data-custo="<?php echo $aux[custo]?>" 
                                                            class="open-ModificaDialog btn btn-info btn-lg" data-toggle="modal" data-target="#modificar_item_estoque">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Modificar
                                    </button>
                                 </form>
                            </td>
                            <td>
                                <form class="form-horizontal"  action="" role="form" method="POST">
                                    <button type="button"   data-id="<?php echo $aux[id_produto]?>" 
                                                            class="open-DeletaDialog btn btn-info btn-lg" data-toggle="modal" data-target="#deletar_item_estoque">
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
       
            <!-- INSERIR ITEM -->
            <a href="insere_estoque.php" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Inserir novo item no estoque</a>
        </div>
    </body>
</html>

