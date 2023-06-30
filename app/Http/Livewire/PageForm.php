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
    public $pyData;
    public $formula_sympi;

    
    public function mount()
    {
        //$variables comes in as an array with many arguments, including the "unit" argument. This is used to query the model for matching to the Unit "unit_class" property.
        $this->variablesCollection = collect($this->variables);
        $this->units = Unit::all();
        $this->pyData = collect();

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
                $item['unitOptionsCollection']->put($filtered['symbol'], $filtered);
            });
        });

    }

    public function generatePyData()
    {
        $formula = $this->formula_sympi;
        $precreatedArray = $this->variablesCollection->map(function($item, $key){
            $selection = $item['unitOptionsCollection']['selection'];
            $item['Value'] = $item['inputValue'];
            $item['unit_conversion'] = $item[$selection];

        });
    }

    public function render()
    {
        return view('livewire.page-form');
    }
}