<?php

namespace Alura\Banco\Service;

use Alura\Banco\Modelo\Autenticavel;

class Autenticador
{
    public function tentaLogin(Autenticavel $autenticavel, string $senha): void
    {
        if ($autenticavel->podeAutenticar($senha)){
            echo "Login efetuado com sucesso" . PHP_EOL;
        } else {
            echo "Não foi possível logar, pois a senha está incorreta";
        }

    }
}