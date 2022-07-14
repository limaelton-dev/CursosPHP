<?php

$peso = 92;
$altura = 1.79;
$imc = $peso / $altura**2;

if ($imc < 19) {
    echo ("Você está desnutrido");
} if ($imc < 25) {
        echo ("Você está no peso ideal");
}   if ($imc > 25 && $imc < 31) {
            echo ("Você está com sobrepeso");
}       if ($imc > 31) {
                echo ("Você está obeso");
}