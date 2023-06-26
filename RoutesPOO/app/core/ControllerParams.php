<?php
namespace app\core;

use app\routes\Routes;
use app\support\RequestType;
use app\support\Uri;

class ControllerParams 
{
    function get(string $router) //aqui chega o controller@metodo
    {
        $uri = Uri::get();
        $routes = Routes::get();
        $requestMethod = RequestType::get();

        //esse index é lá do Routes.php
        $router = array_search($router, $routes[$requestMethod]); //router está trocando de valor

        $explodeUri = explode('/', $uri);
        $explodeRouter = explode('/', $router);

        // /user/edit/23 URL
        // /user/edit/[0-9]+ GET do Routes.php
        // [0]  /[1] /[2]
        //vou verificar se são iguais

        $params = [];
        foreach ($explodeRouter as $index => $routerSegment) {
            if($routerSegment !== $explodeUri[$index]){
                $params[$index] = $explodeUri[$index];
            }
        }
        return array_values($params);
    }
}