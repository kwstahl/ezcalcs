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
    }

    protected $listeners = [
        'sendData' => 'pushData',
    ];

    public function makeSympyPreparationCollection()
    {
        $variablesJson = collect($this->variablesJson);
        $emptyCollection = $variablesJson->mapWithKeys(function($variableItem, $variableName){
            return [$variableItem['sympy_symbol'] => ['value' => null, 'unit_conversion' => null]];
        });
        return $emptyCollection;
    }

    public function pushData($name, $type, $value)
    {
        //$this->variableCollection = $this->variableCollection->merge([$name => [$type, $value]]);
       $variableCollection = $this->variableCollection;
       $variableCollection[$name][$type] = $value;
       $this->variableCollection = $variableCollection;
    }

    public function checkProgress(){
        $this->emit('validationEvent');
        dump($this->variableCollection);
    }

    public function render()
    {
        return view('livewire.page-component.solver');
    }
}
