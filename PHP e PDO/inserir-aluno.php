<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$student = new Student(
    null, 
    "Joana Silva", 
    new \DateTimeImmutable('1990-12-25')
);
//faço dessa forma, para previnir um SQL Injection
//Preparo as strings e depois mando executar
$sqlInsert = "INSERT INTO students(name, birth_date) VALUES (:name ,:birth_date );";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(':name', $student->name());
$statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));

if ($statement->execute()) {
    echo "Aluno incluído";
}



// var_dump($pdo->exec($sqlInsert)); não faço mais isso, mudei para previnir