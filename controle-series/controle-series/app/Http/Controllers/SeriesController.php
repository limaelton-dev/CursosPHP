<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        // $series = Serie::all();
        $series = Serie::query()->orderBy('nome')->get();

        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        Serie::create($request->all());

        $request->session()->flash('mensagem.sucesso', 'Série criada com sucesso!');

        return to_route('series.index');
    }

    public function destroy(Request $request)
    {
        // dd($request->route());
        Serie::destroy($request->serie);
        $request->session()->flash('mensagem.sucesso', 'Série removida com sucesso!');


        return to_route('series.index');
    }
}
