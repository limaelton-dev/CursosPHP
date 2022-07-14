<?php

namespace Alura\Banco\Service;

use Alura\Banco\Modelo\Funcionario\Funcionario;

class ControladorDeBonificacoes
{
    private float $totalBonificacoes = 0;

    public function adicionaBonificacaoDe(Funcionario $funcionario)   //aqui um exemplo de POLIMORFISMO, pois posso receber uma referência que seja diretor, dev, gerente que mesmo assim ela vai aceitar, pois, antes de tudo, eles são funcionários
    {
        $this->totalBonificacoes += $funcionario->calculaBonificacao();
    }

    public function recuperaTotal(): float 
    {
        return $this->totalBonificacoes;
    }
}