<?php

Namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

abstract class EquationComponents
{
    public $type;
    public $description;
    public $attributes_array;
    public $attribute_validations;

    abstract public function __construct(Array $attributes_array);

    protected function setPropertiesFrom_attributes_array(Array $attributes_array)
    {
        foreach($attributes_array as $attribute=>$value){
            $this->$attribute = $value;
        }
    }
}


