<?php

header('Content-Type: application/json; charset=utf-8');
 
echo "Requisição HTTP recebida: ".$_SERVER['REQUEST_METHOD']."\n\n\n\n";

echo "Dados brutos recebidos no corpo da requisição HTTP:\n\n";

$corpo =  file_get_contents("php://input");
echo $corpo."\n\n\n";

echo "Presumindo que os dados no corpo estejam em JSON, a conversão para array é: \n\n\n";
print_r(json_decode($corpo));

?>