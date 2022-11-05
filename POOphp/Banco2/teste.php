<?php

require_once 'autoload.php';

require_once 'src/Modelo/Conta/ContaCorrente.php';

use Alura\Banco\Modelo\{Funcionario, CPF, Endereco};
use Alura\Banco\Modelo\Conta\ContaPoupanca, ContaCorrente, Titular;


$endereco = new Endereco('Cidade','Bairro', 'Rua', 'Numero');
$umaConta = new ContaCorrente(
    new Titular(
        new CPF('123.456'),
        'Elton',
        $endereco
    )
);

$umaConta->deposita(500);
$umaConta->saca(100);

echo $umaConta->recuperaSaldo() . PHP_EOL;



