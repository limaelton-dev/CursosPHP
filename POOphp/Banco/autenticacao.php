<?php

use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\Funcionario\{Diretor, Gerente};
use Alura\Banco\Service\Autenticador;
use Alura\Banco\Modelo\Endereco;


require_once 'autoload.php';

$autenticador = new Autenticador();
$umDiretor = new Gerente(
    'João Silva',
    new CPF('124.567.890-10'),
    12000
);

$endereco = new Endereco ('PG', 'Cará', 'Minha rua', '150B');
$maria = new Titular(new CPF('123.456.789-0'), 'Maria', $endereco);


$autenticador->tentaLogin($maria, 'abcd');