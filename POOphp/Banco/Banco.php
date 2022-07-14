<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\Conta\Titular; //Utiliza-se o <use> para que possamos informar os namespaces das classes que estaremos utilizando, assim evitando conflito de classes com nomes iguais
use Alura\Banco\Modelo\{Endereco, CPF}; // isso reduz o numero de linhas do código e o tempo de trabalho
use Alura\Banco\Modelo\Conta\{ContaCorrente, ContaPoupanca, Conta};

$endereco = new Endereco ('PG', 'Cará', 'Minha rua', '150B');
$elton = new Titular(new CPF('123.456.789-0'), 'Elton Lima', $endereco);
$conta1 = new ContaPoupanca($elton);
$conta1->depositar(10000);
$conta1->sacar(200);

$maria = new Titular(new CPF('123.456.789-0'), 'Maria', $endereco);
$conta2 = new ContaCorrente($maria);
$conta2->depositar(200);

$conta3 = new ContaCorrente(new Titular(new CPF('123.456.789-0'), 'Mariaa', $endereco));


echo $conta1->recuperaNomeTitular(). PHP_EOL;
echo $conta1->recuperaCpfTitular() . PHP_EOL;
echo $conta1->getSaldo(). PHP_EOL;

echo $conta2->recuperaNomeTitular(). PHP_EOL;
echo $conta2->recuperaCpfTitular() . PHP_EOL;
echo $conta2->getSaldo(). PHP_EOL;

unset($conta3);
echo "Contas ativas: " . Conta::getNcontas() . PHP_EOL; //exibindo o numero de contas ativas com uma propriedade estática apontando para essas contas


