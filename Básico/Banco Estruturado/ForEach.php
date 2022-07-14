<?php

$contas = [                         //$contas é uma variável associativa onde possui o CPF como indice, e outras variáveis contendo informações
    '1234567890' => [
        'Titular' => 'Elton' , 
        'Saldo' => 10000
        ] ,
    '1234567891' => [
        'Titular' => 'Tainara',
        'Saldo' => 9000
    ]
];

$contas['1234567892'] = [           //Aqui eu estou criando uma nova conta
    'Titular' => 'José',
    'Saldo' => 200
];

foreach($contas as $indice => $conta){
    echo "o CPF:" . $indice . " que tem como titular " . $conta ['Titular'] . " tem o saldo de: ". $conta['Saldo']. PHP_EOL;
}