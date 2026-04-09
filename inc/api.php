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
}

?>