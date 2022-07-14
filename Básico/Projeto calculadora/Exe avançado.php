<?php

//Fazer um programa que calcule e escreva a soma dos 50 primeiros termos da seguinte série:
//S= 1000/1 – 997/2 + 994/3 -991/4 ...



function divide($num , $den){                               //função que divide o numerador pelo denominador
    $result = ($num-3)/($den+1);
    return $result;
}

$termos = 6;
$aux = 0;
$numerador = 1000;
$denominador = 1 ;
$vet=[];
 $resultf = 0;

 $vet[0]= $numerador/$denominador;                 //chama a função divide

 echo "Vet[0] = " . $vet[0] . PHP_EOL;
for($i=1 ; $i < $termos ; $i++){                                
    if($i%2==0){
         $vet[$i] =  divide($numerador , $denominador);
         echo "Vet[" . $i . "] = " . $vet[$i] . PHP_EOL;

    }else{
         $vet[$i] = - (divide($numerador , $denominador));
         echo "Vet[" . $i . "] = " . $vet[$i] . PHP_EOL;
    }
    $numerador = $numerador -3;
    $denominador = $denominador +1;
}

for($i = 1 ; $i<$termos ; $i++){ 
     if($i==1){
          $resultf = $vet[$i]+$vet[$i-1];
     }
     else        
          $resultf = $resultf + $vet[$i];  
}

echo "Esse é o resultado final: " .  $resultf;

