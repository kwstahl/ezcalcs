<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Classes\PageHelpers;

class Variable extends EquationComponents
{
    public $name;
    public $unit;
    public $unit_class;
    public $sympy_symbol;
    public $latex_symbol;

    public function __construct(String $name=null, Array $attributes_array)
    {
        $this->name = $name;
        $this->attributes_array = $attributes_array;
        $this->setPropertiesFrom_attributes_array($attributes_array);

    }

    public function mapValidation_Prefix_Attribute_Rules(callable $mappingFunction){
        $component_identifier = $this->name;
        $attributes_array = $this->attributes_array;

        $attribute_validations = PageHelpers::mapValidation_Prefix_Attribute_Rules(
            $mappingFunction, $attributes_array, $component_identifier
        );

        $this->attribute_validations = $attribute_validations;
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
