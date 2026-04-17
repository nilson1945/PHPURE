<?php

class Api
{
    public static function checkHTTPMethod($httpMethod)
    {
        if (strtoupper($_SERVER['REQUEST_METHOD']) !== strtoupper($httpMethod)) {
            self::errorMessage(405, 'Method Not Allowed');
        }
    }

    public static function errorMessage($httpCode, $errorMessage)
    {
        http_response_code($httpCode);

        echo json_encode([
            'status' => 'error',
            'code' => $httpCode,
            'message' => $errorMessage,
        ], JSON_PRETTY_PRINT);

        exit;
    }
    public static function sucessMessage($httpCode, $results)
    {
      http_response_code($httpCode);

        echo json_encode([
            'status' => 'success',
            'code' => $httpCode,
            'message' => 'success',
            'date' => $results,
        ], JSON_PRETTY_PRINT);

        exit;  
    }
    public static function checkBasicAuth(){
        if(HTTP_BASIC_AUTH_ACTIVE) return;
        if (
    !isset($_SERVER['PHP_AUTH_USER']) ||
    !isset($_SERVER['PHP_AUTH_PW']) ||
    $_SERVER['PHP_AUTH_USER'] !== HTTP_BASIC_AUTH_USER ||
    $_SERVER['PHP_AUTH_PW'] !== HTTP_BASIC_AUTH_PW
) {
    Api::errorMessage(401, "Authentication error");
}
    }
}

?>