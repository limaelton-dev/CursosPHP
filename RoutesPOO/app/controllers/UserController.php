<?php

namespace app\controllers;

use app\core\Request;
use app\support\Csrf;

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
        Csrf::validateToken();
    //     $response = Request::only('firstName');
    //     dd($response);
    }
}