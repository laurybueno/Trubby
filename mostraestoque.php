<!DOCTYPE html>
<html>
    <head>
        <?php
            include "bootstrap.php"
        ?>
       
    </head>
    <body>
        <script src="jquery-1.11.3.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
            
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        
                        <td> <strong>Nome do ingrediente</strong> </td>
                        <td> <strong>Quantidade</strong> </td>
                        <td> <strong>Unidade</strong> </td>
                        <td> <strong>Preço unitário (R$)</strong> </td>
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
                        <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modificarEstoque">Modificar</button></td>
                    </tr>
                    <tr>
                        <td>ovo</td>
                        <td>2</td>
                        <td>duzia</td>
                        <td>4,00</td>
                        <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modificarEstoque">Modificar</button></td>
                    </tr>
                </tbody>
            </table>
            
            
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#inserirItemEstoque">Inserir novo item no estoque</button>
            <?php
                include "modal/insereItemModal.html"
            ?>
            

        </div>
    </body>
</html>