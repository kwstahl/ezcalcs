<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;

class Radio extends SuperVariables
{
    public $attributesArray;
    public $name;


    public function mount()
    {
        $this->name = $this->sympy_symbol;
    }


    public function render()
    {
        return view('livewire.page-component.radio');
    }

    public function __get($attribute)
    {
        $attributeValue = $this->getAttributeObjectFromAttributesArray($attribute);
        return $attributeValue;
    }

    public function radioSelected(){
        $this->emit("radioSelect", $this->sympy_symbol);
    }
}
