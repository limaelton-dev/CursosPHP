<?php

namespace app\database;

use PDO;

class Connection
{
    private static $connection = null;

    static function connect()
    {
        if(!self::$connection) {
            try{
                self::$connection = new PDO("mysql:host=localhost;dbname=rotasphpoo", "root", "1234");
                // echo 'Conectado';
            } catch (PDOException $e) {
                // echo "deu pau!: " . $e->getMessage();
            }
        }

        return self::$connection;
    }
}