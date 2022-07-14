<?php

namespace Alura\Banco\Modelo;

interface Autenticavel      //interface, faz com que quando for chamdo, seja obrigado a implementar os metodos dentro dela
{
    public function podeAutenticar(string $senha): bool;
}