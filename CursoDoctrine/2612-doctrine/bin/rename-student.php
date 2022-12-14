<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';
//não preciso do repositório pq só quero buscar uma unica entidade 
$entityManager = EntityManagerCreator::createEntityManager();$studentRepository = $entityManager->getRepository(Student::class);
//aqui  o student não recebe mais o repositoryStudent, e sim o entityManagere passamos o student como parametro pra ele
$student = $entityManager->find(Student::class, $argv[1]); //aqui passo o id do aluno que quero renomear
$student->name = $argv[2]; //aqui passo o nome para ser alterado

#$entityManager->persist($student); não faço isso pq já usei a fun find(), então o doctrine já está sabendo que teve alteração
$entityManager->flush();
