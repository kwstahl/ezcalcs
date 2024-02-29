<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;
use Illuminate\Support\Facades\Process;
use Illuminate\Validation\Validator;

class Solver extends Component
{
    public $sympyDataArray;
    public $variablesJson;
    public $formulaSympy;
    public $answer;
    public $errorOut;
    public $hasError;

    public function mount()
    {
        $this->sympyDataArray = [];
        $this->createVariableVectors();
    }

    protected $listeners = [
        'dataSent' => 'pushData',
        'submit' => 'calculate',
        'hasError' => 'handleError',
    ];

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
                        'unit_conversion' => (float) $unitConversion,
                    ]
                ];

        });
        return $dataForSympyInJson;
    }

    private function sendDataToSympy($dataForSympyInJson)
    {
        $command = 'python3 sympyScript.py' . ' ' . escapeshellarg($dataForSympyInJson) . ' ' . escapeshellarg($this->formulaSympy);
        $this->answer = (string) Process::run($command)->output();
        $this->errorOut = Process::run($command)->errorOutput();
    }

    //this function is meant to create a vector for each variable like: var1 = [value, unit_conversion]
    public function createVariableVectors()
    {
        foreach ($this->variablesJson as $variableName => $variableArray) {
            $sympy_symbol = $variableArray['sympy_symbol'];
            $this->$sympy_symbol = ['variableSympySymbol' => $sympy_symbol, 'value' => '', 'unit_conversion' => ''];
        };
    }

    public function handleError(){
        $this->hasError = True;
        dump("hellop");

    }

    public function pushData($variableSympySymbol, $type, $value)
    {
        $this->$variableSympySymbol[$type] = $value;
    }

    public function checkValidations()
    {
        $this->hasError = False;
        $this->emit("validationEvent");

    }

    public function calculate()
    {
        $this->checkValidations();

        if($this->hasError == True){
            return;
        }

        foreach ($this->variablesJson as $variableName => $variableArray) {
            $sympy_symbol = $variableArray['sympy_symbol'];
        };

        $dataForSympyInJson = $this->prepareDataForSympyInJson();
        $this->sendDataToSympy($dataForSympyInJson);
    }

    public function render()
    {
        return view('livewire.page-component.solver');
    }
}
