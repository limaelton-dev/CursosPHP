<?php

namespace Alura\Banco\Modelo\Conta;

class ContaPoupanca extends Conta
{
    protected function percentualTarifa():float
    {
        return 0.03;
    }
    //apenas criando esse método como PROTECTED, substituo todas essas linhas de código, pois o método sobrescreve o mesmo de sua classe mãe, mas com o diferencial de sua própria classe
    /*
    public function sacar(float $valorAsacar): void
    {   
        $tarifaSaque = $valorAsacar*0.03;
        $valorAsacar += $tarifaSaque;
        if($valorAsacar > $this->saldo || $valorAsacar <= 0){
            echo "Não é possível sacar um valor maior que o seu saldo atual, ou um valor negativo." . PHP_EOL;
            return;
        }
        $this->saldo -= $valorAsacar;
    }
    */
}