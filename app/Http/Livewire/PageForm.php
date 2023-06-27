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
    public $unitNames;

    public function mount()
    {
        $this->variablesCollection = collect($this->variables);
        $this->units = Unit::all();
        $this->unitNames = collect();
    }

    public function createUnitDropdownItems($variable, $variableUnit)
    {
        $filtered = $this->units->filter(function ($item) use ($variableUnit){
            return $item['unit_class'] == $variableUnit;
        });    
    }

    public function render()
    {
        return view('livewire.page-form');
    }
}