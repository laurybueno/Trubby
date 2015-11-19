<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/header.inc.php";

if(!$dados_usuario[validade]){
    header('Location: ../usuario/nao_logado.php');
}

include "../caixa/deletaVenda.php";
    

?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>

        <script type="text/javascript" >
            $(document).ready(function() { 
                $("#tabelaEstoque").tablesorter({ 
                    sortInitialOrder: 'desc',sortList: [[4,1]]
                });
            });
        </script>

        <script>
            $(document).on("click", ".open-DeletaDialog", function () {
                 var id = $(this).data("id");
                 $(".modal-body #id").val(id);
            });
        </script>


        <div class="container">
            </br>
            
            <a href="../index.php" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>

            </br>
            </br>
            </br>
            
            <?php
            $decoded = le_caixa($id_usuario = $dados_usuario[id_usuario]);
            
            //echo "<pre>";
                //print_r($decoded);
            //echo "</pre>";
            ?>
            
                
                <table class="table table-striped" id="tabelaEstoque">
                    <thead>
                        <tr>
                            <td> <strong>ID da Venda</strong> </td>
                            <td> <strong>Preço</strong> </td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                foreach($decoded as $key => $aux) {
                                    $preco_venda = str_replace(".",",",$aux['total_venda']);
                                    echo
                                        '
                                        <td>' .$aux['id_venda'] .'</td>
                                        <td>' .$preco_venda .'</td>
                                        ';
                            ?>
                            <td>
                                <form class="form-horizontal"  action="" role="form" method="POST">
                                    <button type="button" data-id="<?php echo $aux['id_venda']?>" class="open-DeletaDialog btn btn-info btn-lg" data-toggle="modal" data-target="#deletarVenda">
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
            <a href="mostraVenda.php" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Nova Venda</a>
        </div>
    </body>
</html>