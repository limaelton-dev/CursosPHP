<?php

namespace Alura\Banco\Modelo;

class CPF 
{
    private string $cpf;

    public function __construct(string $cpf)
    {
        $this->cpf = $cpf;
    }

    public function recuperarNumero()
    {
        return $this->cpf;
    }
}