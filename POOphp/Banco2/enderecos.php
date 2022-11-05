<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\Endereco;

$umEndereco = new Endereco('Cidade', 'Bairro', 'Rua', 'Numero');
$outroEndereco = new Endereco('Uma cidade', 'Um bairro', 'Uma Rua', 'Numero');

echo $umEndereco->__toString() . PHP_EOL;
echo $outroEndereco->__toString() . PHP_EOL;