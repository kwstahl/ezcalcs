<?php

namespace App\Http\Livewire\PageComponent;

use Illuminate\Validation\Validator;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Classes\PageHelpers;
use App\Classes\VariableHelper;


class Variables extends SuperVariables implements Validation
{
    public $variableSympySymbol;
    public $attributesArray;
    public $inputValue;
    public $attributes;
    public $disabled;

    public function mount()
    {
        $this->inputValue = null;
        $this->variableSympySymbol = $this->sympy_symbol;
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

    public function disable($variableSympySymbol){
        if ($variableSympySymbol == $this->variableSympySymbol){
            $this->inputValue = "";
            $this->disabled = true;
            $this->sendData();

        } else {
            $this->disabled = false;
        }
    }

    public function validation()
    {
        $this->withValidator(function (Validator $validator){
            $val = $validator->errors();
            if(count($val) == 0){
                return;
            }
            
            $this->emit('hasError');

        })->validate();
    }

    public function __get($attribute)
    {
        $attributeValue = $this->getAttributeObjectFromAttributesArray($attribute);
        return $attributeValue;
    }

    //necessary since the updatedInputValue is not picked up for changing inputValue to "null"
    public function sendData()
    {
        $this->validate();
        $this->emit('dataSent', $this->variableSympySymbol, 'value', $this->inputValue);
    }

    public function updatedInputValue($newInputValue){
        $this->validate();
        $this->emit('dataSent', $this->variableSympySymbol, 'value', $newInputValue);
    }

    public function render()
    {
        return view('livewire.page-component.variables');
    }
}
