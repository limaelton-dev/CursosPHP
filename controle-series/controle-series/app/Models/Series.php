<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Series extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];
    //sempre que buscar uma série, vai trazer as seasons
    protected $with = ['seasons'];

    public function seasons()
    {
        return $this->hasMany(Season::class, 'series_id');
    }

    //método mágico
    protected static function booted()
    {
        //criando um escopo global, para que sempre for chamada, organize por ordem de nome
        self::addGlobalScope('ordered', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('nome', 'desc');
        });
    }
}
