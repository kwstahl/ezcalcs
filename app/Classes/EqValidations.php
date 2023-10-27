<?php
namespace App\Classes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class EqValidations
{
    public $validationArray;

    //All properties have the same validation prefix and rule. Returns array of arrays of validation rules.
    public function setSameValidationRulesOnAll(Array $attributes_to_validate, String $prefix=null, String $suffix=null, String $rule)
    {
        $validationRules = [];
        foreach($attributes_to_validate as $attributeName){
            $attributeValidation = [$prefix.'.'.$attributeName.'.'.$suffix => $rule];

            $this->$attributeName = $attributeValidation;
            array_push($validationRules, $attributeValidation);
        }
        $this->validationArray = $validationRules;
        return $this;
    }

    //Send associative arrays of prefix.attribute.suffix => rule
    public function setDefinedValidationRules(Array $attribute_validations)
    {
        $validationRules = [];
        foreach($attribute_validations as $attributeName=>$rule)
        {
            array_push($validationRules, [$attributeName=>$rule]);
        }
        $this->validationArray = $validationRules;
        return $this;
    }

    public function collapseArray(){
        $collapsedArray = Arr::collapse($this->validationArray);
        return $collapsedArray;
    }
}
