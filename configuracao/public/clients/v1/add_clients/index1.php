<?php
require_once __DIR__ . "/../../../../../inc/init.php";
Api::checkHTTPMethod('POST');
/*
$httpVerb = $_SERVER["REQUEST_METHOD"];

if ($httpVerb !== 'POST') {
    http_response_code(405);

    echo json_encode([
        'status' => 'error',
        'code' => 405,
        'message' => 'Method Not Allowed',
    ], JSON_PRETTY_PRINT);

    exit;
}

echo 'Adicionar novo cliente' . PHP_EOL;
echo "MÉTODO: $httpVerb";*/
echo 'ok';



?>