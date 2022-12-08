<?php
$caminhoBanco = __DIR__ . '/banco.sqlite';

$pdo = new PDO('sqlite:' . $caminhoBanco);


echo "Conectado";

$createTableSql = "
    CREATE TABLE IF NOT EXISTS students (
        id INTEGER PRIMARY KEY,
        name TEXT,
        birth_date TEXT
    );

    CREATE TABLE IF NOT EXISTS phones (
        id INTEGER PRIMARY KEY,
        area_code TEXT,
        number TEXT,
        student_id INTEGER,
        FOREIGN KEY(student_id) REFERENCES students(id)
    );  
";
//FOREIGN KEY(student_id) REFERENCES students(id) , obriga a só poder criar um telefone, se ele fizer referencia à um aluno(id), se não, não cria

$pdo->exec($createTableSql);