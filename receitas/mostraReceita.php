<!DOCTYPE html>
<html>
    <head>
        <?php
        include "../valida_session.inc.php";
            
            if($login === false){
                header("Location: ../usuario/naoLogado.php");
            }
            include "../bootstrap.php";
        ?>
        <script src="../1.RESOURCES/jquery-1.11.3.min.js"></script>
        <script src="../1.RESOURCES/bootstrap/js/bootstrap.min.js"></script>
        <script src="../1.RESOURCES/jquery.tablesorter.min.js"></script>
    </head>
    <body>
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
            
    
            <div class="container">
                <div>
                    <h3>
                        <?php
                            echo  $_SESSION["nomeItem"]. " " . $_SESSION["erro"] . "<br>";
                        ?>
                    </h3>
                </div>
                    <!-- script para ordenar a tabela -->
                    <script type="text/javascript" >
                        $(document).ready(function() { 
                            $("#tabelaReceita").tablesorter(); 
                        }); 
                    </script>
                
                    <!-- script para linkar a linha da tabela-->
                    <script type="text/javascript">
                        jQuery(document).ready(function($) {
                            $(".clickable-row").click(function() {
                                window.document.location = $(this).data("href");
                            });
                        });
                    </script>
                    <?php
                        require_once("../connection.php");
                        
                        $sql = "SELECT `id_ficha`,`nome`, `foto` FROM `fichas`";
                        $resultado = mysql_query($sql);
                        mysql_close($con);
                        
    
                        echo 
                            '<table class="table table-striped" id="tabelaReceita">
                                <thead>
                                    <tr>
                                        <td> <strong>Nome da receita</strong> </td>
                                        <td> <strong>Foto</strong> </td>
                                    </tr>
                                </thead>
                                <tbody>';
                                    while($linha = mysql_fetch_array($resultado)){
                                        echo
                                            '<tr> 
                                                <td>
                                                    ' .$linha['nome'] .'
                                                </td>
                                                <td>
                                                    ' .$linha['foto'] .'
                                                </td>
                                                <td>
                                                    <form class="form-horizontal"  action="" role="form" method="POST">
                                                        <button type="button" data-id="'.$linha['id_ficha'].'" data-nome="'.$linha['nome'].'" data-foto="'.$linha['foto'].'" class="open-ModificaDialog btn btn-info btn-lg" data-toggle="modal" data-target="#modificarItemReceita">
                                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Modificar
                                                        </button>
                                                     </form>
                                                </td>
                                                <td>
                                                    <form class="form-horizontal"  action="" role="form" method="POST">
                                                        <button type="button" data-id="'.$linha['id_ficha'].'" class="open-DeletaDialog btn btn-info btn-lg" data-toggle="modal" data-target="#deletarItemReceita">
                                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Deletar
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            ';
                                    }
                    ?>
                                </tbody>
                            </table>
                <p>
                    <a class="btn btn btn-info btn-lg" href="insereReceita.php" role="button">Inserir nova receita</a>
                </p>
            </div>
        </div>
    </body>
</html>