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
    public $inputString;
    public $answer;

    public function mount()
    {
        //$variables comes in as an array with many arguments, including the "unit" argument. This is used to query the model for matching to the Unit "unit_class" property.
        $this->variablesCollection = collect($this->variables);
        $this->units = Unit::all();
        $this->pyData = collect();
        $this->variableToSolveFor = "";
        $this->inputString = "";
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


    public function setInputString()
    {
        $formula_sympi = $this->formula_sympi;
        $pyJson = $this->pyData->toJson();
        $this->$inputString = 'python3 sympyScript.py '. $pyJson. ' ' .$formula_sympi;
        //$output = Process::timeout(120)->run($inputString);
        //$this->answer = $output->wait();
        //dd($inputString);
    }

    public function render()
    {
        return view('livewire.page-form');
    }
}