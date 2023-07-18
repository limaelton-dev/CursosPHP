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
        // dd($params);
        $validate = new Validate;
        $validated = $validate->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'email|required',
            'password' => 'maxLen:5|required'
        ]);

        if(!$validated) {
            return redirect('/user/12');
        }

        dd($validated);
    }
}