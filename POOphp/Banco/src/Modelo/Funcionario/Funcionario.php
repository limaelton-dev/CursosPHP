<?php

namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Pessoa;

abstract class Funcionario extends Pessoa      //extends faz que Funcionario também tenha as propriedades de Pessoa  
{
    private float $salario;

    public function __construct(string $nome, CPF $cpf, float $salario)
    {
        parent:: __construct($nome, $cpf);

        $this->salario = $salario;
    }
    
    public function recebeAumento(float $valorAumento): void
    {
        if($valorAumento < 0){
            echo "Aumento deve ser positivo";
            return;
        }
        $this->salario += $valorAumento;
    }

    public function recuperaSalario(): float 
    {
        return $this->salario;
    }

    abstract public function calculaBonificacao(): float;

}