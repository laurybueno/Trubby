<?php
    include "../bootstrap.php"; 

    require_once("../connection.php");
?>

<?php

$msg_erro ='';

if (!empty($_POST['submitted'])) {
    
    session_start();
    
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    $resultado = mysql_query("SELECT * FROM usuarios WHERE email='$email'");
    $linhas = mysql_num_rows($resultado);

    if($linhas == 0){ // Sem Usuário
    
        $msg_erro = 'Usuário não encontrado';
        
    } else {
        
        if($senha != mysql_result($resultado, 0, 'senha')){ // Senha incorreta
        
            $msg_erro = 'Senha incorreta';
            
        } else { // Login com sucesso, cria os cookies!
            $_SESSION["email"] = $email;
            $_SESSION["senha"] = $senha;
            header("Location: ../index.php");
        }
        
    }
    
    mysql_close($con);
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <?php
            /*
            include "../valida_session.inc.php";

            if($login === true){
                header("Location: ../index.php");
            }
            */
                
        ?>
    </head>
    <body>
        <div class="container">
            <a href="../index.php" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">Faça login para continuar no trubby</h1>
                    <div class="account-wall">
                        <br>
                        <form class="form-horizontal" action="" method="POST">
                            
                            <!-- E-mail -->
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="senha">E-mail:</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-lg" id="email" name="email" placeholder="Ex.: meu@email.com" value=''>
                                </div>
                            </div>

                            <!-- Senha -->
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="senha">Token de autorização memorizável:</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control input-lg" id="senha" name="senha" placeholder="Ex.: ************" value=''>
                                </div>
                            </div>

                            <!-- BOTÃO DE CONECTAR -->
                            <input id="submit" name="submitted" type="submit" value="Conectar" class="btn btn-lg btn-primary btn-block">
                            <div align="center">
                                <span class="label label-danger">
                                    <?php
                                        echo  $_SESSION["erro"] . "<br>";
                                    ?>
                                </span>
                            </div>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="lembrar-me"> Lembrar-me
                            </label>
                            
                            <a href="loginAjuda.php" class="pull-right need-help">Precisa de ajuda?</a><span class="clearfix"></span>
                        </form>
                    </div>
                    <a href="cadastro.php" class="text-center new-account">Criar uma conta </a>
                </div>
            </div>
        </div>
    </body>
</html>