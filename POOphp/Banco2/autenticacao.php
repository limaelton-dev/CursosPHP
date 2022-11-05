<?php

use Alura\Banco\Modelo\{CPF, Autenticavel};
use Alura\Banco\Modelo\Funcionario\{Diretor, Gerente};
use Alura\Banco\Service\Autenticador;

require_once 'autoload.php';

$autenticador = new Autenticador();
$umDiretor = new Gerente('Elton', new CPF('123.456'), 10000);


$autenticador->tentaLogin($umDiretor, '1234');
