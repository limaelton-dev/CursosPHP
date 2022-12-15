<?php

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$course = new Course('Symfony');



$entityManager->persist($course); //esse metodo armazena o parametro, para ser enviado depois
$entityManager->flush(); //manda tudo pro banco de dados
