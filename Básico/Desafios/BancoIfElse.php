<?php

$contasc = [
    '12301' => [
        'titular' => 'EltinhoGostoso' ,
        'Valor' => 500
    ],
    '12302' => [
        'titular' => 'BrenoViadote' ,
        'Valor' => 700
    ]

];


$contasc['12301']['Valor'] -= 100; //isso é a mesma coisa que: subtrai da própria variável ela mesma menos 100: $contas['12301']['titular'] = $contas['12301']['titular'] - 100

if ( 850 > $contasc ['12302']['Valor'] ) {
    echo "Você não tem esse valor para sacar" . PHP_EOL;
    
}else{
    $contasc['12302']['Valor'] -= 850;
};


foreach($contasc as $cpf => $conta){
    echo $cpf .' '. $conta['titular'] . " " . $conta['Valor'] . PHP_EOL;
}