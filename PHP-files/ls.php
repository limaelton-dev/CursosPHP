<?php

$diretorioAtual = dir('.'); //'.' representa o caminho do diretorio atual

echo $diretorioAtual->path . PHP_EOL; //aqui listo o caminho do diretorio atual

while($arquivo = $diretorioAtual->read()){//enquanto eu consigo ler do diretorio atual alguma entrada
    echo $arquivo . PHP_EOL;

} 