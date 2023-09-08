<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::all();

        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        //se for pra validar campos em uma API, invez de redirecionar, o laravel devolve um JSON com os erros
        $request->validate([
            'nome' => ['required', 'min:3']
        ]);

        $serie = Serie::create($request->all());

        return to_route('series.index')->with('mensagem.sucesso', "Série {$serie->nome} criada com sucesso!");
    }

    public function edit(Serie $series)
    {
        dd($series->seasons);
        return view('series.edit')->with('serie', $series);
    }

    public function destroy(Serie $serie)
    {
        $serie->delete();

        return to_route('series.index')->with('mensagem.sucesso', "Série {$serie->nome} removida com sucesso!");
    }

    public function update(Serie $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso!");
    }
}
