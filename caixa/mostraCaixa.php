<?php
    include "../valida_session.inc.php";
    
    include "../usaApi.php";
    
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
                 var nomeItem = $(this).data("nome");
                 $(".modal-body #nomeItem").val(nomeItem);
            });
        </script>
        
        <script>
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
                            <td> <strong>Número</strong> </td>
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
                                    <button type="button" data-nome="<?php echo $aux['id_venda']?>" class="open-DeletaDialog btn btn-info btn-lg" data-toggle="modal" data-target="#deletarItemEstoque">
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
            <a href="insereEstoque.php" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Nova Venda</a>
        </div>
    </body>
</html>