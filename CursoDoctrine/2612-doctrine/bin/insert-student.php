<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$student = new Student($argv[1]); //argv é uma variável reservada pelo doctrine, para passar dados atraves da linha de comando

$entityManager->persist($student); //esse metodo armazena o parametro, para ser enviado depois
$entityManager->flush(); //manda tudo pro banco de dados
