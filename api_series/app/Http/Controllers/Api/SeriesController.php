<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;

class SeriesController extends Controller
{
    public function index()
    {
        return Series::all();
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Series::create($request->all());

        //retorno os dados da própria série, com um código http 201
        return response()
            ->json($serie, 201);
    }
}