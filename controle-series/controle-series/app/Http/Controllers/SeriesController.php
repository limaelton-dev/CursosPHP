<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Support\Facades\DB;

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
        $serie = DB::transaction(function () use($request, &$serie) {
            $serie = Series::create($request->all());
    
            $seasons = [];
            for($i = 1; $i <= $request->seasonsQty; $i++) {
                $seasons[] = [
                    'series_id' => $serie->id,
                    'number' => $i
                ];
            }
            //aqui passo o array com os dados a serem inseridos no banco
            Season::insert($seasons);
    
            $episodes = [];
            foreach($serie->seasons as $season){
                for($j = 1; $j <= $request->episodesPerSeason; $j++) {
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $j
                    ];
                }
            }
            Episode::insert($episodes);

            return $serie;
        });
        //caso eu esteja fazendo uma transação com mais de uma inserção na mesma tabela, pode acontecer deadlock
        //deadlock seria tentativa de adição na tabela, mas com erro
        //para isso eu poderia informar mais um parâmetro depois da closure, com o número máximo de tentativas para as querys
        
        
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
