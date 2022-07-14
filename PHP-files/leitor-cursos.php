<?php

$arquivo = fopen('lista-cursos.txt', 'r'); //file open, r== read

/* while(!feof($arquivo)){  //enquanto não tiver no fim do arquivo,end of file
    $curso = fgets($arquivo); //fgets recupera uma linha do arquivo
    echo $curso;
}
*/


/*
$tamanhoDoArquivo = filesize('lista-cursos.txt'); //retorna o tamanho do arquivo, deve ser passado por parametro o nome do arquivo e não uma variável

$cursos = fread($arquivo, $tamanhoDoArquivo); //lê o arquivo todo, mas como paramtro precisa do tamanho dele
echo $cursos;
//o máximo que o PHP lê com essa função, é um arquivo de 128MB, para não sobrecarregar a RAM


fclose($arquivo);  //boas praticas, para liberar o arquivo
*/
$array_cursos = file('lista-cursos.txt');// faz  com que cada linha do arquivo se torne uma string de um array
$cursos = file_get_contents('lista-cursos.txt'); //abre o arquivo, busca o conteudo dele e retorna como string, e depois fecha o arquivo

echo $cursos;