<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

$sqlDelete = 'DELETE FROM students WHERE id = ?;'; //posso jogar isso como parâmentro sem criar essa variável
$preparedStatement = $pdo->prepare($sqlDelete);
$preparedStatement->bindValue(1, 9, PDO::PARAM_INT); //1 se refere ao ID, 2 se refere ao valor do ID, TIPO INT

var_dump($preparedStatement->execute());