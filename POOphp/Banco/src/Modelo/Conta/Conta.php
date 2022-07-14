<?php
//Uma função, que está dentro de uma classe é chamada de MÉTODO
//As variáveis de uma classe são chamadas de PROPRIEDADES
//Nome das classe são criados como substantivos
//Nome dos métodos são verbos

namespace Alura\Banco\Modelo\Conta;

abstract class Conta //Uma apenas "Conta" não pode mais ser criada, pois agora ela depende dos valores de suas filhas para estar completa para poder ser criada

{
    protected float $saldo ;
    private static $numeroContas = 0;
    private Titular $titular;


    public function __construct(Titular $titular)
    {
        $this-> titular = $titular;
        $this-> saldo = 0;

        self::$numeroContas ++; //para acessar propriedades estáticas, usamos o nome da classe seguido de 2 vezes dois pontos.
        //tamém pode ser escrito como Conta::$numeroContas;

    }

    public function __destruct()
    {
        self::$numeroContas--;

    }

    public function sacar(float $valorAsacar): void
    {
        if($valorAsacar > $this->saldo || $valorAsacar <= 0){
            echo "Não é possível sacar um valor maior que o seu saldo atual, ou um valor negativo." . PHP_EOL;
            return;
        }
        $tarifaSaque = $valorAsacar * $this->percentualTarifa() ;
        $valorAsacar += $tarifaSaque;
        $this->saldo -= $valorAsacar;
    }

    public function depositar(float $valorAdepositar): void
    {
        if($valorAdepositar < 0){
            echo "Não é possível depositar um valor negativo" . PHP_EOL;
            return;
        }
        $this->saldo += $valorAdepositar;

    }

    public function getSaldo(): float 
    {
        return $this->saldo;
    }

    public static function getNcontas(): int            //um get para propriedades estaticas, também deve ser estático
    {
        return self::$numeroContas;
    }

    public function recuperaNomeTitular(): string 
    {
        return $this->titular->recuperaNome();
    }

    public function recuperaCpfTitular(): string 
    {
        return $this->titular->recuperaCpf();
    }

    abstract protected function percentualTarifa(): float; //abstract significa que todas as classe filhas precisam implementar


}

