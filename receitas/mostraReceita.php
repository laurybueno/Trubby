<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            include "../bootstrap.php" 
        ?>
        
        <script src="../1.RESOURCES/jquery-1.11.3.min.js"></script>
        <script src="../1.RESOURCES/bootstrap/js/bootstrap.min.js"></script>
        <script src="../1.RESOURCES/jquery.tablesorter.min.js"></script>
    </head>
    <body>
        <script type="text/javascript" >
            $(document).ready(function() { 
                $("#tabelaReceita").tablesorter(); 
            }); 
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
                                    #isso nao é seguro (ta mandando um get com o id da receita)
                                        '<tr  class="clickable-row" data-href="/maisInformacoes?receita=' .$linha['id_ficha'] .'"> 
                                            <td>
                                                ' .$linha['nome'] .'
                                            </td>
                                            <td>
                                                ' .$linha['foto'] .'
                                            </td>
                                            
                                        </tr>
                                        ';
                                }
                ?>
                            </tbody>
                        </table>
            
            <!-- Trigger the modal with a button -->
            <a href="/insereReceita.php" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Inserir nova ficha técnica</a>
        </div>
    </body>
</html>