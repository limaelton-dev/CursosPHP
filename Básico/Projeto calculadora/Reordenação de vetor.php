<?php

$vet = [13, 25, 19, 12, 45];
$vetr = [];

for ($i=0 ; $i < count($vetr) ; $i++){
    $vetr[$i] = $vet[$i];
}

do {
for ($i = ((count($vet))-1) ; $i > count($vet); $i--){                    //$vet = [13, 25, 19, 12, 45]
    if($vet[$i] < $vet[$i--]){
        $vetr[$i--] = $vet[$i];
    }
}
 } while(($vetr[0] > $vetr[1]) || ($vetr[1]> $vetr[2]) || ($vetr[2] > $vetr[3]) || ($vetr[3] > $vetr[4])) ;


for ($i=0 ; $i < count($vet) ; $i++){
    echo $vetr[$i];
}


/*
$lista = [3, 4, 1, 10, 5, 2, 3, -10, -9, 5];
    $aux = null;

    for($i = 0; $i < count($lista); $i++){
        if($i < count($lista) - 1)
            $k = $i + 1;
        for($j = 0; $j < count($lista); $j++){
            if($lista[$j] > $lista[$k]){
                $aux = $lista[$j];
                $lista[$j] = $lista[$k];
                $lista[$k] = $aux;
            }
        }
    }

    for($i = 0; $i < count($lista); $i++){
        echo $lista[$i] . " ";
    }
?>
*/