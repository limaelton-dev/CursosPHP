<?php

function funcao1()
{
    echo 'Entrei na função 1' . PHP_EOL;
    try{ //execute isso
        funcao2();
    } catch(Exception | Error $problema){ //se nao der execute isso posso colocar Throwable também, para ser mais genérico
        //Qualquer tipo de erro vai ter esses métodos abaixo como getMessage
        echo "Aconteceu um erro: {$problema->getMessage()}" . PHP_EOL;
        echo "Na linha: {$problema->getLine()}" . PHP_EOL;
        echo "{$problema->getTraceAsString()}" . PHP_EOL;
    }
    echo 'Saindo da função 1' . PHP_EOL;
}

function funcao2()
{
    echo 'Entrei na função 2' . PHP_EOL;
    /*
    $divisao = intdiv(5,0);
    $arrayFixo = new SplFixedArray(2);
    $arrayFixo[3] = 'Valor'; //Estou colocando um valor em um espaço não alocado para isso, pois o array foi criado com 2 posições, e estou tentando acessar a quarta posição
    */
    $exception = new RuntimeException('teste'); //Uma excessão sendo criada('mensagem', $codigoDeErro, RunTimeException(x, y, z)) z seria a exceção anterior a ela
    throw $exception; //lançando uma exceção

    for ($i = 1; $i <= 5; $i++) {
        echo $i . PHP_EOL;
    }
    echo 'Saindo da função 2' . PHP_EOL;
}

echo 'Iniciando o programa principal' . PHP_EOL;
funcao1();
echo 'Finalizando o programa principal' . PHP_EOL;
