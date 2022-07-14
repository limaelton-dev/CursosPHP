<?php

require_once 'FuncoesBanco.php';

$contas = [                         //Contas existentes
    '1234567890' => [
        'Titular' => 'Elton' , 
        'Saldo' => 10000
    ] ,
    '1234567891' => [
        'Titular' => 'Tainara',
        'Saldo' => 9000
    ],
    '1234567892' => [
        'Titular' => 'Jose' ,
        'Saldo' => 3000
    ]
];

$contas['1234567890'] = sacar(500, $contas['1234567890']); //saquei 500 da conta Elton
$contas['1234567891'] = depositar(1000, $contas['1234567891']); //depositei 1000 na conta Tainaravalor de deposito, na conta
/*
echo "<ul>";
foreach($contas as $indice => $conta){
    exibeConta($conta);
    //echo "O CPF: $indice que tem como titular {$conta ['Titular']} tem o saldo de: {$conta['Saldo']}". '<br>';
}
echo "</ul>";  
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Contas correntes</h1>

    <dl>
        <?php foreach ($contas as $cpf => $conta){ ?>
        <dt>
            <h3><?php echo $conta['Titular']; ?> - <?php echo $cpf;?></h3>
        </dt>
        <dd>
            Saldo: <?php echo $conta['Saldo']; ?>
        </dd>
        <?php } ?>
    </dl>

</body>
</html>


