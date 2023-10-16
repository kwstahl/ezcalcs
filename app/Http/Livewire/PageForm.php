<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Unit;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Arr;

class PageForm extends Component
{
    public $variables_json;
    public $units;
    public $unitOptions;
    public $variables;
    public $formula_sympy;
    public $variableToSolveFor;
    public $answer;

    public function mount()
    {
        $this->units = Unit::all();
        $this->unitOptions = collect();

        $this->variables_json = collect($this->variables_json);
        $this->variables = collect();
        $this->variableToSolveFor = $this->variables_json->keys()->first();

        $this->answer = '';
        $this->errorOut = '';

        $this->setUnitOptionsForEachVariable();
        $this->setVariableInputData();
    }

    public function messages()
    {
        $variable_messages = function ($variableName) {
            $messages = [
                'variables.' . $variableName . 'unit_conversion' => 'Select a unit for "' . $variableName . '".',
                'variables.' . $variableName . '.Value.numeric' => 'Only numbers are allowed to be entered for "' . $variableName . '".',
                'variables.' . $variableName . '.Value.required' => 'Please enter a value for "' . $variableName . '".',
            ];
            return $messages;
        };

        $messages = [];
        foreach($this->variables as $variableName=>$variable)
        {
            array_push($messages, $variable_messages($variableName));
        }

        $messages = Arr::flatten($messages);
        return $messages;
    }

    protected $listeners = ['setUnit'];

    protected function rules()
    {
        $variableToSolveForValueEntry = 'variables.' . $this->variableToSolveFor . '.Value';
        return [
            'variables.*.Value' => 'required|numeric',
            $variableToSolveForValueEntry => 'nullable',
            'variables.*.unit_conversion' => 'required',
            'variableToSolveFor' => 'required',
        ];
    }

    private function setVariableInputData()
    {
        $this->variables = $this->variables_json->mapWithKeys(function ($variable, $variableName) {
            return [
                $variableName => [
                    'sympy_symbol' => $variable['sympy_symbol'],
                    'Value' => '',

                    //For a non 'variable' type, set conversion factor to 1 since will be non-converted.
                    'unit_conversion' => ($variable['type'] == 'variable') ? ('') : (1),
                    'unit_symbol' => '',
                    'description' => '',
                ]
            ];
        });
    }

    private function setUnitOptionsForEachVariable()
    {
        foreach ($this->variables_json as $variableName => $variable) {
            if ($variable['type'] == 'variable') {
                $variableUnitClass = $variable['unit'];
                $unitsForVariable = $this->units
                    ->where('unit_class', $variableUnitClass)
                    ->mapWithKeys(function ($unit, $unitName) {
                        return [
                            $unit->id => [
                                'symbol' => $unit->symbol,
                                'conversion_to_base' => $unit->conversion_to_base,
                                'unit_class' => $unit->unit_class,
                                'unit_description' => $unit->description,
                            ]
                        ];
                    })
                    ->all();
                $this->unitOptions[$variableName] = $unitsForVariable;
            }
            //skip unitless variables
            else {
                continue;
            }
        }
    }

    public function setUnit($variableName, $unitName)
    {
        $variable = $this->variables[$variableName];
        $variable['unit_conversion'] = $this->unitOptions[$variableName][$unitName]['conversion_to_base'];
        $variable['unit_symbol'] = $this->unitOptions[$variableName][$unitName]['symbol'];
        $variable['unit_description'] = $this->unitOptions[$variableName][$unitName]['unit_description'];
        $this->variables[$variableName] = $variable;
    }

    public function updatedVariableToSolveFor()
    {
        /* Laravel's collection class is immutable, so a new collection instance with a cleared value must be created, then assigned */
        $newVariableToSolveFor = $this->variables[$this->variableToSolveFor];
        $newVariableToSolveFor['Value'] = '';
        $this->variables[$this->variableToSolveFor] = $newVariableToSolveFor;
        $this->rules();
    }

    public function submit()
    {
        $validatedData = $this->validate();
        $dataForSympyInJson = $this->prepareDataForSympyInJson();
        $this->sendDataToSympy($dataForSympyInJson);
    }

    public function errorBagThing(){
        return collect($this->getErrorBag());
    }
    private function prepareDataForSympyInJson()
    {
        $dataForSympyInJson = $this->variables;
        $dataForSympyInJson = $this->variables->mapWithKeys(function ($variable, $variableName) {
            $sympy_symbol = $variable['sympy_symbol'];
            return
                [
                    $sympy_symbol => [
                        'Value' => $variable['Value'],
                        'unit_conversion' => (float) $variable['unit_conversion'],
                    ]
                ];
        });
        return $dataForSympyInJson;
    }

    private function sendDataToSympy($dataForSympyInJson)
    {
        $command = 'python3 sympyScript.py' . ' ' . escapeshellarg($dataForSympyInJson) . ' ' . escapeshellarg($this->formula_sympy);
        $this->answer = Process::run($command)->output();
        $this->errorOut = Process::run($command)->errorOutput();
    }



    public function render()
    {
        return view('livewire.page-form');
    }
}