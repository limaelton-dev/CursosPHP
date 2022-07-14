<?php

namespace Alura\Banco\Modelo;


final class CPF  //ninguem pode extender essa classe, pois é uma classe final
{
    private string $numero;
    
    public function __construct(string $numero)
    {
        $this->numero = $numero;
    }

    public function recuperaNumero(): string 
    {
        return $this->numero;
    }
}