<?php
namespace app\database;

class Filters
{
    private array $filters = [];

    function where(string $field, string $operator, mixed $value, string $logic = '') 
    {
        $formatter = '';
        if(is_array($value)) { //no caso de ser um array de filtros
            $formatter = "('".implode("','", $value)."')"; //formato o array para este formato exp: [1,5] == ('1','5')
        } elseif(is_string($value)) {
            $formatter = "'{$value}'";
        } elseif(is_bool($value)) { //se for booleano eu recebo 1 ou 0
            $formatter = $value ? 1 : 0;
        } else {
            $formatter = $value;
        }

        $value = strip_tags($formatter);

        $this->filters['where'][] = "{$field} {$operator} {$value} {$logic}";     //coloco o where como um array, pq posso receber varios filtros
    }

    function dump() //vou montar todas as querys aqui
    {
        $filter = !empty($this->filters['where']) ? ' where ' . implode(' ', $this->filters['where']) : '';

        dd($filter);
    }
}