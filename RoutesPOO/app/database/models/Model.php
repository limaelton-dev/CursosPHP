<?php
namespace app\database\models;

use app\database\Filters;
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
        $this->filters = $filters;    
    }

    function fetchAll() 
    {
        try {
            $sql = "SELECT {$this->fields} FROM {$this->table} {$this->filters}";
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }
}