<?php
    session_start();
    
    include "../bootstrap.php"; 
?>

<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <div class="container">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <?php
                        echo "<h1> bla".$login ."   ".$nomeUsuario ."   " .$senha_usuario ."</h1>";
                ?>
                <h1 class="text-center login-title">Essa página só é acessivel se você estiver logado.</h1>
                <p class="text-center"><a class="btn btn-default" href="../usuario/login.php" role="button">Login</a></p>
            </div>
        </div>
    </body>
</html>    
