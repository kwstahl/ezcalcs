<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;
use PDO;

class Solver extends Component
{
    public $formula;
    public $sympyDataArray;
    public $variablesJson;
    public $testCheck;

    public function mount()
    {
        $this->sympyDataArray = [];
        $this->createVariableVectors();
        $this->testCheck = collect();
    }

    protected $listeners = [
        'dataSent' => 'pushData',
    ];

    //this function is meant to create a vector for each variable like: var1 = [value, unit_conversion]
    public function createVariableVectors()
    {
        foreach ($this->variablesJson as $variableName => $variableArray) {
            $sympy_symbol = $variableArray['sympy_symbol'];
            $this->$sympy_symbol = ['variableSympySymbol' => $sympy_symbol, 'Value' => '', 'unit_conversion' => ''];
        };
    }


    public function pushData($variableSympySymbol, $type, $value)
    {
        $this->$variableSympySymbol[$type] = $value;
    }

    public function checkProgress()
    {
        $this->emit('validationEvent');
        foreach ($this->variablesJson as $variableName => $variableArray) {
            $sympy_symbol = $variableArray['sympy_symbol'];
            $this->testCheck = $this->testCheck->push($this->$sympy_symbol);
        };

        dump($this->prepareDataForSympyInJson());
    }

    private function prepareDataForSympyInJson()
    {
        $dataForSympyInJson = $this->variablesJson;
        $dataForSympyInJson = $this->variablesJson->mapWithKeys(function ($variable, $variableName) {
            $sympy_symbol = $variable['sympy_symbol'];
            $inputValue = $this->$sympy_symbol['Value'];
            dump($inputValue);
            $unitConversion = $this->$sympy_symbol['unit_conversion'];
            return
                [
                    $sympy_symbol => [
                        'Value' => $inputValue,
                        'unit_conversion' => $unitConversion,
                    ]
                ];

        });
        return $dataForSympyInJson;
    }

    public function render()
    {
        return view('livewire.page-component.solver');
    }
}
