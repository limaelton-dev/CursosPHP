<?php

namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\Autenticavel;

class Gerente extends Funcionario implements Autenticavel
{
    public function calculaBonificacao(): float
    {
        return $this->recuperaSalario(); //Aqui estou retornando o valor da Bonificação do Gerente, e ela é, igual ao salário dele. Logo retorno o valor do salário dele
    }

    public function podeAutenticar(string $senha): bool
    {
        return $senha === '4321';
    }
}