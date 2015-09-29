<?php

require_once("$_SERVER[DOCUMENT_ROOT]/connection.php");

$login = false;
$nomeUsuario = '';

session_start();

if(isset($_SESSION["email"])) $email_usuario = $_SESSION["email"];
if(isset($_SESSION["senha"])) $senha_usuario = $_SESSION["senha"];

if(!(empty($email_usuario) OR empty($senha_usuario))){
    
	$resultado = mysql_query("SELECT * FROM usuarios WHERE email='$email_usuario'");
	
	if(mysql_num_rows($resultado)==1){
	    
		if($senha_usuario != mysql_result($resultado,0,"senha")){
		    
		    session_unset();
		    session_destroy();
		    
        } else {
            
            $login = true;
            $nomeUsuario = mysql_result($resultado, 0, 'nome');
            $idUsuario = mysql_result($resultado, 0, 'id_usuario');
            
        }
        
    } else {
        
        session_unset();
		session_destroy();
		    
    }
}



?>