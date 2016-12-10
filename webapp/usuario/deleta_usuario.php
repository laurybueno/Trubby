<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";

deleta_usuario($dados_usuario[id_usuario]);

header("Location: ../index.php");

?>