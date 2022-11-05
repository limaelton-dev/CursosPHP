<?php

//VERIFICAR POR QUE O AUTOLOAD NÃO IMPORTA O CONTROLADOR

require_once 'autoload.php';
require_once 'src/Service/ControladorBonificacao.php';

use Alura\Banco\Service\ControladorDeBonificacoes;
use Alura\Banco\Modelo\{CPF};
use Alura\Banco\Modelo\Funcionario\{Funcionario, Gerente, Diretor, Desenvolvedor, EditorVideo};


$umFuncionario = new Desenvolvedor(
    'Elton',
    new CPF('123.456'),
    5000
);

$umFuncionario->sobeDeNivel();

$umaFuncionaria = new Gerente(
    'Tainara',
    new CPF('123.456.789'),
    1000
);

$umDiretor = new Diretor(
    'SuperDir',
    new CPF('123.456.908-00'),
    2000
);

$umEditor = new EditorVideo(
    'Douglas',
    new CPF('4321'),
    1000
);

$controlador = new ControladorDeBonificacoes();
$controlador->adicionaBonificacaoDe($umFuncionario);
$controlador->adicionaBonificacaoDe($umaFuncionaria);
$controlador->adicionaBonificacaoDe($umDiretor);
$controlador->adicionaBonificacaoDe($umEditor);

echo $controlador->recuperaTotal();