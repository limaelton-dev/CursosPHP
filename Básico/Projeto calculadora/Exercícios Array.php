<?php


/* $vet = [13, 25, 19 , 12, 45, 98];

$result = 0;

for($i = 0 ; $i < count($vet); $i++ ) {
    $result = $vet[$i]+ $result;
}

echo $result . PHP_EOL;

$result = $result/count($vet);

echo $result . PHP_EOL; */


/*
$vet = [13, 25, 19, 12, 45];
$idadeMaior = [];
$idadeMenor = [];
$a = 0;
$b = 0;

for ($i = 0; $i < count($vet); $i++)
{
    if ($vet[$i] >= 18) 
    {
        $idadeMaior[$a] = $vet[$i];
        $a++;
}   else { 
    $idadeMenor[$b] = $vet[$i];
    $b++;
}
}

for ($i = 0; $i < count($idadeMaior) ; $i++){                           //Este for exibe as idades maiores salvas na variável $idadeMaior no índice $i
    echo "Idade maior: " . $idadeMaior[$i] . PHP_EOL ;
}
    echo PHP_EOL;
for ($i = 0; $i < count($idadeMenor) ; $i++){
    echo "Idade Menor: " . $idadeMenor[$i] . PHP_EOL;                   //Este for exibe as idades menores salvas na variável $idadeMenor no índice $i
}

*/
/*
$nomes = ['Eduardo', 'Maria', 'Monica', 'Elton'];

for ($i = 3; $i > 0; $i--)
{
    echo $nomes[$i];
}
*/


$vet = [];

for($i = 0 ; $i < 10 ; $i++){
    $vet[$i] = $i+1;
    echo $vet[$i] ." " ;
}

