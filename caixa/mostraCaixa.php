<?php
    include "../valida_session.inc.php";
    
    include "../usaApi.php";
    
    include "../caixa/deletaVenda.php";
    
    if($login === false){
        header("Location: ../usuario/naoLogado.php");
    }

    include "../bootstrap.php";

    require_once("../connection.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <script src="../1.RESOURCES/jquery-1.11.3.min.js"></script>
        <script src="../1.RESOURCES/bootstrap/js/bootstrap.min.js"></script>
        <script src="../1.RESOURCES/jquery.tablesorter.min.js"></script>
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
            // ******* CHAMADA PARA API (WIP) *******
            
            $decoded = leCaixa($id_usuario = $idUsuario);

            //*******                         *******
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
                                    echo
                                        '
                                        <td>' .$aux['id_venda'] .'</td>
                                        <td>' .$aux['total_venda'] .'</td>
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