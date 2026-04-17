<?php


require_once __DIR__ . "/../../../../../configuracao/config_clients_v1.php";
require_once __DIR__ . "/../../../../../inc/init.php";
Api::checkHTTPMethod('POST');
//HTTP basic authentication
Api::checkBasicAuth();

$requestData = json_decode(file_get_contents('php://input'), true);

//validador
if(!is_array($requestData)){
    Api :: errorMessage(400, 'Não foram enviados os dados corretamente' );
}
if (!key_exists('name', $requestData)){
    Api :: errorMessage(400, 'O campo nome é obrigatório' );
}
if (!key_exists('phone', $requestData)){
    Api :: errorMessage(400, 'O campo phone é obrigatório' );
}
if (!key_exists('email', $requestData)){
    Api :: errorMessage(400, 'O campo email é obrigatório' );
}
if (!key_exists('address', $requestData)){
    Api :: errorMessage(400, 'O campo endereço é obrigatório' );
}
if (!key_exists('postalZip', $requestData)){
    Api :: errorMessage(400, 'O campo caixa postal é obrigatório' );
}
if (!key_exists('region', $requestData)){
    Api :: errorMessage(400, 'O campo região é obrigatório' );
}
if (!key_exists('country', $requestData)){
    Api :: errorMessage(400, 'O campo País é obrigatório' );
}

use Medoo\Medoo;

// Conexão com o banco
$database = new Medoo(MYSQL);

$insertData = [
    
    'name' => $requestData['name'],
    'phone' => $requestData['phone'],
    'email' => $requestData['email'],
    'address' => $requestData['address'],
    'postalZip' => $requestData['postalZip'],
    'region' => $requestData['region'],
    'country' => $requestData['country']

];

// INSERT REAL
$database->insert('meu_client', $insertData);

// resposta correta (use o MESMO nome que existe na sua Api)
Api::sucessMessage(200, $insertData);