<?php

function depositar(array $conta, float $valorADepositar): array
{
    if ($valorADepositar > 0) {
        $conta['Valor'] += $valorADepositar;
    } else {
        exibeMensagem("Depósitos precisam ser positivos!");
    }
    return $conta;
}

function sacar(array $contat , float $valorsaque): array{                               //uma função com return
    if ( $valorsaque > $contat['Valor'] ) {
        exibemsg("Você não tem esse valor para sacar");
        
    }else{
        $contat['Valor'] -= $valorsaque;
    };

    return $contat;
}


function exibemsg($msg){            //Essa é uma função com parâmetros
    echo $msg . PHP_EOL ;
}



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


$contasc['12301'] = sacar($contasc['12301'] , 100) ;    
$contasc['12302'] = depositar($contasc['12302'] , 500); 


foreach($contasc as $cpf => $conta){
    exibemsg($cpf .' '. $conta['titular'] . " " . $conta['Valor']);
};


