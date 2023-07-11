<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Unit;
use Illuminate\Support\Facades\Process;

class PageForm extends Component
{
    public $variables;
    public $variablesCollection;
    public $units;
    public $pyData;
    public $formula_sympi;
    public $variableToSolveFor;
    public $answer;

    protected $rules = [
        'pyData.*.Value' => 'nullable',
        'pyData.*.unit_conversion' => 'nullable',
        'variableToSolveFor' => 'nullable',
    ];

    public function mount()
    {
        //$variables comes in as an array with many arguments, including the "unit" argument. This is used to query the model for matching to the Unit "unit_class" property.
        $this->variablesCollection = collect($this->variables);
        $this->units = Unit::all();
        $this->pyData = collect();
        $this->variableToSolveFor = "";
        $this->variablesCollection->transform(function($item){
            $item['inputValue'] = "";
            $item['unitOptions'] = collect();
            return $item;
        });
        
        $this->variablesCollection->each(function($item, $key){
            $this->pyData->put($key, ['Value'=>'', 'unit_conversion'=>'']);
        });

        //Good
        $this->variablesCollection->transform(function($item){
            $variableUnitClass = $item['unit'];

            

            /* Query the units model for matching "unit" from variable to "unit_class" in units model*/
            $filteredUnitsByClass = $this->units 
                ->where('unit_class', $variableUnitClass)
                ->map(function($unit){
                    return [
                        'symbol' => $unit->symbol,
                        'conversion_to_base' => $unit->conversion_to_base,
                    ];
                })
                ->values();
            $item['unitOptions'] = $filteredUnitsByClass;
            return $item;
        });

    }

    public function updatedVariableToSolveFor()
    {
        $variable = $this->pyData[$this->variableToSolveFor] ?? null;
        if($variable){
            $variable['Value'] = '';
            $this->pyData[$this->variableToSolveFor] = $variable;
        }
    }



    public function runSympyScript()
    {
        //$command = 'python3 ' . public_path('sympyScript.py') . ' ' . escapeshellarg($this->pyData) . ' ' . escapeshellarg($this->formula_sympi);
        //$output = shell_exec($command);
        $this->validate();
        $this->answer = [$this->formula_sympi, $this->pyData];

    }

    

    public function render()
    {
        return view('livewire.page-form');
    }
}