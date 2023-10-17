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
    public $variable_properties;

    public function __construct($variable_properties)
    {
        $this->variable_properties = collect($variable_properties);
        foreach ($variable_properties as $property => $value) {
            $this->$property = $value;
        }
    }

    public static function setAllValidationRules($variable_properties, $prefix, $rule)
    {
        foreach ($variable_properties as $property => $value)
        {

        }
    }
}

?>
