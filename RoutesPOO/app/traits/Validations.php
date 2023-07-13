<?php
namespace app\traits;

use app\core\Request;

trait Validations
{
    function unique() 
    {
        
    }
    function email() 
    {
        
    }
    function required($field) 
    {
        $data = Request::input($field);

        if(empty($data)) {
            return null;
        }
    }
    function maxLen($field, $param) 
    {
        $data = Request::input($field);

        if(strlen($data) > $param) {
            return null;
        }

        dd($data);
    }
}