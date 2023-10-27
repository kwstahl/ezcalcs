<?php
namespace App\Classes;

class EqValidations
{
    //list of attributes that must be validated.
    public function __construct(Array $attributes_to_validate){
        $this->setPropertiesForValidation($attributes_to_validate);
    }

    protected function setPropertiesForValidation($attributes_to_validate){
        foreach($attributes_to_validate as $attribute=>$value){
            $this->$attribute = $value;
        }
    }
}
