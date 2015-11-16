<?php


    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.

    $servername = "54.207.22.190";
    $login = "trubby";
    $senhaDB = "raiztrubby";
    $database = "trubby";
    $dbport = 3306;

    //$mysqli = new mysqli($servername, $login, $senhaDB, $database);
    //if (mysqli_connect_errno()) 
    //    trigger_error(mysqli_connect_error());
    $con = mysql_connect($servername, $login, $senhaDB) or
        die('Erro recebido do servidor MySQL: '.mysql_error());
    mysql_select_db($database, $con);
    /*$con = mysql_connect(getenv('IP'), getenv('C9_USER'), 'trubby') or
                        die('Não foi possível conectar');
   mysql_select_db("trubby", $con);
   */
?>

