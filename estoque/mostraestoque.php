<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <?php
            include "../bootstrap.php" 
        ?>
        <!--<?php
            //include "../estoque/insereItemModal.html"
            //include "teste.php"
        ?>-->
        <?php
            include "../estoque/modificaItemModal.html"
        ?>
        
        <script src="jquery-1.11.3.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="jquery.tablesorter.min.js"></script>
    </head>
    <body>
        <script type="text/javascript" >
            $(document).ready(function() { 
                $("#tabelaEstoque").tablesorter(); 
            } 
            ); 
        </script>

        <div class="container">
            <div>
                <h3>
                    <?php
                        echo  $_SESSION["nomeItem"]. " " . $_SESSION["erro"] . "<br>";
                        session_destroy(); 
                    ?>
                </h3>
            </div>
                <?php
                    require_once("../connection.php");
                    
                    $sql = "SELECT `nome` , `quantidade` , `quantidade_tipo` , `custo` , `data_modificacao` FROM `estoque`";
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
            
            <!-- Trigger the modal with a button -->
            <a href="../estoque/insereItemModal.php" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Inserir novo item no estoque</a>
        </div>
    </body>
</html>