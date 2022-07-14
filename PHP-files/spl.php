<?php

$arquivoCursos = new SplFileObject('cursos.csv', 'r');

while(!$arquivoCursos->eof()){ //enquanto não achar o final do arquivo
    $linha = $arquivoCursos->fgetcsv(';');

    echo utf8_encode($linha[0]) . PHP_EOL;
}