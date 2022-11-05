<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\Conta\{Conta, Titular};
use Alura\Banco\Modelo\{CPF, Endereco, Funcionario, Pessoa};

$endereco = new Endereco('Ponta Grossa', 'Uvaranas', 'Enio Jorge Malinoski', '150');
$elton = new Titular(new CPF('123.456.789-10'), 'Elton Programador 2022', $endereco);
$primeiraConta = new Conta($elton);

 
$primeiraConta->deposita(1000000);
$primeiraConta->saca(500);


$tainara = new Titular(new CPF('123.456.789-11'), 'Tai Assistente Social', $endereco);
$segundaConta = new Conta ($tainara);
$segundaConta->deposita(50000);

echo $primeiraConta->recuperaSaldo() .PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() .PHP_EOL;
echo $primeiraConta->recuperaNomeTitular() .PHP_EOL;

echo $segundaConta->recuperaNomeTitular() .  PHP_EOL;
echo $segundaConta->recuperaCpfTitular() . PHP_EOL;
echo $segundaConta->recuperaSaldo() . PHP_EOL;

$teste = new Conta(new Titular(new CPF('12345'), 'abcd', $endereco));

echo "O número de Contas atuais é:" . Conta::recuperaNumeroDeContas() . PHP_EOL;

$pessoa = new Pessoa('Pessoa', new CPF('134567'));

echo $pessoa->recuperaNome();