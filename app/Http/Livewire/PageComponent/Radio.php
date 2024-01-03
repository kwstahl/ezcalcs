<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;

class Radio extends SuperVariables
{
    public $attributesArray;
    public $name;
    public $isSelected;

    public function mount()
    {
        $this->name = $this->sympy_symbol;
    }

    public function __get($attribute)
    {
        $attributeValue = $this->getAttributeObjectFromAttributesArray($attribute);
        return $attributeValue;
    }

    //triggered when radio button is selected on HTML
    public function radioSelect(){
        $this->emit("radioSelected", $this->name);
    }

    public function render()
    {
        return view('livewire.page-component.radio');
    }

}
