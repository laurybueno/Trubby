<?php
    include "../bootstrap.php";

    require_once("../connection.php");

    include "../valida_session.inc.php";
    if($login === false){
        header("Location: ../usuario/naoLogado.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <div class="container">
            </br>
            
            <a href="../cardapio/mostraCardapio.php" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>
            
            </br>
            </br>
            </br>
            
            <form class="form-horizontal" role="form" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nomeItem">Nome do item*:</label>
                    <div class="col-sm-7">
                        <select name="nome" class="form-control">
                            <?php
                                $sql = "SELECT nome FROM estoque WHERE id_usuario = 10";
                                $resultado = mysql_query($sql);
                                mysql_close($con);
                                while($linha = mysql_fetch_array($resultado)){
                            ?>
                                <option value=<?php echo $linha['nome'];?>><?php echo $linha['nome'];?></option>
                            <?php
                                }
                                $sql = "SELECT nome FROM fichas WHERE id_usuario = 10";
                                $resultado = mysql_query($sql);
                                mysql_close($con);
                                while($linha = mysql_fetch_array($resultado)){
                            ?>
                                <option value=<?php echo $linha['nome'];?>><?php echo $linha['nome'];?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" for="precoVenda">Preço de venda (em reais)*:</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="precoVenda" name="qprecoVenda" placeholder="Ex.: 4,50" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="alertaAmarelo">Alerta amarelo*:</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="alertaAmarelo" name="alertaAmarelo" placeholder="Ex.: 50" >
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" for="alertaVermelho">Alerta vermelho*:</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="lertaVermelho" name="lertaVermelho" placeholder="Ex.: 15" >
                    </div>
                </div>
                
                <div class="form-group">        
                    <div align="center">
                        <button id="submit" name="submitted"  type="button" value="Send" class="btn btn-success">Inserir no cardápio</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>