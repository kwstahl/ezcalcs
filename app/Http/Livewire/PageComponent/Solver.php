<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;


class Solver extends Component
{
    public $formula;
    public $sympyDataArray;
    public $variablesJson;
    public $variableCollection;

    public function mount()
    {
        $this->sympyDataArray = [];
        $this->variableCollection = $this->makeSympyPreparationCollection();
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
            $this->$sympy_symbol = ['value' => '', 'unit_conversion' => ''];
        };
        dump($this->$sympy_symbol);
    }

    public function makeSympyPreparationCollection()
    {
        $variablesJson = collect($this->variablesJson);
        $emptyCollection = $variablesJson->mapWithKeys(function ($variableItem, $variableName) {
            return [$variableItem['sympy_symbol'] => ['value' => null, 'unit_conversion' => null]];
        });
        return $emptyCollection;
    }

    public function pushData($name, $type, $value)
    {
        $this->variableCollection = $this->variableCollection->merge([$name => [$type, $value]]);
    }

    public function checkProgress()
    {
        $this->emit('validationEvent');
        dump($this->variableCollection);
    }

    public function render()
    {
        return view('livewire.page-component.solver');
    }
}
