<?php
namespace app\database\models;

use app\database\{Connection, Filters, Pagination};
use PDO;
use PDOException;

abstract class Model 
{
    private string $fields = '*';
    private string $filters = '';
    private string $pagination = '';

    function setFields($fields) 
    {
        $this->fields = $fields;    
    }
    
    function setFilters(Filters $filters) 
    {
        $this->filters = $filters->dump();    
    }

    function setPagination(Pagination $pagination) 
    {
        $pagination->setTotalItems($this->count());
        $this->pagination = $pagination->dump();
    }

    function create(array $data) 
    {
        try {
            $sql = "insert into {$this->table} (";
            $sql .= implode(',', array_keys($data)).") values (";
            $sql .= ':'.implode(',:', array_keys($data)).")";

            $connect = Connection::connect();

            $prepare = $connect->prepare($sql);

            return $prepare->execute($data);
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }

    function update(string $field, string|int $fieldValue, array $data) 
    {
        try {
            $sql ="update {$this->table} set ";
            foreach ($data as $key => $value) {
                $sql .= " {$key} = :{$key},";
            }
            //retira a virgula do final da string
            $sql = rtrim($sql, ',');

            $sql .= " where {$field} = :{$field}";

            $connection = Connection::connect();

            $data[$field] = $fieldValue;

            $prepare = $connection->prepare($sql);

            return $prepare->execute($data);
        } catch(PDOException $e) {
            dd($e->getMessage());
        }
    }

    function fetchAll() 
    {
        try {
            $sql = "select {$this->fields} from {$this->table} {$this->filters} {$this->pagination}";

            $connection = Connection::connect();

            $query = $connection->query($sql);

            //com esses parâmetros, cada um dos registros, é uma instancia do model
            //Assim posso chamar métodos desse model
            //Como o retorno é um array, eu preciso percorrê-lo para poder chamar os métodos para cada registro
            return $query->fetchAll(PDO::FETCH_CLASS, get_called_class());
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }

    function findBy(string $field = '', string $value = '') 
    {
        try {
            $sql = (empty($this->filters)) ?
                "select {$this->fields} from {$this->table} where {$field} = :{$field}" : 
                "select {$this->fields} from {$this->table} {$this->filters}";

            // para saber qual slq foi criado => dd($sql);

            $connection = Connection::connect();

            $prepare = $connection->prepare($sql);

            $prepare->execute(!$this->filters ? [$field => $value] : []);

            return $prepare->fetchObject(get_called_class());
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }

    function first($field = 'id', $order = 'asc') 
    {
        try {
            $sql = "select {$this->fields} from {$this->table} order by {$field} {$order}";

            $connection = Connection::connect();

            $query = $connection->query($sql);

            return $query->fetchObject(get_called_class());
        } catch (PDOException $e){
            dd($e->getMessage());
        }
    }

    //delete from users where od = 12
    //$user->delete('id', 12);
    function delete(string $field = '', string|int $value = '') 
    {
        try {
            $sql = (!empty($this->filters)) ?
            "delete from {$this->table} {$this->filters}":
                "delete from {$this->table} where {$field} = :{$field}"; 

            // para saber qual slq foi criado => dd($sql);

            $connection = Connection::connect();

            $prepare = $connection->prepare($sql);

            return $prepare->execute(empty($this->filters) ? [$field => $value] : []);
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }

    function count() 
    {
        try {
            $sql = "select {$this->fields} from {$this->table} {$this->filters}";

            $connection = Connection::connect();

            $query = $connection->query($sql);

            return $query->rowCount();
        } catch (PDOException $e){
            dd($e->getMessage());
        }
    }
}