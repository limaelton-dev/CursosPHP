<?php



$conta1 = [
    'Titular' => 'Elton' , 
    'Saldo' => 10000
];

$conta2 = [
    'Titular' => 'Tainara',
    'Saldo' => 9000
];

$contas = [$conta1 , $conta2];

for($i=0 ; $i < count($contas); $i++){
    echo "O " . $contas[$i]['Titular'] . " tem " . $contas[$i]['Saldo'] . " reais" . '<br>';
}
//teste de commit git hub