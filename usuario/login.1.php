<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";

$msg_erro ='';

if (!empty($_POST['submitted'])) {
    
    session_set_cookie_params(3600);
    
    session_start();
    
    $array_info = array(
            email => $_POST[email],
            senha => $_POST[senha]
        );
    
    $resposta = login_valida($array_info);
    

    if($resposta[validade]){

        $_SESSION[email] = $_POST[email];
        $_SESSION[senha] = $_POST[senha];
        header("Location: ../index.php");
        
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    </head>
    <body class="login-page">
        <div class="container">
            </br>
            </br>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">trubby</h1>
                    <div class="account-wall">
                        <br>
                        <form class="form-horizontal" action="" method="POST">
                            
                            <!-- E-mail -->
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="senha"></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-lg" id="email" name="email" placeholder="e-mail">
                                </div>
                            </div>

                            <!-- Senha -->
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="senha"></label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control input-lg" id="senha" name="senha" placeholder="senha">
                                </div>
                            </div>

                            <!-- BOTÃO DE CONECTAR -->
                            <input id="submit" name="submitted" type="submit" value="Conectar" class="btn btn-lg btn-primary btn-block">
                        </form>
                    </div>
                    <a href="cadastro.php" class="text-center new-account">Criar uma conta </a>
                </div>
            </div>
        </div>
    </body>
</html>