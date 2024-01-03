<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;

class UnitOptions extends SuperOptions implements Validation
{
    public $optionsArray;
    public $baseOption;

    /**
     * Create a new component instance.
     */
    public function mount() {
        $this->selectedOption = null;


    }

    protected $rules = [
        'selectedOption' => 'required'
    ];

    //returns the option object from the optionsArray
    public function __get($optionId)
    {
        return $this->getOptionObjectFromOptionsArray($optionId);
    }

    public function changeSelectedOption($optionId)
    {
        $optionObject = $this->getOptionObjectFromOptionsArray($optionId);
        $this->selectedOption = $optionObject;
    }

    public function validation(){
        $this->validate();
    }

    //returns an array of objects based on the model attribute and the value to filter from
    public function createOptionsArray($modelAttribute, $attributeValue)
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('livewire.page-component.unit-options');
    }
}

