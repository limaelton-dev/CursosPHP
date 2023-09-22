<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Support\Facades\DB;

class SeriesRepository
{
    public function add(SeriesFormRequest $request)
    {
        return DB::transaction(function () use($request, &$serie) {
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
    }
}