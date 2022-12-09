<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();
$repository = new PdoStudentRepository($pdo);
$studentList = $repository->allStudents();





/*

NÃO VAMOS MAIS FAZER ASSIM, VAMOS USAR UM REPOSITÓRIO
$statement = $pdo->query('SELECT * FROM students;');
$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
$studentList = [];
$i=0;
foreach ($studentDataList as $studentData) {
    $studentList[] = new Student(
        $studentData['id'],
        $studentData['name'],
        new \DateTimeImmutable($studentData['birth_date'])
    );
}
*/
var_dump($studentList);