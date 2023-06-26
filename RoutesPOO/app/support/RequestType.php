<?php
namespace app\support;

class RequestType
{
    public static function get() 
    {
        //apenas para pegar o tipo(índice) de requisição: GET, POST... do routes
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}