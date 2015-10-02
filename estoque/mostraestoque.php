<?php
    include "../bootstrap.php"; 

    include "../estoque/modificaItemModal.html";

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
                    sortInitialOrder: 'desc',
                    sortList: [[4,1]]
                });
            });

        </script>

        <div class="container">
            <a href="../index.php" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>
             <div class="container-fluid">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        
                        <li><a href="estoque/mostraestoque.php">Estoque</a></li>
                        <li><a href="receitas/mostraReceita.php">Receitas</a></li>
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
                    
                    $sql = "SELECT `id_estoque`,`nome` , `quantidade` , `quantidade_tipo` , `custo` , `data_modificacao` FROM `estoque` WHERE id_usuario = '$idUsuario'";
                    $resultado = mysql_query($sql);
                    mysql_close($con);
                    
                    
                    echo 
                        '<table class="table table-striped" id="tabelaEstoque">
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
                            <tbody>';
                            while($linha = mysql_fetch_array($resultado)){
                                echo
                                    '<tr>
                                        <td>' .$linha['nome'] .'</td>
                                        <td>' .$linha['quantidade'] .'</td>
                                        <td>' .$linha['quantidade_tipo'] .'</td>
                                        <td>' .$linha['custo'] .'</td>
                                        <td>' .$linha['data_modificacao'] .'</td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modificarItemEstoque">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Modificar
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Deletar
                                            </button>
                                        </td>
                                    </tr>
                                ';
                            }
                ?>
                            </tbody>
                        </table>
            
            <!-- INSERIR ITEM -->
            <a href="insereEstoque.php" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Inserir novo item no estoque</a>
        </div>
    </body>
</html>