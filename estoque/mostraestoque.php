<?php
    include "../bootstrap.php";

    include "modificaItemModal.php";
    include "deletaEstoque.php";

    require_once("../connection.php");
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
            <a href="../index.php" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>
             <div class="container-fluid">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        
                        <li><a href="../estoque/mostraestoque.php">Estoque</a></li>
                        <li><a href="../receitas/mostraReceita.php">Receitas</a></li>
                        <li><a href="#">Caixa</a></li>
                        <li><a href="#">Cardápio</a></li>
                    </ul>
                </div>
            </div>
            <div>
                <h3>
                    <?php
                        echo  $_SESSION["nomeItem"]. " " . $_SESSION["erro"] . "<br>";
                    ?>
                </h3>
                
            </div>
       
            <?php
                $teste = "OK!";
                
                $sql = "SELECT `id_estoque`,`nome` , `quantidade` , `quantidade_tipo` , `custo` , `data_modificacao` FROM `estoque` WHERE id_usuario = '$idUsuario'";
                $resultado = mysql_query($sql);
                mysql_close($con);
                
            ?>
                
                <table class="table table-striped" id="tabelaEstoque">
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
                                while($linha = mysql_fetch_array($resultado)){
                                    echo
                                        '<td>' .$linha['nome'] .'</td>
                                        <td>' .$linha['quantidade'] .'</td>
                                        <td>' .$linha['quantidade_tipo'] .'</td>
                                        <td>' .$linha['custo'] .'</td>
                                        <td>' .$linha['data_modificacao'] .'</td>';
                                        
                            ?>
                            <td>
                                <form class="form-horizontal"  action="" role="form" method="POST">
                                    <button type="button" data-id="<?php echo $linha['id_estoque']?>" data-nome="<?php echo $linha['nome']?>" data-qnt="<?php echo $linha['quantidade']?>" data-qnttipo="<?php echo $linha['quantidade_tipo']?>" data-custo="<?php echo$linha['custo']?>" class="open-ModificaDialog btn btn-info btn-lg" data-toggle="modal" data-target="#modificarItemEstoque">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Modificar
                                    </button>
                                 </form>
                            </td>
                            <td>
                                <form class="form-horizontal"  action="" role="form" method="POST">
                                    <button type="button" data-nome="<?php echo $linha['nome']?>" class="open-DeletaDialog btn btn-info btn-lg" data-toggle="modal" data-target="#deletarItemEstoque">
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
            <a href="insereEstoque.php" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Inserir novo item no estoque</a>
        </div>
    </body>
</html>