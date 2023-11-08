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
    public $description;
    public $type;
    public $sympy_symbol;
    public $latex_symbol;
    public $unit_class;

    public $attributesArray;

    public function __get($attribute)
    {
        $attributeValue = $this->getAttributeObjectFromAttributesArray($attribute);
        return $attributeValue;
    }

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.page-component.variables');
    }
}
