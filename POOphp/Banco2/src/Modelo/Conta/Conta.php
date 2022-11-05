<?php   

namespace Alura\Banco\Modelo\Conta;

abstract class Conta 
{
    private Titular $titular;
    protected float $saldo;
    private static $numeroDeContas = 0;

    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0;

        self::$numeroDeContas++;
    }

    public function __destruct()
    {
        if (self::$numeroDeContas > 2) {
            echo PHP_EOL . "Há mais de uma conta ativa" . PHP_EOL;
            self::$numeroDeContas--;
        }
    }

    public function saca(float $valorASacar): void
    {
        $tarifaSaque = $valorASacar * $this->percentualTarifa();
        $valorSaque = $valorASacar + $tarifaSaque;

        if($valorSaque > $this->saldo){
            echo "Não é possível sacar este valor";
            return; //Esse return para de executar essa função, então não precisa de ELSE, para executar o código abaixo
        }

        $this->saldo -= $valorSaque;
    }

    public function deposita(float $valorADepositar): void
    {
        if($valorADepositar < 0)
        {
            echo "Não é possível depositar um valor negativo";
            return; 
        }

        $this->saldo += $valorADepositar;

    }

    public function recuperaSaldo(): float
    {
        return $this->saldo;
    }
    
    public function recuperaNomeTitular(): string
    {
        return $this->titular->recuperaNome();
    }

    public function recuperaCpfTitular(): string
    {
        return $this->titular->recuperaCpf();
    }

    public static function recuperaNumeroDeContas()
    {
        return self::$numeroDeContas;   //assim consigo acessar o número de contas, ou algum elemento estático
    }

    abstract protected function percentualTarifa(): float;
    

}