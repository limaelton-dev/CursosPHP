<?php

namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\Autenticavel;

class Diretor extends Funcionario implements Autenticavel
{
    public function calculaBonificacao(): float
    {
        return $this->recuperaSalario() * 2; //A bonificação do Diretor, é 2 salários
    }

    public function podeAutenticar(string $senha): bool
    {
        return $senha === '1234';
    }
}