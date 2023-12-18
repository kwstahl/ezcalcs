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
        'radioSelected' => 'disable',
    ];

    public function disable($sympy_symbol){

        if ($sympy_symbol == $this->name){
            unset($this->inputValue);
            $this->disabled = true;

        } else {
            $this->disabled = false;
        }

        dump($sympy_symbol);

        $this->render();
    }

    public function __get($attribute)
    {
        $attributeValue = $this->getAttributeObjectFromAttributesArray($attribute);
        return $attributeValue;
    }

    public function render()
    {
        return view('livewire.page-component.variables');
    }
}
