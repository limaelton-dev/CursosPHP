<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Series::all();

        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Series::create($request->all());

        for($i = 1; $i <= $request->seasonsQty; $i++) {
            $season =  $serie->seasons()->create([
                'number' => $i
            ]);

            for($j = 1; $j <= $request->episodesPerSeason; $j++) {
                $season->episodes()->create([
                    'number' => $j
                ]);
            }
        }

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série {$serie->nome} criada com sucesso!");
    }

    public function edit(Series $series)
    {
        // dd($series->seasons);
        return view('series.edit')->with('serie', $series);
    }

    public function destroy(Series $series)
    {
        // dd($series);
        $series->delete();

        return to_route('series.index')->with('mensagem.sucesso', "Série {$series->nome} removida com sucesso!");
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso!");
    }
}
