/*
<?php
require_once __DIR__ . "/../../../../../configuracao/config_clients_v1.php";
require_once __DIR__ . "/../../../../../inc/init.php";
Api::checkHTTPMethod('POST');
//HTTP basic authentication
$requestData = json_decode(file_get_contents('php://input'), true);
Api::checkAuthClientSecret($requestData);

//$id = $_GET['id'];
$requestData = json_decode(file_get_contents('php://input'), true);

//validador
if (!key_exists('id', $requestData)){
    Api :: errorMessage(400, 'O campo id é obrigatório' );
}
if (!is_numeric($requestData['id'])){
    Api :: errorMessage(400, 'O campo id deve ser númerico' );
}

use Medoo\Medoo;

// Conexão com o banco
$database = new Medoo(MYSQL);

// Seleciona todos os registros da tabela correta
$results = $database->select('meu_client', '*' , ['id' => $requestData['id']]);


Api::sucessMessage(200, $results);
