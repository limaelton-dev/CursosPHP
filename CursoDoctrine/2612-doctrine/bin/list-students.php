<?php

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

$studentList = $studentRepository->findAll();

foreach($studentList as $student) {
    echo "ID: $student->id\nNome: $student->name\n";


    if($student->phones()->count() > 0) {
        echo "Telefones:\n";
        echo implode(', ',$student->phones()
            ->map(fn (Phone $phone) => $phone->number)
            ->toArray());}
    
    if($student->courses()->count() > 0) {
        echo "\n\nCursos:\n";

        echo implode(', ',$student->courses()
            ->map(fn (Course $course) => $course->nome)
            ->toArray());

        echo PHP_EOL . PHP_EOL;
    }
}

echo "\n\nQuantidade de alunos no BD: " . $studentRepository->count([]) . PHP_EOL;