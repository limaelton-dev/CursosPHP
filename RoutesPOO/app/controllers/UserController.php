<?php

namespace app\controllers;

use app\core\Request;
use app\support\Csrf;
use app\support\Validate;

class UserController extends Controller
{
    function edit($params) 
    {
        $this->view('user', 
                    [
                        'title' => 'Editar User'
                    ]);
    }

    function update($params) 
    {
        $validate = new Validate;
        $validate->validate([
            'firstName' => 'maxLen:10',
            'lastName' => 'required',
            'email' => 'email|required',
            'password' => 'required|maxLen:10'
        ]);
    }
}