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
            return User::selectAll();
        }
    }

    function post()
    {
       return User::insert($_POST);
    }

    function update()
    {

    }

    function delete()
    {

    }
}