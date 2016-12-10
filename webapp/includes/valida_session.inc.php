<?php

$dados_usuario = array();

session_start();

if(isset($_SESSION[email])) $email_usuario = $_SESSION[email];
if(isset($_SESSION[senha])) $senha_usuario = $_SESSION[senha];

$array_info = array(
        email => $email_usuario,
        senha => $senha_usuario
    );

$array_infot = array(
        email => '1@1.com',
        senha => '1'
    );

$resposta = login_valida($array_info);

/*
echo '<pre>';
print_r($array_infot);
print_r($resposta);
echo '</pre>';
*/


if(!(empty($email_usuario) OR empty($senha_usuario))){

    if($resposta[validade]){
    
        $dados_usuario = $resposta;
    
    } else {
        
        session_unset();
	    session_destroy();
    
    }

} else {

    session_unset();
	session_destroy();

    
}

?>