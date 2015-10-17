<!DOCTYPE html>
<html>
    <head>
        <?php
        include "../valida_session.inc.php";
            
            if($login === false){
                header("Location: ../usuario/naoLogado.php");
            }
            include "../bootstrap.php";
            include "deletaReceita.php"
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
                        
                        <li><a href="../estoque/mostraestoque.php">Estoque</a></li>
                        <li><a href="receitas/mostraReceita.php">Receitas</a></li>
                        <li><a href="#">Caixa</a></li>
                        <li><a href="#">Cardápio</a></li>
                    </ul>
                </div>
            </div>
            
    
            <div class="container">
                <!-- script para ordenar a tabela -->
                <script type="text/javascript" >
                    $(document).ready(function() { 
                        $("#tabelaReceita").tablesorter(); 
                    }); 
                </script>

                <script>
                    $(document).on("click", ".open-DeletaDialog", function () {
                         var nomeItem = $(this).data("nome");
                         $(".modal-body #nomeItem").val(nomeItem);
                    });
                    
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
                    

                ?> 
                <table class="table table-striped" id="tabelaReceita">
                    <thead>
                        <tr>
                            <td> <strong>Nome da receita</strong> </td>
                            <td> <strong>Foto</strong> </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($linha = mysql_fetch_array($resultado)){
                        ?>
                                <tr> 
                                    <td> <?php  echo $linha['nome']; ?> </td>
                                    <td> <?php  echo $linha['foto']; ?> </td>
                                    <td>
                                        <form class="form-horizontal"  action="" role="form" method="POST">
                                            <p>
                                                <a class="btn btn-info btn-lg glyphicon glyphicon-edit" data-id="<?php echo $linha['id_ficha']; ?>" href="modificaReceita.php" role="button">Modificar</a>
                                            </p>
                                         </form>
                                    </td>
                                    <td>
                                        <form class="form-horizontal"  action="" role="form" method="POST">
                                            <button type="button" data-nome="<?php echo $linha['nome'];?>" class="open-DeletaDialog btn btn-info btn-lg" data-toggle="modal" data-target="#deletarItemReceita">
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
                <p>
                    <a class="btn btn btn-info btn-lg" href="insereReceita.php" role="button">Inserir nova receita</a>
                </p>
            </div>
        </div>
    </body>
</html>