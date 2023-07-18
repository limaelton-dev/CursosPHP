<?php
namespace app\traits;

use app\core\Request;
use app\support\Flash;

trait Validations
{
    function unique($field) 
    {
        
    }
    function email($field) 
    {
        if(!filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL)) {
            return Flash::set($field, "Digite um e-mail válido!");
        }

        return strip_tags(Request::input($field), '<p><b><ul<span><em>');
    }
    function required($field) 
    {
        $data = Request::input($field);

        if(empty($data)) {
            Flash::set($field, "O campo é obrigatório");
            return null;
        }

        return strip_tags($data, '<p><b><ul<span><em>');
    }
    function maxLen($field, $param) 
    {
        $data = Request::input($field);

        if(strlen($data) > $param) {
            Flash::set($field, "Esse campo deve ter até {$param} caracteres");
            return null;
        }

        return strip_tags($data, '<p><b><ul<span><em>');
    }
}