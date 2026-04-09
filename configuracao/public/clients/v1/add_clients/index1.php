<?php
require_once __DIR__ . "/../../../../../configuracao/config_clients_v1.php";
require_once __DIR__ . "/../../../../../inc/init.php";
Api::checkHTTPMethod('POST');

// Evita erro quando não existe REQUEST_METHOD
if (!isset($_SERVER["REQUEST_METHOD"])){
    $_SERVER["REQUEST_METHOD"] = 'POST';
}

use Medoo\Medoo;

// Conexão com o banco
$database = new Medoo(MYSQL);

// Seleciona todos os registros da tabela correta
$results = $database->select('meu_client', '*');
var_dump($results);

header('Content-Type: application/json');
echo json_encode($results);


?>