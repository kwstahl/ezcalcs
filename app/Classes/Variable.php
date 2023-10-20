<?php

Namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class Variable
{
    public $unit;
    public $latex_symbol;
    public $sympy_symbol;
    public $description;
    public $type;
    public $variable_name;
    public $variable_properties;
    public $validation_rules;

    public function __construct($variable_name, $variable_properties)
    {
        $this->variable_name = $variable_name;
        $this->variable_properties = $variable_properties;
        foreach ($variable_properties as $property => $value) {
            $this->$property = $value;
        }
    }

    /**
    * Set the same validation rule for each property for Livewire.
    *
    * Attaches a validation prefix and assigns the same rule to each property.
    *
    * @param array, JSON $variable_properties {
    *       @var string $key is the property name. Accepts a string value.
    *   }
    *
    * @param string $prefix The validation prefix must end with '.'
    *       $prefix = 'variable.*.unit.'
    *
    * @param string $rule Use a Laravel validation rule such as 'nullable|required'.
    *
    * @return array of validation rules.
    *
    */
    public function defaultValidationRules($variable_properties, String $prefix, String $rule)
    {
        $variable_rules = [];
        foreach ($variable_properties as $property => $value)
        {
            $variable_rules[$prefix.$property] = $rule;
        }
        return $variable_rules;
    }


    /**
    * Sets validation rules for each property where
    *
    * Attaches a validation prefix and assigns the same rule to each property.
    *
    * @param array, JSON $variable_properties {
    *       @var string $key is the property name. Accepts a string value.
    *   }
    *
    * @param string $prefix The validation prefix must end with '.'
    *       $prefix = 'variable.*.unit.'
    *
    * @param string $rule Use a Laravel validation rule such as 'nullable|required'.
    *
    * @return array of validation rules.
    *
    */
    public function assignRulesToAllProperties(Callable $prefixRuleFunction)
    {
        $variable_properties = $this->variable_properties;
        $validation_rules = [];

        foreach($variable_properties as $property => $value){
            array_push($validation_rules, $prefixRuleFunction($property, $this->variable_name));
        };

        return $this->validation_rules;
    }

}

?>
