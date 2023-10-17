<?php

Namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Variable
{
    public $unit;
    public $latex_symbol;
    public $sympy_symbol;
    public $description;
    public $type;
    public $variable_name;
    public $properties_array;

    public function __construct($properties_array)
    {
        $this->properties_array = $properties_array;
        foreach ($properties_array as $prop => $value) {
            $this->$prop = $value;
        }
    }

    public function see_props()
    {
        dump($this->unit);
        dump($this->properties_array);

    }

    public function hi(){
        return 'hiu';
    }

    /*
    * Set the same validation rule for each property for Livewire.
    *
    * Attaches a validation prefix and assigns the same rule to each property.
    *
    * @param array $variable_properties {
    *       @type string $key is the property name. Accepts a string value.
    *   }
    *
    * @param string $prefix The validation prefix must end with '.'
    *       $prefix = 'variable.*.unit.'
    *
    * @param string $rule Use a Laravel validation rule such as 'nullable|required'.
    *
    * @return collection
    *
    **/
    public static function setAllValidationRules($variable_properties, String $prefix, String $rule)
    {
        $variable_rules = [];
        foreach ($variable_properties as $property => $value)
        {
            $variable_rules[$prefix + $property] = $rule;
        }
        return $rule;
    }
}

?>
