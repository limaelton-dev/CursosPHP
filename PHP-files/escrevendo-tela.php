<?php

$tela = fopen('php://stderr', 'w'); //da pra usar o stdin ou stderr. a diferença é que stderr, escreve na saída de erro
fwrite($tela, 'Olá mundo!');

//ou também a mesma forma de fazer é:

 fwrite(STDOUT, PHP_EOL . 'Olá mundo!' . PHP_EOL);


$cursos = fopen('zip://arquivos.zip#cursos-php.txt', 'r');
stream_copy_to_stream($cursos, STDOUT); //lendo na tela um arquivo dentro de um zip

//o arquivo foi copiado para a var $cursos e ela é mostrada na tela