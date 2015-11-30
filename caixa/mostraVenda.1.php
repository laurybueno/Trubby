<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/header.inc.php";

session_start();

include "../caixa/insereItemVenda.php";
include "../caixa/deletaItemVenda.php";

$_SESSION['valor_atual'] = 0;

/*
echo "<pre>";
    print_r($_SESSION['venda_atual']);
echo "</pre>";
*/    

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
            $(document).on("click", ".open-InsereDialog", function () {
                 var key = $(this).data("key");
                 $(".modal-body #key").val(key);
            });
        </script>
        <script>
            $(document).on("click", ".open-DeletaDialog", function () {
                 var key = $(this).data("key");
                 $(".modal-body #key").val(key);
            });
        </script>

        <div class="container">
            </br>
            
            <a href="../caixa/mostraCaixa.php" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>

            </br>
            </br>
            </br>
            
            <?php
            // ******* CHAMADA PARA API (WIP) *******
            
            $decoded = $_SESSION['venda_atual'];

            //*******                         *******
            ?>
            
                
            <table class="table table-striped" id="tabelaEstoque">
                <thead>
                    <tr>
                        <td> <strong>Item</strong> </td>
                        <td> <strong>Quantidade</strong> </td>
                        <td> <strong>Preço</strong> </td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            if ($decoded == null) echo "Insira um item na venda";
                            else{
                                foreach($decoded as $key => $aux) {
                                    
                                    
                                    $valor_atual_com_ponto = str_replace(",",".",$_SESSION['valor_atual']);
                                    $preco_total = $aux['preco_venda'] + $valor_atual_com_ponto;
                                    $preco_total = str_replace(".",",",$preco_total);
                                
                                    $preco_com_virgula = str_replace(".",",",$aux['preco_venda']);
                                
                                    $_SESSION['valor_atual'] = $preco_total;
                                    
                                    echo
                                        '
                                        <td>' .$aux['id_produto'] .'</td>
                                        <td>' .$aux['quantidade'] .'</td>
                                        <td>' .$preco_com_virgula .'</td>
                                        ';
                            
                        ?>
                        <td>
                            <form class="form-horizontal"  action="" role="form" method="POST">
                                <button type="button" data-key="<?php echo $key?>" class="open-DeletaDialog btn btn-info btn-lg" data-toggle="modal" data-target="#deletarItemVenda">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Remover
                                </button>
                            </form>
                        </td>
                    </tr>
                        <?php        
                                }
                            }
                        ?>

                </tbody>
            </table>
            
            <strong>Preço Total: <?php echo $_SESSION['valor_atual']?></strong>
            
            </br>
            </br>
            </br>
       
            <!-- INSERIR ITEM -->
            <button type="button" data-key="<?php echo count($_SESSION['venda_atual'])?>" class="open-InsereDialog btn btn-info btn-lg" data-toggle="modal" data-target="#adicionarItemVenda">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Adicionar Item
            </button>
            <a href="../caixa/cancelaVenda.php" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar Venda</a>
            <a href="../caixa/insereVenda.php" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirmar Venda</a>
        </div>
    </body>
</html>