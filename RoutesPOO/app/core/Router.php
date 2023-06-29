<?php
namespace app\core;
use app\core\RoutersFilter;

class Router
{
    public static function run() 
    {  
        try {
            $routerRegistered = new RoutersFilter; 
            $router = $routerRegistered->get(); //vai pegar as rotas registradas

            $controller = new Controller;
            $controller->execute($router);
        } catch(\Throwable $th) {
            echo $th->getMessage();
        }
    }
}