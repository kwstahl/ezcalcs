<?php

Namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Variables
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
        foreach ($properties_array as $prop => $value) {
            $this->$prop = $value;
        }
    }

    public function see_props()
    {
        dump($this->unit);
    }
}

?>
