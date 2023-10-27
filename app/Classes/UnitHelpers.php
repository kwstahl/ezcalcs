<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class UnitHelpers extends EquationComponents
{
    public $unit_class;
    public $symbol;
    public $base_unit;
    public $conversion_to_base;
    public $id;

    public function __construct(String $id, Array $attributes_array)
    {
        $this->id = $id;
        $this->attributes_array = $attributes_array;
    }

    public function setDefaultValidationRules(string $prefix =null, array $rule=null)
    {
        $attributes_array = $this->attributes_array;
        $attribute_validations = [];
        foreach ($attributes_array as $attribute_property => $value){
            $attribute_validations[$prefix.$attribute_property] = $rule;
        }
        $this->attribute_validations = $attribute_validations;
        return $this->attribute_validations;
    }

    public function mapValidation_Prefix_Attribute_Rules(callable $mappingFunction=null){
        return;
    }

}
