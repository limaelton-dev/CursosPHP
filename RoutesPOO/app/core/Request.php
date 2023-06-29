<?php
namespace app\core;

use Exception;

class Request
{
    //com esse método eu consigo pegar o valor de um campo que eu quiser
    public static function input(string $name)
    {
        if(isset($_POST[$name])) {
            return $_POST[$name];
        }
        throw new Exception("O índice {$name} não existe");
    }

    //com esse método eu pego todos os dados do formulário
    public static function all()
    {
        return $_POST;
    }

    //para pegar o valor de mais de um campo que eu queira
    public static function only(string|array $only)
    {
        $fieldsPost = self::all(); //mesma coisa que salvar $_POST nessa var, ele tem um array "nome_campo" => "valor_campo"
        $fieldsPostKeys = array_keys($fieldsPost); //tratado

        //se existir o índice que recebo no $only, eu guardo em $arr
        $arr = [];
        foreach($fieldsPostKeys as $index => $value) {
            //$onlyField é o resultado do que está no $only
            $onlyField = (is_string($only) ? $only : (isset($only[$index]) ? $only[$index] : null));
            //se existir esse campo no $fieldsPost
            if(isset($fieldsPost[$onlyField])) {
                $arr[$onlyField] = $fieldsPost[$onlyField];
            }
        }

        return $arr;
    }

    //pego todos os campos, com a excessão dos que estão em $excepts
    public static function excepts(string|array $excepts) 
    {
        $fieldsPost = self::all();

        if(is_array($excepts)) {
            //index é numerico, e value é o nome do campo
            foreach($excepts as $index => $value) {
                unset($fieldsPost[$value]);
            }
        }

        if(is_string($excepts)) {
            unset($fieldsPost[$excepts]);
        }

        return $fieldsPost;
    }

    public static function query($name) 
    {
        if(!isset($_GET[$name])) {
            throw new Exception("Não existe a query string {$name}");
        }
        
        return $_GET[$name];
    }

    public static function toJson(array $data)
    {
        return json_encode($data);
    }

    public static function toArray($data) //não coloco o tipo, pq não tem como referenciar um JSON, e $data é JSON
    {
        if(isJson($data)) {
            return json_decode($data);
        }

    }
}