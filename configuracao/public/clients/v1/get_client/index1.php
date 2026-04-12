/*
<?php
require_once __DIR__ . "/../../../../../configuracao/config_clients_v1.php";
require_once __DIR__ . "/../../../../../inc/init.php";
Api::checkHTTPMethod('POST');
//$id = $_GET['id'];
$requestData = json_decode(file_get_contents('php://input'), true);
print_r($requestData);
exit();
use Medoo\Medoo;

// Conexão com o banco
$database = new Medoo(MYSQL);

// Seleciona todos os registros da tabela correta
$results = $database->select('meu_client', '*' , ['id' => $requestData['id']]);
var_dump($results);

Api::sucessMessage(200, $results);
