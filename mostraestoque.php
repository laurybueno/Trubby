<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <?php
            include "bootstrap.php" 
        ?>
        <?php
            include "modal/insereItemModal.html"
            //include "teste.php"
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
                    <!-- fazer um for pra ir pegando as coisas do xml e colocando na tabela-->
                    <tr>
                        <td>morango</td>
                        <td>5</td>
                        <td>unidade</td>
                        <td>1,00</td>
                        <td>Jan 18, 2009 9:12 AM </td>
                        <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modificarEstoque">Modificar</button></td>
                    </tr>
                    <tr>
                        <td>asa</td>
                        <td>2</td>
                        <td>duzia</td>
                        <td>4,00</td>
                        <td>Jan 18, 2007 9:12 AM </td>
                        <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modificarEstoque">Modificar</button></td>
                    </tr>
                    </tr>
                </tbody>
            </table>
            
            
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#inserirItemEstoque">Inserir novo item no estoque</button>

            

        </div>
    </body>
</html>