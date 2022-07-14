<?php
require 'MeuFiltro.php';
$arquivoCursos = fopen('lista-cursos.txt', 'r');

stream_filter_register('alura.partes', MeuFiltro::class);
stream_filter_append($arquivoCursos, 'alura.partes'); //aqui eu transformo cada caracter em maiusculo, mas tem outros filtros também

echo fread($arquivoCursos, filesize('lista-cursos.txt'));