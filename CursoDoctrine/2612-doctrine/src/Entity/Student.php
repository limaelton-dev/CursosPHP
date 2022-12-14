<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;


#[Entity]
class Student
{
    #[Id]
    #[GeneratedValue] //aqui peço pro PDO gerar um valor automaticamente
    #[Column] //aqui informo que o $id vai ser uma coluna do BD
    public readonly int $id;

    public function __construct(
        #[Column]  //aqui to informando que o nome vai ser uma coluna
        public string $name
    ) {

    }

}