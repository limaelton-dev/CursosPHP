<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\User;
use App\Services\UserService;

 // api/users/1
 if($_GET['url']){
     $url = explode('/', $_GET['url']);


     //se acessar api na url
     if($url[0] === 'api') {
        array_shift($url);
        
        $service = 'App\Services\\'. ucfirst($url[0]) . 'Service';
        array_shift($url);

        $method = strtolower($_SERVER['REQUEST_METHOD']);

        try {
            $response = call_user_func_array([new $service, $method], $url);

            http_response_code(200);
            echo json_encode(['status' => 'success', 'data' => $response]);
        } catch (\Exception $e) {
            http_response_code(404);
            // Esse segundo parâmetro, contorna o problema de o "json_encode()" tirar os acentos
            echo json_encode(['status' => 'error', 'data' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }

        var_dump($method);
     }
 }


