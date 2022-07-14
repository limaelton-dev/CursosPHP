<?php
namespace Alura\Banco\Modelo;

abstract class Pessoa
{
    protected string $nome;
    protected CPF $cpf;

    public function __construct(string $nome, CPF $cpf)
    {
        $this->validaTitular($nome);
        //$this->nome = $nome; já está fazendo isso no validaTitular();
        $this->cpf = $cpf;
    }

    public function recuperaNome(): string
    {
        return $this->nome;
    }

    public function recuperaCpf(): string
    {
        return $this->cpf->recuperaNumero();
    }

    final protected function validaTitular(string $NomeTitular): void //agora ninguem consegue sobrescrever este método, pois ele é um metodo final
    {
        if(strlen($NomeTitular) < 5){
            echo "Seu nome precisa ter pelo menos 5 caracteres. Caso seja menor que 5, digite seu sobrenome". PHP_EOL;
            exit();
        }else{
            $this->nome = $NomeTitular;
        }
    }

    public function alteraNome(string $nome): void
    {
        $this->nome = $nome;
    }
}