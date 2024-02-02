<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;


class Solver extends Component
{
    public $formula;
    public $sympyDataArray;
    public $variablesJson;
    public $testCheck;

    public function mount()
    {
        $this->sympyDataArray = [];
        $this->testCheck = collect();
        $this->createVariableVectors();
    }

    protected $listeners = [
        'sendData' => 'pushData',
    ];

    //this function is meant to create a vector for each variable like: var1 = [value, unit_conversion]
    public function createVariableVectors()
    {
        foreach($this->variablesJson as $variableName => $variableArray){
            $sympy_symbol = $variableArray['sympy_symbol'];
            $this->$sympy_symbol = ['name' => $sympy_symbol, 'value' => '', 'unit_conversion' => ''];
        };
    }

    public function pushData($name, $type, $value)
    {
        $this->$name[$type] = $value;
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
