<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Classes\PageHelpers;


class SuperVariables extends Component
{
    public $attributesArray;

    /**
     * Create a new component instance.
     */

    protected function setPropertiesFrom_attributes_array(Array $attributesArray)
    {
        foreach($attributesArray as $attribute=>$value){
            $this->$attribute = $value;
        }
    }

    public function getAttributeObjectFromAttributesArray($attributeId)
    {
        $attributesArray = $this->attributesArray;

        if (!array_key_exists($attributeId, $attributesArray)) {
            return 'Does not exist';
        }

        return $attributesArray[$attributeId];
    }


    public function render()
    {
    }
}
