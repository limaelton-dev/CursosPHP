<?php

use Alura\Doctrine\Helper\EntityManagerCreator;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$entityManager = EntityManagerCreator::createEntityManager();

var_dump($entityManager);