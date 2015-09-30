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
                <?php
                    require_once("../connection.php");
                    
                    $sql = "SELECT `nome`, 'foto' FROM `fichas`";
                    $resultado = mysql_query($sql);
                    mysql_close($con);
                    
                        
                    echo 
                        '<table class="table table-striped" id="tabelaReceita">
                            <thead>
                                <tr>
                                    <td></td>
                                    <td> <strong>Nome da receita</strong> </td>
                                    <td> <strong>Foto</strong> </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>';
                                while($linha = mysql_fetch_array($resultado)){
                                    echo
                                        '<tr>
                                            <td>
                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#">
                                                    <span aria-hidden="true"></span> Mais informações
                                                </button>
                                            </td>
                                            <td>
                                                ' .$linha['nome'] .'
                                            </td>
                                            <td>
                                                ' .$linha['foto'] .'
                                                </td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#">
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
            <a href="/insereReceita.php" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Inserir nova ficha técnica</a>
        </div>
    </body>
</html>