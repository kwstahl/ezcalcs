<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;
use Illuminate\Support\Facades\Process;

class Solver extends Component
{
    public $formula;
    public $sympyDataArray;
    public $variablesJson;
    public $testCheck;
    public $formulaSympy;
    public $answer;
    public $errorOut;

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
        foreach ($this->variablesJson as $variableName => $variableArray) {
            $sympy_symbol = $variableArray['sympy_symbol'];
            $this->testCheck = $this->testCheck->push($this->$sympy_symbol);
        };

        $dataForSympyInJson = $this->prepareDataForSympyInJson();
        $this->sendDataToSympy($dataForSympyInJson);
        dump($this->answer);
    }

    private function prepareDataForSympyInJson()
    {
        $dataForSympyInJson = $this->variablesJson;
        $dataForSympyInJson = $this->variablesJson->mapWithKeys(function ($variable, $variableName) {
            $sympy_symbol = $variable['sympy_symbol'];
            $inputValue = $this->$sympy_symbol['value'];
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

    private function sendDataToSympy($dataForSympyInJson)
    {
        $command = 'python3 sympyScript.py' . ' ' . escapeshellarg($dataForSympyInJson) . ' ' . escapeshellarg($this->formulaSympy);
        $this->answer = Process::run($command)->output();
        $this->errorOut = Process::run($command)->errorOutput();
    }

    public function render()
    {
        return view('livewire.page-component.solver');
    }
}
