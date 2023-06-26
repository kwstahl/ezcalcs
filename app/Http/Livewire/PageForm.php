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
    public Unit $units;

    public function mount()
    {
        $this->variablesCollection = collect($this->variables);

    }

    private function createUnitDropdownItems($variableUnit)
    {
        $unitOptions =  Unit::select(['id', 'symbol', 'conversion_to_base'])
                        ->where('unit_class' == $variableUnit)
                        ->get();
        dd($unitOptions);
        return $unitOptions;
    }

    public function render()
    {
        return view('livewire.page-form');
    }
}