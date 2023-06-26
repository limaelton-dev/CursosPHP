<?php
namespace app\core;

use app\routes\Routes;
use app\support\RequestType;
use app\support\Uri;

class RoutersFilter 
{
    private string $uri;
    private string $method;
    private array $routesRegistered; //são as rotas do Routes

    function __construct()
    {
        $this->uri = Uri::get();
        $this->method = RequestType::get();
        $this->routesRegistered = Routes::get();
    }

    //primeiro vou procurar uma rota simples, caso não seja, eu verifico se é dinamica
    private function simpleRouter()
    {
        //verifico se existe a URI naquele array de rotas do "Routes.php" no índice "get, post, put.."
        if(array_key_exists($this->uri, $this->routesRegistered[$this->method])){
            return $this->routesRegistered[$this->method][$this->uri]; //retorna a URI
            //$this->routesRegistered['get']['/register'] praticamente isso
        }

        return null;
    }

    private function dynamicRouter() 
    {
        //$this->routesRegistered[aqui é get ou post, o this_.method pega o verbo http]
        foreach ($this->routesRegistered[$this->method] as $index => $route) {
            //esse índice, é o índice que eu coloco como valor no arquivo Routes.php. Exemplo: '/', '/register'. Aqui eu tiro a /
            //tenho que fazer isso para poder trabalhar com o preg_match()
            $regex = str_replace('/', '\/', ltrim($index, '/'));
            //Verifico se a rota existe
            //verifico se no (exemplo:index=get) não é '/' e se a expressão regular do $regex( que é o próprio indice ou método http) existe na URI informada
            if($index !== '/' && preg_match("/^$regex$/", trim($this->uri, '/'))) {
                $routerRegisteredFound = $route;
                break; //Para ele sair do foreach caso encontre a rota
            } else {
                $routerRegisteredFound = null;
            }   
        }

        return $routerRegisteredFound;
    }

    function get() 
    {
        $router = $this->simpleRouter();

        if($router) {
            return $router;
        }

        $router = $this->dynamicRouter();

        if($router) {
            return $router;
        }

        return 'NotFoundController@index';
    }
}
