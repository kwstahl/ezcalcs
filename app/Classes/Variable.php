<?php

namespace App\Classes;

class Variable extends EquationComponents
{
    public $unit;
    public $unit_class;
    public $sympy_symbol;
    public $latex_symbol;

    public function __construct(String $name, Array $fillable_attributes)
    {
        $this->name = $name;
        $this->fillable_attributes = $fillable_attributes;
        foreach ($fillable_attributes as $attribute_property => $value) {
            $this->$attribute_property = $value;
        }
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
