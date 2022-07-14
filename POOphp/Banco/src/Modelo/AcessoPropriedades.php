<?php
//essa é uma forma de reutilizar código em varios lugares. Deve se tomar cuidado com a segurança

namespace Alura\Banco\Modelo;

trait AcessoPropriedades                
{
    public function __get(string $nomeAtributo)
    {
        //rua -> recuperaRua
        $metodo = ucfirst($nomeAtributo);//upper case first, primeira letra em maiuscula
        $metodo = 'recupera' . $metodo;
        return  $this->$metodo();
    }

    public function __set(string $nomeAtributo, string $novoNome)
    {
        return $this->$nomeAtributo = $novoNome;
        
    }
}