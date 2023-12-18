<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Classes\PageHelpers;
use App\Classes\VariableHelper;


class Variables extends SuperVariables
{
    public $name;
    public $attributesArray;
    public $inputValue;
    public $attributes;
    public $disabled;

    public function mount()
    {
        $this->inputValue = null;
        $this->name = $this->sympy_symbol;
        $this->disabled = false;
    }

    protected $listeners = [
        'disabled' => 'setDisabled',
    ];

    public function setDisabled(){
        dd('hello');
    }

    public function __get($attribute)
    {
        $attributeValue = $this->getAttributeObjectFromAttributesArray($attribute);
        return $attributeValue;
    }

    public function isSelected(){
        unset($this->inputValue);
        $this->disabled = "disabled";
    }

    public function render()
    {
        return view('livewire.page-component.variables');
    }
}
