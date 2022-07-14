<?php
/*
$teclado = fopen('php://stdin', 'r'); //php sempre abre como mode r, leitura

$novoCurso = trim(fgets($teclado));     //trim(), serve para não deixar o fgets() colocar uma linha no final do arquivo
*/
$novoCurso = trim(fgets(STDIN)); //substitui tudo que está acima com a constante STDIN

file_put_contents('cursos-php.txt', PHP_EOL . "$novoCurso", FILE_APPEND );
