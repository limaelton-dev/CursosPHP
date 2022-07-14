<?php
    $notas = [
        'Elton' => 10,
        'Joao' => 6,
        'Ana' => 9,
    ];

    echo "Alguem tirou 10?" . PHP_EOL;
    var_dump(in_array(10, $notas));                 //in_array, me mostra se existe (esse valor, nesse array)

    echo "Quem tirou 10?" . PHP_EOL;
    var_dump(array_search(10, $notas, true));             //array_search() me mostra onde está localizado o valor



    //array_key_exist() verifica se existe (essa valor de chave, nesse array)
    //isset() verifica se a chave existe e não é nula


    //gramado


?>