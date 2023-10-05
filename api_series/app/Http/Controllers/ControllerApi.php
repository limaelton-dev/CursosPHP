<?php

namespace App\Http\Controllers;

use App\Models\Series;

class ControllerApi 
{
    public function all()
    {
        return Series::all();
    }
}