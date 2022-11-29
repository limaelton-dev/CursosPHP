<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$student = new Student(
    null,
    'Elton Lima',
    new \DateTimeImmutable('1996-03-27')
);

echo $student->age();
