<?php
//exe 10 lista 1

$notas = [10 , 5 , 10 , 10];
$pesos = [1 , 1, 1 , 1];
$aux = 0;
$mediap = 0;

for($i=0 ; $i<count($notas) ; $i++){            //esse for vai caminhar os arrays $notas e $pesos
    $mediap = $mediap + $notas[$i]*$pesos[$i];          
    $aux = $aux + $pesos[$i];                   //$aux é usada para correr a matriz $pesos e somar os valores, para que no final se saiba a média
}

$mediap = $mediap/$aux;
echo "A média ponderada desse aluno é: " . $mediap;

