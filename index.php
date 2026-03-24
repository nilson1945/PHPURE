<?php
// Require Composer's autoloader
require 'vendor/autoload.php';

// Import Medoo namespace
use Medoo\Medoo;

// Initialize database connection
$database = new Medoo([
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'teste_banco_de_dados',
    'username' => 'teste_banco',
    'password' => 'phpadm194533'
]);

// Retrieve data
$data = $database->select('mytable', '*');
print_r($data);