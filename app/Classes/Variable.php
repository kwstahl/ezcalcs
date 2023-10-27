<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class Variable extends EquationComponents
{
    public $name;
    public $unit;
    public $unit_class;
    public $sympy_symbol;
    public $latex_symbol;

    public function __construct(String $name, Array $attributes_array)
    {
        $this->name = $name;
        $this->attributes_array = $attributes_array;
        $this->setPropertiesFrom_attributes_array($attributes_array);
    }

    public function mapValidation_Prefix_Attribute_Rules(callable $mappingFunction){
        $attributes_array = $this->attributes_array;
        $attribute_validations = [];

        $component_name = $this->name;

        foreach($attributes_array as $attribute => $value){
            $mappedValidationRule = $mappingFunction($attribute, $component_name);
            array_push($attribute_validations, $mappedValidationRule);
        };

        $this->attribute_validations = Arr::collapse($attribute_validations);
        return $attribute_validations;
    }

    public function setDefaultValidationRules(String $prefix = null, String $rule = null)
    {
        $attributes_array = $this->attributes_array;
        $attribute_validations = [];
        foreach ($attributes_array as $attribute_property => $value){
            $attribute_validations[$prefix.$attribute_property] = $rule;
        }
        $this->attribute_validations = $attribute_validations;
        return $this->attribute_validations;
    }
}


?>
