<?php

Namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

abstract class Variables
{
    public $type;
    public $name;
    public $description;
    public $sympy_symbol;
    public $latex_symbol;

    public $variable_attributes;
    public $attribute_validations;

    public function mapValidation_Prefix_Attribute_Rules(callable $mappingFunction){
        $variable_attributes = $this->variable_attributes;
        $attribute_validations = [];

        $variable_name = $this->name;

        foreach($variable_attributes as $attribute => $value){
            $mappedValidationRule = $mappingFunction($attribute, $variable_name);
            array_push($attribute_validations, $mappedValidationRule);
        };
        $this->attribute_validations = Arr::collapse($attribute_validations);

        return $attribute_validations;
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

    abstract public function setDefaultValidationRules();

    abstract public function __construct(String $name, Array $variable_attributes);

}

class Variable extends Variables
{
    public $unit;
    public $unit_class;

    public function __construct(String $name, Array $variable_attributes)
    {
        $this->name = $name;
        $this->variable_attributes = $variable_attributes;
        foreach ($variable_attributes as $attribute_property => $value) {
            $this->$attribute_property = $value;
        }
    }

    public function setDefaultValidationRules(String $prefix = null, String $rule = null)
    {
        $variable_attributes = $this->variable_attributes;
        $attribute_validations = [];
        foreach ($variable_attributes as $attribute_property => $value){
            $attribute_validations[$prefix.$attribute_property] = $rule;
        }
        $this->attribute_validations = $attribute_validations;
        return $this->attribute_validations;
    }

}
