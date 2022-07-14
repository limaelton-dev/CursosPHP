<?php

namespace Alura\Banco\Modelo\Conta;

class ContaCorrente extends Conta
{
    protected function percentualTarifa():float
    {
        return 0.05;
    }
    
    public function transferir(float $valorAtransferir, Conta $contaDestino): void
    {
        if($valorAtransferir > $this->saldo){
            echo "Não é possivel transferir um valor maior que seu saldo atual";
            return;
        }

        $this->sacar($valorAsacar);
        $contaDestino->depositar($valorAtransferir);

    }
}