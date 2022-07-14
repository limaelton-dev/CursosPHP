<?php


function soma( $valor01 ,  $valor02){
    $resultadoadi = $valor01+$valor02;

    return $resultadoadi;
} 


function subtracao ( $valor01,  $valor02)
{
     $resultadosub = ($valor01 - $valor02);
    return $resultadosub;
}


function multiplicacao ( $valor01,  $valor02)
{
     $resultadomult = ($valor01*$valor02);
    return $resultadomult;
}


function divisao ( $valor01, $valor02)
{
    $resultadodiv = ($valor01 / $valor02);
    $resultadodiv;
}



echo "Informe a operação" . PHP_EOL . "1 - Soma" . PHP_EOL . "2 - Subtração" . PHP_EOL . "3 - Multiplicação" . PHP_EOL . "4 - Divisão" . PHP_EOL;

$opcao = 4;
echo "valor de  i é: ". $opcao . PHP_EOL;

if($opcao > 0 && $opcao <5)
{
    echo "Informe os valores da operação" . PHP_EOL;
     $valor1 = 8;
     $valor2 = 0;

    echo "Os valores são: " . $valor1 . " e " . $valor2 . PHP_EOL;

    while($opcao == 1){

         $resultado = soma( $valor1,  $valor2);
        echo "O resultado de " . $valor1 . "+" . $valor2 . " é " . $resultado . PHP_EOL;
        $opcao = 0;
    }
    while($opcao == 2){

         $resultado = subtracao( $valor1,  $valor2);
        echo "O resultado de " . $valor1 . "-" . $valor2 . " é " . $resultado . PHP_EOL;
        $opcao = 0;
    }
    while($opcao == 3){

        $resultado = multiplicacao( $valor1,  $valor2);
        echo "O resultado de " . $valor1 . "*" . $valor2 . " é " . $resultado . PHP_EOL;
        $opcao = 0;

    }
    while($opcao == 4){

        if($valor2 != 0){
             $resultado = divisao( $valor1,  $valor2);
            echo "O resultado de " . $valor1 . "/" . $valor2 . " é " . $resultado . PHP_EOL;
            $opcao = 0;
       }
        else{
            echo "Não é possível realizar divisão por 0" . PHP_EOL;
            $opcao = 0;
        }
}
    $opcao = 0;
}

if($opcao>5){
    echo "tem alguma coisa de errada com essa variável i que é: $opcao" . PHP_EOL;
}