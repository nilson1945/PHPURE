
<?php
require_once __DIR__ . "/../../../../../configuracao/config_clients_v1.php";
require_once __DIR__ . "/../../../../../inc/init.php";
Api::checkHTTPMethod('GET');

// Evita erro quando não existe REQUEST_METHOD
if (!isset($_SERVER["REQUEST_METHOD"])){
    $_SERVER["REQUEST_METHOD"] = 'POST';
}
$userName = "abacaxi";
$password = "abacaxi123";

if (
    !isset($_SERVER['PHP_AUTH_USER']) ||
    !isset($_SERVER['PHP_AUTH_PW']) ||
    $_SERVER['PHP_AUTH_USER'] !== $userName ||
    $_SERVER['PHP_AUTH_PW'] !== $password
) {
    Api::errorMessage(401, "Authentication error");
}

 

use Medoo\Medoo;

// Conexão com o banco
$database = new Medoo(MYSQL);

// Seleciona todos os registros da tabela correta
$results = $database->select('meu_client', '*');
var_dump($results);

/*header('Content-Type: application/json');
echo json_encode($results);*/

Api::sucessMessage(200, $results);
?>