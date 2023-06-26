<?php
namespace app\support;

class Uri 
{
    public static function get()
    {
        //parse_url e PHP_URL_PATH fazem não pegar uma URI com querystring, apenas a URI
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    }
}