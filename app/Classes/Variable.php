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
    public $inputValue;

    public function __construct(String $name=null, Array $attributes_array)
    {
        $this->name = $name;
        $this->attributes_array = $attributes_array;
        $this->setPropertiesFrom_attributes_array($attributes_array);
    }
}


?>
