<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Unit;
class PageForm extends Component
{
    public $variables;
    public $variablesCollection;
    public $units;
    public $pyData;
    public $formula_sympi;
    public $variableToSolveFor;

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
        $this->pyData->put('formula', $this->formula_sympi);
        $this->variablesCollection->transform(function($item, $key){
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

    public function render()
    {
        return view('livewire.page-form');
    }
}