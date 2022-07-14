<?php
/*
//verificar a documentação do fopen();
$arquivo = fopen('cursos-php.txt', 'a'); //criando um arquivo com o nome cursos-php.txt. 'w' wright(escrever)
//posso usar o parâmetro 'a', que faz a mesma coisa que o 'w', mas coloca o cursor no final do arquivo, para não sobrescreve-lo
$curso = "\nDesign Patterns PHP II: Boas práticas de programação";

fwrite($arquivo, $curso); //Passei como parametro até onde eu quero escrever, mas não é obrigatório

fclose($arquivo);
*/
//wrapper significa protocolo, é o 'hhtps:// ou o php:// ou o file://

$curso = "\nDesign Patterns PHP II: Boas práticas de programação";
//verificar a documentação
file_put_contents('cursos-php.txt', $curso, FILE_APPEND | FILE_TEXT); //abre ,escreve e fecha o arquivo. FILE_APPEND diz para não sobrescrever o arquivo