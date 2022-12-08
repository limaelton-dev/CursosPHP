<?php

use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;
use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);

$connection->beginTransaction();
try{
    $aStudent = new Student(
        null, 
        'Tiago Random', 
        new DateTimeImmutable('2000-08-25')
    );
    $studentRepository->save($aStudent);

    $anotherStudent = new Student(
        null,
        'Lurdes Padilha',
        new DateTimeImmutable('2000-08-25')
    );
    $studentRepository->save($anotherStudent);

    $connection->commit();

} catch (\PDOException $e){
    echo $e->getMessage();
    $connection->rollBack(); //essa função faz com que todos os dados inseridos, não sejam executados
}