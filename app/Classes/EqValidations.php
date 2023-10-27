<?php
namespace App\Classes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class EqValidations
{
    public $validations;

    //list of attributes that must be validated.
    public function setRequiredValidations($attributes_to_validate){
        foreach($attributes_to_validate as $attribute=>$value){
            $this->$attribute = $value;
        }
    }

    //All properties have the same validation prefix and rule. Returns array of arrays of validation rules.
    public function setSameValidationRulesOnAll(Array $attributes_to_validate, String $prefix=null, String $suffix=null, String $rule)
    {
        $validationRules = [];
        foreach($attributes_to_validate as $attributeName){
            $attributeValidation = [$prefix.'.'.$attributeName.'.'.$suffix => $rule];

            $this->$attributeName = $attributeValidation;
            array_push($validationRules, $attributeValidation);
        }
        return $validationRules;
    }

    public function collapseArray(Array $validationArray){
        Arr::collapse($validationArray);
    }
}
