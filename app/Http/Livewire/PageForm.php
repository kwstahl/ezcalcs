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
        $this->variablesCollection = collect($this->variables);
        $this->units = Unit::all();
        $this->unitOptions = collect();
    }

    public function createUnitDropdownItems($variable, $variableUnit)
    {
        $unitsOfVariable = $this->units->filter(function ($item) use ($variableUnit){
            return $item['unit_class'] == $variableUnit;
        });    

        $this->unitOptions[$variable] = collect();

        foreach($unitsOfVariable as $unit){
            $this->unitOptions[$variable]->put([
                ['symbol', $unit->symbol],
                ['conversion_to_base', $unit->conversion_to_base]
            ]);
        }

        dump($this->unitOptions[$variable]);
    }

    public function render()
    {
        return view('livewire.page-form');
    }
}