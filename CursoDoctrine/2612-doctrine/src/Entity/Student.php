<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;
use Alura\Doctrine\Entity\Course;

#[Entity]
class Student
{
    #[Id]
    #[GeneratedValue] //aqui peço pro PDO gerar um valor automaticamente
    #[Column] //aqui informo que o $id vai ser uma coluna do BD
    public int $id;

    #[OneToMany(
        mappedBy: "student",
        targetEntity: Phone::class,  
        cascade: ["persist", "remove"]
    )] //um(aluno) para muitos(telefones), assim defino relacionamento
    //preciso informar o tagetEntity e relacionar e com PHONE, depois o mappedBy para o atributo $student, da classe Phone
    private Collection $phones; //iterable, qualquer coisa que possa fazer um foreach

    #[ManyToMany(targetEntity: Course::class, inversedBy: "student")]
    private Collection $courses;

    public function __construct(
        #[Column]  //aqui to informando que o nome vai ser uma coluna
        public string $name
    ) {
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    public function addPhone(Phone $phone)
    {
        $this->phones->add($phone); //adiciono telefone
        $phone->setStudent($this); //defino lá no telefone, que é este o aluno em questão
    }

    public function phones(): Collection
    {
        return $this->phones;
    }

    public function courses(): Collection
    {
        return $this->courses;
    }

    public function enrollInCourse(Course $course): void
    {
        if($this->courses->contains($course)) { //verifico para não entrar em um looping infinito
            return;
        }

        $this->courses->add($course);
        $course->addStudent($this);
    }
} 