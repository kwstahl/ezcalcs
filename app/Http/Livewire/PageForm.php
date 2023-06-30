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
    public $unitOptions;

    
    public function mount()
    {
        //$variables comes in as an array with many arguments, including the "unit" argument. This is used to query the model for matching to the Unit "unit_class" property.
        $this->variablesCollection = collect($this->variables);
        $this->units = Unit::all();
        $this->pyData = collect();


        /*
        $this->pyData = $this->variablesCollection->map(function($item){
            $item['Value'] = '';
            $item['unit_conversion'] = '';
            return $item;
        });
*/
        $this->variablesCollection->transform(function($item){
            $item['inputValue'] = '';
            $item['unitOptionsCollection'] = collect();
            return $item;
        });

        $this->unitOptions = $this->variablesCollection->map(function($item){
            $variableUnit = $item['unit'];
            $tableUnits = $this->units->where('unit_class', $variableUnit);
            return [$item => $tableUnits];
        });
    }

    public function getUnitConversionProperty($variable, $unitSelection)
    {
        
    }

    public function render()
    {
        return view('livewire.page-form');
    }
}