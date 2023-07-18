<?php
namespace app\support;

use app\traits\Validations;
use Exception;

class Validate 
{
    use Validations; 

    function validate(array $validationsFields) 
    {
        $inputsValidations = [];
        foreach ($validationsFields as $field => $validation) {
            $havePipes = str_contains($validation, '|');
            
            if(!$havePipes) {
                $param = '';
                if(substr_count($validation, ':') === 1) {
                    [$validation, $param] = explode(':', $validation);
                }

                if(!method_exists($this, $validation)){
                    throw new Exception("O método {$validation} não existe na validação");
                }
                // dd($validation);

                $inputsValidations[$field] = $this->$validation($field, $param);
            } else {
                $validations = explode('|', $validation);
                $param = '';
                foreach($validations as $validation) {
                    if(substr_count($validation, ':') === 1) {
                        [$validation, $param] = explode(':', $validation);
                    }

                    if(!method_exists($this, $validation)) {
                        throw new Exception("O método {$validation} não existe na validação");
                    }

                    $inputsValidations[$field] = $this->$validation($field, $param);

                    if(empty($inputsValidations[$field])) {
                        break;
                    }
                }

            }
        }

        Csrf::validateToken();

        if(in_array(null, $inputsValidations, true)) {
            return null;
        }
        return $inputsValidations[$field];
    }
}