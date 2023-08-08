<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\User;
use App\Services\UserService;

 // api/users/1
 if($_GET['url']){
     $url = explode('/', $_GET['url']);

    echo json_encode(User::select(1));
    die;

     //se acessar api na url
     if($url[0] === 'api') {
        array_shift($url);
        
        $service = 'App\Services\\'. ucfirst($url[0]) . 'Service';
        array_shift($url);

        $method = strtolower($_SERVER['REQUEST_METHOD']);

        try {
            $response = call_user_func_array([new $service, $method], $url);

            echo json_encode(['status' => 'success', 'data' => $response]);

        } catch (\Exception $e) {
            //throw $th;
        }

        var_dump($method);
     }
 }


