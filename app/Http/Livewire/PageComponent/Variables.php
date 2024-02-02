<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Classes\PageHelpers;
use App\Classes\VariableHelper;


class Variables extends SuperVariables implements Validation
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
        'radioSelected' => 'disable',
        'validationEvent' => 'validation',
    ];

    protected function rules() {
        if ($this->disabled == true){
            return ['inputValue' => 'nullable'];
        } else {
            return ['inputValue' => 'required|numeric'];
        }
    }

    public function disable($name){
        if ($name == $this->name){
            $this->inputValue = null;
            $this->disabled = true;
            $this->sendData();

        } else {
            $this->disabled = false;
        }
    }

    public function validation() {
        $this->validate();
        $this->sendData();
    }

    public function __get($attribute)
    {
        $attributeValue = $this->getAttributeObjectFromAttributesArray($attribute);
        return $attributeValue;
    }

    public function sendData()
    {
        $this->emit('sendData', $this->name, 'value', $this->inputValue);
    }

    public function updatedInputValue($newInputValue){
        $this->emit('sendData', $this->name, 'value', $newInputValue);
    }

    public function render()
    {
        return view('livewire.page-component.variables');
    }
}
