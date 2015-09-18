<?php
    include "../bootstrap.php" 
?>

<!DOCTYPE html>
<html>
    <head>
        <script src="jquery-1.11.3.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="jquery.tablesorter.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">Faça login para continuar no trubby</h1>
                    <div class="account-wall">
                        <br>
                        <form class="form-horizontal" action="" method="POST">
                            <input id="usuario" name="usuario" placeholder="usuário" class="form-control input-lg" type="text">
                            <input id="senha" name="senha" placeholder="token de autenticação memorizavel" class="form-control input-lg" type="password">
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Conectar</button>
                            <label class="checkbox pull-left">
                                <input type="checkbox" value="lembrar-me"> Lembrar-me
                            </label>
                            <a href="loginAjuda.php" class="pull-right need-help">Precisa de ajuda? </a><span class="clearfix"></span>
                        </form>
                    </div>
                    <a href="cadastro.php" class="text-center new-account">Criar uma conta </a>
                </div>
            </div>
        </div>
    </body>
</html>