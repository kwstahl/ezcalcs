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

    public function __construct(String $id, Array $fillable_attributes)
    {
        $this->id = $id;
        $this->fillable_attributes = $fillable_attributes;
    }

    public function setDefaultValidationRules(string $prefix =null, array $rule=null)
    {
        $fillable_attributes = $this->fillable_attributes;
        $attribute_validations = [];
        foreach ($fillable_attributes as $attribute_property => $value){
            $attribute_validations[$prefix.$attribute_property] = $rule;
        }
        $this->attribute_validations = $attribute_validations;
        return $this->attribute_validations;
    }

    public function mapValidation_Prefix_Attribute_Rules(callable $mappingFunction=null){
        return;
    }

}
