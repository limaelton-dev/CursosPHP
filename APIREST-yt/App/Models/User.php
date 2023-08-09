<?php

namespace App\Models;

class User
{
    private static $table = 'user';

    static function select(int $id)
    {
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

        $sql = 'SELECT * FROM ' . self::$table . ' WHERE id = :id';
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Nenhum usuário encontrado!");
        }
    }

    static function selectAll()
    {
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

        $sql = 'SELECT * FROM ' . self::$table;
        $stmt = $connPdo->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Nenhum usuário encontrado!");
        }
        
    }

    static function insert($data)
    {
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

        $sql = 'INSERT INTO ' . self::$table . ' (email, password, name) VALUES (:email, :pass, :name)';
        $stmt = $connPdo->prepare($sql);
        $stmt-> bindValue(':email', $data['email']);
        $stmt-> bindValue(':pass', $data['password']);
        $stmt-> bindValue(':name', $data['name']);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return 'Sucesso na inserção!';
        } else {
            throw new \Exception("Falha na inserção!");
        }
    }
}