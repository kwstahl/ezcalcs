<?php

Namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

abstract class EquationComponents
{
    public $type;
    public $description;

    public $attributes_array;
    public $attribute_validations;

    abstract public function mapValidation_Prefix_Attribute_Rules(callable $mappingFunction);
    abstract public function setDefaultValidationRules();

    //quickly set all attributes from an Array
    public function setPropertiesFrom_attributes_array(Array $attributes_array)
    {
        foreach($attributes_array as $attribute=>$value){
            $this->$attribute = $value;
        }
    }

    public function changeValidationRule(String $prefix = null, String $attribute, String $newRule)
    {
        $key_exists = array_key_exists($prefix.$attribute, $this->attribute_validations);
        if (!$key_exists){
            return 'doesnt exist';
        };

        $this->attribute_validations[$prefix.$attribute] = $newRule;
        return $this->attribute_validations[$prefix.$attribute];
    }
}


