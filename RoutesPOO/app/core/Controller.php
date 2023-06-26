<?php
namespace app\core;

use Exception;

class Controller
{
    function execute($router)
    {
        if(!str_contains($router, '@')) { //verifico se existe o '@' na string
            throw new Exception("A rota está registrada com formato errado");
        }

        list($controller, $method) = explode('@', $router); //Se existir eu separo em 2 vars
        //dd($controller, $method);
        //se existir, eu crio o namespace em uma variável;

        $namespace = "app\controllers\\";
        $controllerNamespace = $namespace.$controller;

        if(!class_exists($controllerNamespace)) { //verifico se esse namespace existe
            throw new Exception("O controller {$controllerNamespace} não existe");
        }
        //se existir, eu instancio esse controller
        $controller = new $controllerNamespace; //aqui o controller deixa de ser uma string, e vira uma instância. Então vira um OBJ.
        
        if(!method_exists($controller, $method)) { //agora vou verificar se o método existe
            throw new Exception("O método {$method} não existe no controller {$controllerNamespace} não existe");
        }

        //se existir eu chamo o método;
        $controller->$method();
    }
}