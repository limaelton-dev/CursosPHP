<?php

namespace Alura\Banco\Modelo;


final class Endereco //ninguem pode extender essa classe, pois é uma classe final
{
    use AcessoPropriedades; //quando coloca direto dentro da classe, significa que está utilizando uma <trait>. Posso utilizar quantas eu quiser
    
    private string $cidade;
    private string $bairro;
    private string $rua;
    private string $numero;

    public function __construct(string $cidade, string $bairro, string $rua, string $numero)
    {
        $this-> cidade = $cidade;
        $this-> bairro = $bairro;
        $this-> rua = $rua;
        $this-> numero = $numero;
    }

    public function recuperaCidade()
    {
        return $this->cidade;
    }
    public function recuperaBairro()
    {
        return $this->bairro;
    }
    public function recuperaRua()
    {
        return $this->rua;
    }
    public function recuperaNumero()
    {
        return $this->numero;
    }

    public function __toString(): string //Esta função "mágica", retorna os valores como string
    {
        return "{$this->rua}, {$this->numero} - {$this->bairro} - {$this->cidade}";
    }

}