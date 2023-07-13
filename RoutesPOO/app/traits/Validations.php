<?php
namespace app\traits;

trait Validations
{
    function unique() 
    {
        
    }
    function email() 
    {
        
    }
    function required() 
    {
        dd('required');
    }
    function maxLen($param) 
    {
        dd($param);
    }
}