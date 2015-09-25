<?php
    include "bootstrap.php";

    include "valida_session.inc.php";
?>

<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <div class="container">
            <?php

                if($login === false){
                    echo '
                    
                        <div class="container-fluid">

                            <a class="btn btn-default" href="../usuario/login.php" role="button">Login</a>
                            <a class="btn btn-default" href="../usuario/cadastro.php" role="button">Cadastrar</a>

                        </div>
                        
                    ';
                } else {
                    echo '
                    
                        <div class="container-fluid">

                            <h4>Bem vindo, '. $nomeUsuario .'</h4>
                            <a class="btn btn-default" href="../usuario/logout.php" role="button">Logout</a>

                        </div>
                        
                    
                    ';
                }
            ?>
        </div>
        <div class="container">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="estoque/mostraestoque.php">Estoque</a></li>
                        <!-- <li><a href="estoque/mostraestoque.php">Estoque</a></li> -->
                        <li><a href="#">Receitas</a></li>
                        <li><a href="#">Caixa</a></li>
                        <li><a href="#">Cardápio</a></li>
                    </ul>
                </div>
            </div>
        </div>