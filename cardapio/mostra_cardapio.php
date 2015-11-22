<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/header.inc.php";

if(!$dados_usuario[validade]){
    header('Location: ../usuario/nao_logado.php');
}

include "deletaCardapio.php";
include "modificaCardapioModal.php";
    
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>

        <script type="text/javascript" >
            $(document).ready(function() { 
                $("#tabelaCardapio").tablesorter({ 
                    sortInitialOrder: 'desc',sortList: [[4,1]]/////////////////////////tem q mudar
                });
            });
        </script>

        <script>
            $(document).on("click", ".open-DeletaDialog", function () {
                var idItem = $(this).data("id");
                $(".modal-body #id_produto").val( idItem );
            });
        </script>
        
        <script>
            $(document).on("click", ".open-ModificaDialog", function () {
                var idItem = $(this).data("id");
                $(".modal-body #idItem").val(idItem);
                
                var nome = $(this).data("nome");
                var preco = $(this).data("preco");
                var amarelo = $(this).data("amarelo");
                var vermelho = $(this).data("vermelho");
                $(".modal-body #nomeItem").val(nome);
                $(".modal-body #precoVenda").val(preco);
                $(".modal-body #alertaAmarelo").val(amarelo);
                $(".modal-body #alertaVermelho").val(vermelho);
                
            });
            
        </script>
        
        


        <div class="container">
            </br>
            
            <a href="../index.php" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>
            
            
            </br>
            </br>
            </br>
            
            <?php
            
                //CHAMA A API
                $decoded = le_cardapio($dados_usuario[id_usuario]);
            
            ?>
                <table class="table table-striped" id="tabelaCardapio">
                    <thead>
                        <tr>
                            <td> <strong>Nome do item</strong> </td>
                            <td> <strong>Preço venda</strong></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                foreach($decoded as $key => $aux) {
                                    echo
                                        '
                                        <td>' .$aux['nome'] .'</td>
                                        <td>' .$aux['preco_venda'] .'</td>
                                        ';
                            ?>
                            <td>
                                <form class="form-horizontal"  action="" role="form" method="POST">
                                    <a href="../cardapio/detalhes_cardapio.php?id_produto=<?= $aux[id_produto]?>" class="btn btn-info btn-lg">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Detalhes</a>
                                 </form>
                            </td>
                            
                            <td>
                                <form class="form-horizontal"  action="" role="form" method="POST">
                                    <button type="button"   data-id="<?php echo $aux['id_produto']?>" 
                                                            data-nome="<?php echo $aux['nome']?>"
                                                            data-preco="<?php echo $aux['preco_venda']?>"
                                                            data-amarelo="<?php echo $aux['alerta_amarelo']?>"
                                                            data-vermelho="<?php echo $aux['alerta_vermelho']?>"
                                                            class="open-ModificaDialog btn btn-info btn-lg" data-toggle="modal" data-target="#modificarItemCardapio">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Modificar
                                    </button>
                                 </form>
                            </td>
                            <td>
                                <form class="form-horizontal"  action="" role="form" method="POST">
                                    <button type="button"   data-id="<?php echo $aux['id_produto']?>" 
                                                            class="open-DeletaDialog btn btn-info btn-lg" data-toggle="modal" data-target="#deletarItemCardapio">
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
            <a href="insereCardapio.php" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Inserir novo item</a>
        </div>
    </body>
</html>