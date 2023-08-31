<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Unit;
use Illuminate\Support\Facades\Process;

class PageForm extends Component
{
    public $variables_json;
    public $units;
    public $unitsForVariables;
    public $jsonForSympyParsing;
    public $formula_sympy;
    public $variableToSolveFor;
    public $answer;
    public $errorOut;
    public $variableToSolveForUnit;

    protected $rules = [
        'jsonForSympyParsing.*.Value' => 'nullable|numeric',
        'jsonForSympyParsing.*.unit_conversion' => 'nullable|numeric',
        'variableToSolveFor' => 'required',
    ];

    protected $listeners = ['testAdd' => 'testThing'];

    public function mount()
    {
        $this->variables_json = collect($this->variables_json);
        $this->units = Unit::all();
        $this->jsonForSympyParsing = collect();
        $this->variableToSolveFor = $this->variables_json->keys()->first();
        $this->variableToSolveForUnit = 'select units';
        $this->answer = '';
        $this->errorOut = '';
        $this->unitsForVariables = collect();

        /* This is where 'Value' and 'unit_conversion' are created for jsonForSympyParsing */
        $this->setJsonForSympyParsing();

        /* The unit options list is made here for the blade tempalte "select" tag. */
        $this->setUnitOptionsForEachVariable();
    }

    public function testThing($selectedText)
    {
        $this->variableToSolveForUnit = $selectedText;
    }

    private function setJsonForSympyParsing()
    {
        $this->jsonForSympyParsing = $this->variables_json->mapWithKeys(function ($variable, $variableName) {
            return [
                $variableName => [
                    'Value' => '',
                    'unit_conversion' => (float) 0.0,
                ]
            ];
        });
    }


    private function setUnitOptionsForEachVariable()
    {

        foreach($this->variables_json as $variableName => $variable){
            $variableUnitClass = $variable['unit'];
            $this->unitsForVariables = $this->units
            ->where('unit_class', $variableUnitClass)

            /* USE MAPWITH KEYS PROBABLY */
            ->map(function($unit){
                    return [
                        'symbol' => $unit->symbol,
                        'conversion_to_base' => $conversion_to_base,
                    ];
                })
            ->values();
        }
        
        $this->variables_json->transform(function($variable){
            $variableUnitClass = $variable['unit'];
            /* From Units Model, filter by Unit class. Return only symbol, conversion */
            $unitOptions = $this->units 
                ->where('unit_class', $variableUnitClass)
                ->map(function($unit){
                    return [
                        'symbol' => $unit->symbol,
                        'conversion_to_base' => $unit->conversion_to_base,
                    ];
                })
                ->values();
            $variable['unitOptions'] = $unitOptions;
            return $variable;
        });
    }

    public function updatedVariableToSolveFor()
    {
        $variable = $this->jsonForSympyParsing[$this->variableToSolveFor];
        $this->variableToSolveForUnit = 'select units';
        if($variable){
            $variable['Value'] = '';
            $this->jsonForSympyParsing[$this->variableToSolveFor] = $variable;
        }
    }

    public function setAnswer()
    {
        $this->jsonForSympyParsing = $this->jsonForSympyParsing->map(function ($variable) {
            return [
                'Value' => $variable['Value'] ?: '',
                'unit_conversion' => (float) $variable['unit_conversion'] ?: '',
            ];
        });
        $command = 'python3 sympyScript.py' . ' ' . escapeshellarg($this->jsonForSympyParsing) . ' ' . escapeshellarg($this->formula_sympy);
        $this->answer = Process::run($command)->output();

        $this->errorOut = Process::run($command)->errorOutput();
    }

    public function render()
    {
        return view('livewire.page-form');
    }
}