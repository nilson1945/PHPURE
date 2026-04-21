<?php
require_once __DIR__ . "/../../../../../configuracao/config_clients_v1.php";
require_once __DIR__ . "/../../../../../inc/init.php";

// Evita erro quando não existe REQUEST_METHOD
if (!isset($_SERVER["REQUEST_METHOD"])) {
    $_SERVER["REQUEST_METHOD"] = 'POST';
}

Api::checkHTTPMethod('POST');

// HTTP basic authentication
//Api::checkBasicAuth();

$requestData = json_decode(file_get_contents('php://input'), true);
Api::checkAuthClientSecret($requestData);

use Medoo\Medoo;

// Conexão com o banco
$database = new Medoo(MYSQL);

// Seleciona todos os registros da tabela correta
$results = $database->select('meu_client', '*');

Api::sucessMessage(200, $results);
?>