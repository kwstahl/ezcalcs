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

    public function __construct(String $name, Array $fillable_attributes)
    {
        $this->name = $name;
        $this->fillable_attributes = $fillable_attributes;
        $this->setPropertiesFrom_attributes_array($fillable_attributes);
    }

    public function mapValidation_Prefix_Attribute_Rules(callable $mappingFunction){
        $fillable_attributes = $this->fillable_attributes;
        $attribute_validations = [];

        $component_name = $this->name;

        foreach($fillable_attributes as $attribute => $value){
            $mappedValidationRule = $mappingFunction($attribute, $component_name);
            array_push($attribute_validations, $mappedValidationRule);
        };

        $this->attribute_validations = Arr::collapse($attribute_validations);
        return $attribute_validations;
    }

    public function setDefaultValidationRules(String $prefix = null, String $rule = null)
    {
        $fillable_attributes = $this->fillable_attributes;
        $attribute_validations = [];
        foreach ($fillable_attributes as $attribute_property => $value){
            $attribute_validations[$prefix.$attribute_property] = $rule;
        }
        $this->attribute_validations = $attribute_validations;
        return $this->attribute_validations;
    }
}


?>
