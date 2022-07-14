<?php

$peso = 81 ;
$altura = 1.79 ;
$imc = $peso / $altura**2;

if ($imc < 19  ) {
    echo "Magro";
    if (($imc < 25 && $imc) > 19) {
        echo "Peso ideal";
        if (($imc > 25 && $imc) < 31) {
            echo"Sobrepeso";
        }
        else {
            echo "Obesidade";
        }

    }
}




