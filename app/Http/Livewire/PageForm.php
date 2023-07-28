<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Unit;
use Illuminate\Support\Facades\Process;

class PageForm extends Component
{
    public $variables;
    public $units;
    public $boundDataForSympy;
    public $formula_sympi;
    public $variableToSolveFor;
    public $answer;
    public $errorOut;
    public $variableToSolveForUnit;

    protected $rules = [
        'boundDataForSympy.*.Value' => 'nullable',
        'boundDataForSympy.*.unit_conversion' => 'nullable|numeric',
        'variableToSolveFor' => 'nullable',
    ];


    public function mount()
    {
        $this->variables = collect($this->variables);
        $this->units = Unit::all();
        $this->boundDataForSympy = collect();
        $this->variableToSolveFor = $this->variables->keys()->first();
        $this->variableToSolveForUnit = '';
        $this->answer = '';
        $this->errorOut = '';

        /* This is where 'Value' and 'unit_conversion' are created for boundDataForSympy */
        $this->createBindingsForEachVariable();

        /* The unit options list is made here for the blade tempalte "select" tag. */
        $this->getAvailableUnitsForEachVariable();
    }

    private function createBindingsForEachVariable()
    {
    // For each variable, create value and unit bindings to be used by blade template binding
    // Necessary because empty data must have the keys to be passed into python.
        $this->boundDataForSympy = $this->variables->mapWithKeys(function ($variable, $variableName) {
            return [
                $variableName => [
                    'Value' => '',
                    'unit_conversion' => (float) 0.0,
                ]
            ];
        });
    }

    private function getAvailableUnitsForEachVariable()
    {
        $this->variables->transform(function($variable){
            $variable['unitOptions'] = collect();
            $variableUnitClass = $variable['unit'];
            /* From Units Model, filter by Unit class. Return only symbol, conversion */
            $filteredUnits = $this->units 
                ->where('unit_class', $variableUnitClass)
                ->map(function($unit){
                    return [
                        'symbol' => $unit->symbol,
                        'conversion_to_base' => $unit->conversion_to_base,
                    ];
                })
                ->values();

            $variable['unitOptions'] = $filteredUnits;
            return $variable;
        });
    }

    public function updatedVariableToSolveFor()
    {
        $variable = $this->boundDataForSympy[$this->variableToSolveFor];
        if($variable){
            $variable['Value'] = '';
            $this->boundDataForSympy[$this->variableToSolveFor] = $variable;
        }
    }

    public function setAnswer()
    {
        $this->boundDataForSympy = $this->boundDataForSympy->map(function ($variable) {
            return [
                'Value' => $variable['Value'] ?: '',
                'unit_conversion' => (float) $variable['unit_conversion'] ?: '',
            ];
        });
        $command = 'python3 sympyScript.py' . ' ' . escapeshellarg($this->boundDataForSympy) . ' ' . escapeshellarg($this->formula_sympi);
        $this->answer = Process::run($command)->output();

        $this->errorOut = Process::run($command)->errorOutput();
    }

    public function render()
    {
        return view('livewire.page-form');
    }
}