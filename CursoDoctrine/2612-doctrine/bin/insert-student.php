<?php

use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

//$student = new Student($argv[1]); //argv é uma variável reservada pelo doctrine, para passar dados atraves da linha de comando

$phone1 = new Phone('(42)9 9999-9999');
$phone2 =new Phone('(42)9 3223-9999');
$entityManager->persist($phone1);
$entityManager->persist($phone2);

$student = new Student('Aluno com telefones');
$student->addPhone($phone1);
$student->addPhone($phone2);

$entityManager->persist($student); //esse metodo armazena o parametro, para ser enviado depois
$entityManager->flush(); //manda tudo pro banco de dados
