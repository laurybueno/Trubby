<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/header.inc.php";
?>

<div class="container">
    <?php if($dados_usuario[validade]){ ?>

    <div class="container-fluid">
        </br>                
        <a class="btn btn-default" href="https://trubby-flashfox.c9.io/usuario/deleta_usuario.php" role="button">Encerrar Conta</a>
        </br>
        </br>
        </br>
    </div>
    
    <?php } ?>
</div>