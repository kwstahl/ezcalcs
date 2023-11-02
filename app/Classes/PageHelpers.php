<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class PageHelpers
{
    public static function mapValidation_Prefix_Attribute_Rules(callable $mappingFunction, Array $attributes_array, String $component_identifier){
        $attribute_validations = [];
        foreach($attributes_array as $attribute => $value){
            $mappedValidationRule = $mappingFunction($attribute, $component_identifier);
            array_push($attribute_validations, $mappedValidationRule);
        };
        $attribute_validations = Arr::collapse($attribute_validations);
        return $attribute_validations;
    }

    /*public static function changeValidationRule(String $prefix = null, String $attribute, String $newRule)
    {
        $key_exists = array_key_exists($prefix.$attribute, $this->attribute_validations);
        if (!$key_exists){
            return 'doesnt exist';
        };

        $this->attribute_validations[$prefix.$attribute] = $newRule;
        return $this->attribute_validations[$prefix.$attribute];
    }*/


    //Pass in a collection of models and the attribute from which the key is on. Returns the collection of models keyed
    //by the attribute value.
    public static function setIdsOnCollectionOfModels($modelCollection, $attributeNameForKey)
    {
        $keyedCollection = $modelCollection->mapWithKeys(function($item, $key) use ($attributeNameForKey){
            return [$item->$attributeNameForKey => $item];
        })->all();

        return $keyedCollection;
    }

}
