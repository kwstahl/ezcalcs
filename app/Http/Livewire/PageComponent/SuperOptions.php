<?php

namespace App\Http\Livewire\PageComponent;

use Illuminate\Support\Collection;
use Livewire\Component;


class SuperOptions extends Component
{
    public $optionsArray;
    public $baseOption;
    public $selectedOption;

    /**
     * For each object in the optionsArray, set a key given some attribute to set on
     *
     * Transforms optionsArray to a keyed array
     *
     */


    public function setKeysFromIndex(String $indexName)
    {
        $optionsArray = collect($this->optionsArray);
        $keyed = $optionsArray->mapWithKeys(function (array $item, int $key) use ($indexName){
            return [$item[$indexName] => $item];
        });

        $this->optionsArray = $keyed->toArray();
    }

    public function setSelectedOptionAsFirst()
    {
        $optionsArray = $this->optionsArray;
        $this->selectedOption = $optionsArray[0];
    }

    public function setSelectedOption($option){
        $this->selectedOption = $option;
        return $this->selectedOption;
    }

    public function setSelectedOptionById($optionId){
        $option = $this->getOptionObjectFromOptionsArray($optionId);
        $this->selectedOption = $option;
        return $option;
    }

    //Gets option by key, returns object in optionsArray
    public function getOptionObjectFromOptionsArray($optionId)
    {
        $optionsArray = $this->optionsArray;

        if (!array_key_exists($optionId, $optionsArray)) {
            return 'Does not exist';
        }

        return $optionsArray[$optionId];
    }

    // Create an array of objects from a model indexed, and filtered on some attribute value
    public static function getIndexedArrayFromModelTable($modelTableName, $attributeToIndexOn, $attributeToFilterOn, $filterValue)
    {
        $modelCollection = $modelTableName::where($attributeToFilterOn, $filterValue)->get();
        $indexedArray = $modelCollection->mapWithKeys(function($item, $key) use ($attributeToIndexOn){
            return [$item->$attributeToIndexOn => $item];
        })->all();
        return $indexedArray;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
    }
}
