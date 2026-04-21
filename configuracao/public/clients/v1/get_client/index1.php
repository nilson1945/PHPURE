<?php
require_once __DIR__ . "/../../../../../configuracao/config_clients_v1.php";
require_once __DIR__ . "/../../../../../inc/init.php";

use Medoo\Medoo;

Api::checkHTTPMethod('POST');
$requestData = json_decode(file_get_contents('php://input'), true);
Api::checkAuthClientSecret($requestData);

// validações
if (!isset($requestData['id'])) {
    Api::errorMessage(400, 'O campo id é obrigatório');
}

if (!is_numeric($requestData['id'])) {
    Api::errorMessage(400, 'O campo id deve ser numérico');
}

// conexão com banco
$database = new Medoo(MYSQL);

// query
$results = $database->select('meu_client', '*', [
    'id' => $requestData['id']
]);

Api::sucessMessage(200, $results);
?>