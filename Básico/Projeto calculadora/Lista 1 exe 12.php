<?php
//calcular IPI em cima dos produtos informados
//Fórmula: (valor1 ∗ quant1 + valor2 ∗ quant2) ∗ (IPI∕100 + 1)
/*$IPI = 5; //porcentagem de IPI
$codigo = [];
$valor = [];
$quantidade = [];
$produtos = [$codigo = [2, 4]; $valor = [12.50, 9.90], $quantidade = [50, 120]];
$valorat = []; //esse vai ser o valor com o IPI sobre os produtos já

for ($i = 0 ; $i<count($produtos) ; $i++]{
    for ($i=0 ; $i<count($codigo) ; $i++){
        $valorat[$i] = $produtos[2]*$produtos[3];
    }
}
*/

$segundo = 12000;
$horas = 0;
$minutos = 0;
$segundos = 0;

$horas = $segundo/3600;
$minutos = ($segundo%3600)/60;
$segundos = (($segundo%3600)%60);

echo "São:".(int) $horas . "horas - " .(int) $minutos . " minutos - " . $segundos . " segundos";
