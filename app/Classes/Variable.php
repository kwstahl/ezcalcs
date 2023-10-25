<?php

Namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

abstract class Variables
{
    public $type;
    public $name;
    public $description;
    public $sympy_symbol;
    public $latex_symbol;

    public $attributes_for_page;
    public $attribute_validations;

    public function setCustomValidationRules(callable $validationAssignmentFunction){
        $attributes_for_page = $this->attributes_for_page;
        $attribute_validations = [];

        foreach($attributes_for_page as $attribute => $value){
            array_push($attribute_validations, $validationAssignmentFunction($attribute, $this->name));
        };
        $this->attribute_validations = Arr::collapse($attribute_validations);
    }

    protected function searchArrayOnPrefixAndAttribute($prefix, $attribute)
    {
        if($this->attribute_validations[$prefix.$attribute])
        {

        }
    }

    public function editValidationRule(String $prefix = null, String $attribute, String $newRule)
    {
        $key_exists = array_key_exists($prefix.$attribute, $this->attribute_validations);
        if (!$key_exists){
            throw new Exception("does not exist");
            return;};

        $this->attribute_validations[$prefix.$attribute] = $newRule;

    }

    abstract public function setDefaultValidationRules();

    abstract public function __construct(String $name, Array $attributes_for_page);

}

class Variable extends Variables
{
    public $unit;
    public $unit_class;

    public function __construct(String $name, Array $attributes_for_page)
    {
        $this->name = $name;
        $this->attributes_for_page = $attributes_for_page;
        foreach ($attributes_for_page as $attribute_property => $value) {
            $this->$attribute_property = $value;
        }
    }

    public function setDefaultValidationRules(String $prefix = null, String $rule = null)
    {
        $attributes_for_page = $this->attributes_for_page;
        $attribute_validations = [];
        foreach ($attributes_for_page as $attribute_property => $value){
            $attribute_validations[$prefix.$attribute_property] = $rule;
        }
        $this->attribute_validations = $attribute_validations;
    }

}
