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
        $this->variable_properties = $variable_properties;

        //Set each property from array
        foreach ($variable_properties as $property => $value) {
            $this->$property = $value;
        }
    }
}

?>
