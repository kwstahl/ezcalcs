<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Unit;
use Illuminate\Support\Facades\Process;

class PageForm extends Component
{
    public $variables_json;
    public $units;
    public $unitOptions;
    public $variableInputData;
    public $formula_sympy;
    public $variableToSolveFor;
    public $answer;

    public function mount()
    {
        $this->units = Unit::all();
        $this->unitOptions = collect();

        $this->variables_json = collect($this->variables_json);
        $this->variableInputData = collect();
        $this->variableToSolveFor = $this->variables_json->keys()->first();

        $this->answer = '';
        $this->errorOut = '';

        $this->setVariableInputData();
        $this->setUnitOptionsForEachVariable();
    }

    protected $messages = [
        'variableInputData.*.unit_conversion' => 'Select a unit for :attribute variable.',
        'variableInputData.*.Value.numeric' => 'Only numbers are allowed to be entered for :attribute.',
        'variableInputData.*.Value.required' => 'Please enter a value for :attribute.'
    ];


    protected function rules()
    {
        $variableToSolveForValueEntry = 'variableInputData.' . $this->variableToSolveFor . '.Value';
        return [
            'variableInputData.*.Value' => 'required|numeric',
            $variableToSolveForValueEntry => 'nullable',
            'variableInputData.*.unit_conversion' => 'required|numeric',
            'variableToSolveFor' => 'required',
        ];
    }

    private function setVariableInputData()
    {
        $this->variableInputData = $this->variables_json->mapWithKeys(function ($variable, $variableName) {
            return [
                $variableName => [
                    'sympy_symbol' => $variable['sympy_symbol'],
                    'Value' => '',

                    //For a non 'variable' type, set conversion factor to 1 since will be non-converted.
                    'unit_conversion' => ($variable['type']=='variable') ? (''):(1),
                ]
            ];
        });
    }

    private function setUnitOptionsForEachVariable()
    {
        foreach($this->variables_json as $variableName => $variable){
            if ($variable['type'] == 'variable'){
                $variableUnitClass = $variable['unit'];
                $unitsForVariable = $this->units
                    ->where('unit_class', $variableUnitClass)
                    ->mapWithKeys(function($unit, $unitName) {
                            return [
                                $unit->id => [
                                'symbol' => $unit->symbol,
                                'conversion_to_base' => $unit->conversion_to_base,
                                'unit_class' => $unit->unit_class,
                                ]
                            ];
                        })
                    ->all();
                $this->unitOptions[$variableName] = $unitsForVariable;
            }
            //skip unitless variables
            else {continue;}
        }
    }

    public function setUnitInputData($variableName, $unit)
    {
        $this->variableInputData
            ->keyBy($variableName)
            ->put('unit_conversion', $unit);
        dd($this->variableInputData);
    }

    public function updatedVariableToSolveFor()
    {
        /* Laravel's collection class is immutable, so a new collection instance with a cleared value must be created, then assigned */
        $newVariableToSolveFor = $this->variableInputData[$this->variableToSolveFor];
        $newVariableToSolveFor['Value'] = '';
        $this->variableInputData[$this->variableToSolveFor] = $newVariableToSolveFor;
        $this->rules();
    }

    public function submit()
    {
        $this->validate();
        $dataForSympyInJson = $this->prepareDataForSympyInJson();
        $this->sendDataToSympy($dataForSympyInJson);
    }

    private function prepareDataForSympyInJson(){
        $dataForSympyInJson = $this->variableInputData;
        $dataForSympyInJson = $this->variableInputData->mapWithKeys(function ($variable, $variableName) {
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
