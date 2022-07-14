<?php

require_once 'autoload.php';

use Alura\Banco\Service\ControladorDeBonificacoes;
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Funcionario\{Desenvolvedor, Funcionario, Gerente, Diretor, EditorVideo};


$umFuncionario = new Diretor(
    'Elton',
    new CPF('123.456.789-10'), 
    10000
);

$umaFuncionaria = new Gerente(
    'Tainara',
    new CPF('123.456.789-11'), 
    8000
);

$novoFuncionario = new Desenvolvedor(
    'Eltinho',
    new CPF('123.456.789-11'), 
    5000
);

$novoFuncionario->sobeDeNivel();

$umeditor = new EditorVideo(
    'Douglas',
    new CPF('123.456.456-10'),
    1500
);


$controlador = new ControladorDeBonificacoes();
$controlador->adicionaBonificacaoDe($umFuncionario);
$controlador->adicionaBonificacaoDe($umaFuncionaria);
$controlador->adicionaBonificacaoDe($novoFuncionario);
$controlador->adicionaBonificacaoDe($umeditor);

echo $controlador->recuperaTotal();


//verificar por que o programa não está conhecendo CPF