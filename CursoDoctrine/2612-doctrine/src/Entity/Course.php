<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\{GeneratedValue, Column, Id, ManyToMany};
use Doctrine\ORM\Mapping\Entity;

#[Entity]
class Course 
{   
    #[Id, GeneratedValue, Column]
    public int $id;

    #[ManyToMany(Student::class, mappedBy: "courses")]
    private Collection $students;

    public function __construct(
        #[Column]
        public readonly string $nome
    ) {
        $this->students = new ArrayCollection();
    }

    public function students(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): void
    {
        if($this->students->contains($student)) { //verifico para não entrar em um looping infinito
            return;
        }

        $this->students->add($student);
        $student->enrollInCourse($this);
    }
}