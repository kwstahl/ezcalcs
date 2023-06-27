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
    public $unitConversions;
    public $unitSymbols;

    public function mount()
    {
        $this->variablesCollection = collect($this->variables);
        $this->units = Unit::all();
        $this->unitConversions = collect();
        $this->unitSymbols = collect();
    }

    public function createUnitDropdownItems($variable, $variableUnit)
    {
        $unitsOfVariable = $this->units->filter(function ($item) use ($variableUnit){
            return $item['unit_class'] == $variableUnit;
        });    

        $unitsOfVariable->transform(function($item) use ($variable){
            $this->unitConversions[$variable]->push($item->conversion_to_base);
            $this->unitSymbols[$variable]->push($item->symbol);
        });

        dump($this->unitSymbols[$variable]);
    }

    public function render()
    {
        return view('livewire.page-form');
    }
}