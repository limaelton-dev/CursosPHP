<?php

$conta1 = [
    'titular' => 'EltinhoGostoso' ,
    'Valor' => 500
];

$conta2 = [
    'titular' => 'BrenoViadote' ,
    'Valor' => 700000
];

$contasc = [$conta1, $conta2];

for ($i = 0 ; $i < count($contasc) ; $i++) {
    echo $contasc[$i]['titular'] . "tem o valor de:" ;
    echo $contasc[$i]['Valor'] . PHP_EOL;
}