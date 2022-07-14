<?php
//criando esse arquivo, para unificar 2 arquivos.txt e colocar como CSV=formato do Excel

$meusCursos = file('lista-cursos.txt'); //usando apenas file() e não file_gets_contents(), ao invez de pegar como string, pega como array
$outrosCursos = file('cursos-php.txt');

$arquivoCsv = fopen('cursos.csv', 'w');


foreach($meusCursos as $curso){
    $linha = [trim(utf8_decode($curso)), 'Sim']; //criei colunas, uma do arquivo e outra com a palavra 'Sim'
    fputcsv($arquivoCsv, $linha, ';');//fputcsv()escreve usando formato CSV. o ultimo prâmetro é por conta do excel ler dessa forma não padrão e utilizar ';' como delimitador
    //fgetcsv(); pode ser utilizado para fazer o processo contrário
}

foreach($outrosCursos as $curso){
    $linha = [trim(utf8_decode($curso)), 'Não']; //criei colunas, uma do arquivo e outra com a palavra 'Não'
    //utf8_decode(), transforma caracteres especiais no padrão que o excel consegue ler
    fputcsv($arquivoCsv, $linha, ';');
}