<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    function index(Request $request)
    {
        $series = ['The Witcher', 'Peaky Blinders'];

        // return view('listar-series', ['series' => $series]); //a linha abaixo faz a mesma coisa
        return view('listar-series', compact('series'));
    }
}
