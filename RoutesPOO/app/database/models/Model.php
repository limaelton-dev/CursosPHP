<?php
namespace app\database\models;

use app\database\Connection;
use app\database\Filters;
use PDO;
use PDOException;

abstract class Model 
{
    private string $fields = '*';
    private string $filters = '';

    function setFields($fields) 
    {
        $this->fields = $fields;    
    }
    
    function setFilters(Filters $filters) 
    {
        $this->filters = $filters->dump();    
    }

    function fetchAll() 
    {
        try {
            $sql = "select {$this->fields} from {$this->table} {$this->filters}";

            $connection = Connection::connect();

            $query = $connection->query($sql);

            return $query->fetchAll(PDO::FETCH_CLASS, get_called_class());
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }
}