<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    function get($id = null)
    {
        if($id) {
            return User::select($id);
        } else {
            return 'else';//User::selectAll();
        }
    }

    function post()
    {

    }

    function update()
    {

    }

    function delete()
    {

    }
}