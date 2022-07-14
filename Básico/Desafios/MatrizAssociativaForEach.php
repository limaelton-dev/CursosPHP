<?php


$contasc = [
    12301 => [
        'titular' => 'EltinhoGostoso' ,
        'Valor' => 500
    ],
    12302 => [
        'titular' => 'BrenoViadote' ,
        'Valor' => 700000
    ]

];

foreach ($contasc as $cpf => $contas) {
    echo $cpf . "" . $contas['titular'] . PHP_EOL;
}



