<?php

namespace app\controllers;

use app\core\Request;

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
        $response = Request::only('firstName');
        dd($response);
    }
}