<?php
namespace app\database\models;

use app\database\Connection;

class User extends Model
{
    protected string $table = 'users'; //dentro do model eu tenho acesso à essa propriedade protected
    
}

