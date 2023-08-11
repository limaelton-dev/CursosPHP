<?php

$host = "localhost";
$user = "root";
$pass = "1234";
$dbname = "rotasphpoo";
$port = 3306;

try {
    //Conexão com a porta
    // $conn = new PDO("mysql:host=$host;port=$port;dbname=".$dbname, $user, $pass);

    //Conexão sem a porta
    $conn = new PDO("mysql:host=$host;dbname=".$dbname, $user, $pass);
    // echo "Conectado";
} catch(PDOException $err) {
    // echo "Erro na conexão. Erro: " . $err->getMessage();
}