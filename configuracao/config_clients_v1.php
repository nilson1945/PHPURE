<?php
define('MYSQL', [
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'clients',
    'username' => 'meu_client',
    'password' => '0*Njksm_61c[qKy4' // a senha que você criou

]);
//basic auth
define ('HTTP_BASIC_AUTH_ACTIVE', false);
define ('HTTP_BASIC_AUTH_USER', 'abacaxi');
define ('HTTP_BASIC_AUTH_PW', 'abacaxi123');

//auth by client_id and client_secret
define('AUTH_CLIENT_SECRET', true);






?>