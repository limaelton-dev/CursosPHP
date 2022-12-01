<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$sqlDelete = 'DELETE FROM students WHERE id = ?;'; //posso jogar isso como parâmentro sem criar essa variável
$preparedStatement = $pdo->prepare($sqlDelete);
$preparedStatement->bindValue(1, 3, PDO::PARAM_INT); //1 se refere ao ID, 2 se refere ao valor do ID, TIPO INT

var_dump($preparedStatement->execute());