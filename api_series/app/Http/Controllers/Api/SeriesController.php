<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {
    }

    public function index()
    {
        return Series::all();
    }

    public function store(SeriesFormRequest $request)
    {
        //retorno os dados da própria série, com um código http 201
        return response()
            ->json($this->seriesRepository->add($request), 201);
    }

    public function show(int $series)
    {
        // $series = Series::whereId($series)->with('seasons.episodes')->first();
        //mesma coisa
        $seriesModel = Series::with('seasons.episodes')->find($series);
        if($seriesModel === null) {
            return response()->json(['message' => 'Series not found'], 404);
        }
        return $seriesModel;
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        //fill() faz um select no banco, atualiza os dados no objeto, e depois faz update com o save()
        $series->fill($request->all());
        $series->save();

        //outra tratativa:
        // Series::where(‘id’, $series)->update($request->all());
        // retorno de uma resposta que não contenha a série, já que não fizemos um `SELECT` 

        return $series;
    }

    public function destroy(int $series)
    {
        Series::destroy($series);
        return response()->noContent();
    }
}