<?php

Namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

abstract class EquationComponents
{
    public $type;
    public $name;
    public $description;

    public $fillable_attributes;
    public $attribute_validations;

    public function mapValidation_Prefix_Attribute_Rules(callable $mappingFunction){
        $fillable_attributes = $this->fillable_attributes;
        $attribute_validations = [];

        $variable_name = $this->name;

        foreach($fillable_attributes as $attribute => $value){
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

    abstract public function __construct(String $name, Array $fillable_attributes);

}

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

