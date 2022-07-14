<?php

use Alura\Banco\Modelo\Endereco;

require_once 'autoload.php';

use Alura\Banco\Modelo\Conta\{ContaCorrente, Titular};
use Alura\Banco\Modelo\CPF;

$contaCorrente = new ContaCorrente(
    new Titular(
        new CPF('123.456.789-00'),
        'Elton Lima',
        new Endereco('PG', 'Bairro', 'Uma rua', 'n12'),
    )
);
try{
    $contaCorrente->deposita(1500);
}catch(InvalidArgumentException){   //nessa caso não adicionei uma variável que contém as excessões, pois essa atualização foi implementada depois do PHP 8, quando não se usa o log de erro, não precisa colocar a variável
    echo "Valor a depositar precisa ser positivo, seu harcker perigoso";
}
echo $contaCorrente->recuperaSaldo();