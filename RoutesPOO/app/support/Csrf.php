<?php
namespace app\support;

use app\core\Request;
use Exception;

class Csrf
{
    static function getToken() 
    {
        if(isset($_SESSION['token'])) {
            unset($_SESSION['token']);
        }
        
        $_SESSION['token'] = md5(uniqid()); //esse aqui é o token gerado na nossa sessão

        return "<input type='hidden' name='token' value='{$_SESSION['token']}'>";
    }

    static function validateToken() 
    {
        if(!isset($_SESSION['token'])) {
            throw new Exception("Token inválido");
        }

        //Esse Request, está pegando o valor do formulário com o name='token'
        $token = Request::only('token');

        if(empty($token) || $_SESSION['token'] !== $token['token']) {//token da sessão é diferente do token que está no formulário?
            throw new Exception("Token inválido");
        } 

        //agora eu invalido esse token, depois de ter passado das verificações
        unset($_SESSION['token']);

        return true;
    }
}