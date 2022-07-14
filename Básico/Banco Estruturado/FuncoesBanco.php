<?php

function sacar(float $vSaque,array $conta): array //Função de saque
{
    if($vSaque <= $conta['Saldo'] || $vSaque > 0){
        $conta['Saldo'] -= $vSaque;
    }else{
        echo "Você não pode sacar este valor" . PHP_EOL;
    }
    return $conta;
}

function depositar(float $vDeposito, array $conta): array //Função de deposito
{
    if($vDeposito > 0){
        $conta['Saldo']+= $vDeposito;
    }else{
        echo "Você não pode depositar esse tipo de valor";
    }
    return $conta;
}


function exibeConta(array $conta)
{
    ['Titular' => $titular , 'Saldo' => $saldo] = $conta;
    echo "<li>Titular: $titular . Saldo: $saldo</li>";
}



/*
function transferir(array $cEnvia,array $cRecebe, float $valor): array
{
    if($valor <= $cEnvia['Saldo'] || $valor > 0){
        $cEnvia['Saldo'] = sacar($valor, $cEnvia);
        $cRecebe['Saldo'] = depositar($valor, $cRecebe);
    }
    $vAtual[] = [$cEnvia, $cRecebe];
    return $vAtual;
}
*/