<?php

use Alura\Banco\Modelo\Endereco;

require_once 'autoload.php';

$umEndereco = new Endereco('PG', 'Cará', 'Qualquer rua', '123B');
$outroEndereco = new Endereco('Castro', 'Altos', 'Outra rua', '321A');

echo $umEndereco . PHP_EOL;
echo $outroEndereco . PHP_EOL;

//echo $umEndereco->numero; //por conta do __get, eu consigo recuperar os dados sem ter que chamar o nome do método

$umEndereco->numero = '9876';

echo $umEndereco . PHP_EOL;