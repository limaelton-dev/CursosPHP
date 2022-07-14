<?php

//spl_autload_register ---> essa função registra o autoloado de classes(recebe uma função que (recebe o caminho da classe){})
//precisamos alterar as barras contidas na propriedade dentro da função de \ para /. e trocar a raiz que é Alura\Banco, para src.
spl_autoload_register(function (string $nomeCompletoDaClasse){

    //echo $nomeCompletoDaClasse . PHP_EOL;

    $caminhoDoArquivo = str_replace('Alura\\Banco', 'src', $nomeCompletoDaClasse);         //str_replace troca uma string por outra
    $caminhoDoArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $caminhoDoArquivo);          //essa constante, faz com que use a barra certa dependendo do sistema operacional
    $caminhoDoArquivo .= '.php';
    if(file_exists($caminhoDoArquivo)){     //se esse arquivo existir
        require_once $caminhoDoArquivo;
    }

    //echo $caminhoDoArquivo;
    //exit();
}); 
