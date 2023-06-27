<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalcPage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Unit;

class PageForm extends Component
{
    public $variables;
    public $variablesCollection;
    public $units;
    public $unitOptions;

    
    public function mount()
    {
        //$variables comes in as an array with many arguments, including the "unit" argument. This is used to query the model for matching to the Unit "unit_class" property.
        $this->variablesCollection = collect($this->variables);
        $this->units = Unit::all();

        //will be created by page-form template, and adds the unitOptions[$variable] = ... some collection with the units from the Units table
        $this->unitOptions = collect();

        $this->variablesCollection->transform(function($item){
            $item['inputValue'] = '';
            $item['unitOptionValue'] = '';
            $item['unitOptionsCollection'] = collect();
            return $item;
        });

        $this->variablesCollection->each(function($item){

            $variableUnit = $item['unit'];
            $tableUnits = $this->units->where('unit_class', $variableUnit);

            $tableUnits->each(function($unit) use ($item){
                $selectedProperties = [
                    'symbol',
                    'unit_class',
                    'base_unit',
                    'conversion_to_base',
                ];
                $filtered = $unit->only($selectedProperties);
                $item['unitOptionsCollection']->push($filtered);
            });
        });

    }

    //called in the page-form template
    public function createUnitDropdownItems($variableName, $variableUnit)
    {
        $unitsOfVariable = $this->units->filter(function ($item) use ($variableUnit){
            return $item['unit_class'] == $variableUnit;
        });    

        $unitOptionsCollection = collect();
        $this->unitOptions[$variableName] = collect();


        foreach($unitsOfVariable as $unitOfVariable){
            $unitOptionsCollection->push([$unitOfVariable->symbol, $unitOfVariable->conversion_to_base]);
        }
        $this->unitOptions[$variableName]->push($unitOptionsCollection);
    }



    public function render()
    {
        return view('livewire.page-form');
    }
}