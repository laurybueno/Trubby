<?php
    include "../bootstrap.php";
    include "../usaApi.php";
    
    include "deletaCardapio.php";
    
?>

<!DOCTYPE html>
<html>
    <head>
        <?php
            include "../valida_session.inc.php";
            
            if($login === false){
                header("Location: ../usuario/naoLogado.php");
            }
            
        ?>
        <script src="../1.RESOURCES/jquery-1.11.3.min.js"></script>
        <script src="../1.RESOURCES/bootstrap/js/bootstrap.min.js"></script>
        <script src="../1.RESOURCES/jquery.tablesorter.min.js"></script>
    </head>
    <body>

        <script type="text/javascript" >
            $(document).ready(function() { 
                $("#tabelaCardapio").tablesorter({ 
                    sortInitialOrder: 'desc',sortList: [[4,1]]/////////////////////////tem q mudar
                });
            });
        </script>

        <script>
            $(document).on("click", ".open-DeletaDialog", function () {
                var idItem = $(this).data("id");
                $(".modal-body #id_produto").val( idItem );
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
            
                //CHAMA A API
                $decoded = leCardapio($idUsuario);
            
            ?>
                <table class="table table-striped" id="tabelaCardapio">
                    <thead>
                        <tr>
                            <td> <strong>Nome do item</strong> </td>
                            <td> <strong>Preço venda</strong></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                foreach($decoded as $key => $aux) {
                                    echo
                                        '
                                        <td>' .$aux['nome'] .'</td>
                                        <td>' .$aux['preco_venda'] .'</td>
                                        <td>' .$aux['id_produto'] .'</td>
                                        ';
                            ?>
                            <td>
                                <form class="form-horizontal"  action="" role="form" method="POST">
                                    <button type="button" class="open-ModificaDialog btn btn-info btn-lg" data-toggle="modal" data-target="#modificarItemCardapio">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Modificar
                                    </button>
                                 </form>
                            </td>
                            <td>
                                <form class="form-horizontal"  action="" role="form" method="POST">
                                    <button type="button" data-id="<?php echo $aux['id_produto']?>" class="open-DeletaDialog btn btn-info btn-lg" data-toggle="modal" data-target="#deletarItemCardapio">
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
            <a href="insereCardapio.php" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Inserir novo item (?)àvenda</a>
        </div>
    </body>
</html>