<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;


class Solver extends Component
{
    public $formula;
    public $sympyDataArray;
    public $variablesJson;

    public function mount()
    {
        $this->sympyDataArray = [];
        $this->createVariableVectors();
    }

    protected $listeners = [
        'dataSent' => 'pushData',
    ];

    //this function is meant to create a vector for each variable like: var1 = [value, unit_conversion]
    public function createVariableVectors()
    {
        foreach($this->variablesJson as $variableName => $variableArray){
            $sympy_symbol = $variableArray['sympy_symbol'];
            $this->$sympy_symbol = ['variableSympySymbol' => $sympy_symbol, 'value' => '', 'unit_conversion' => ''];
        };
    }


    public function pushData($variableSympySymbol, $type, $value)
    {
        $this->$variableSympySymbol[$type] = $value;
    }

    public function checkProgress()
    {
        $this->emit('validationEvent');
    }

    public function render()
    {
        return view('livewire.page-component.solver');
    }
}
