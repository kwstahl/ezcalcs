<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UnitTable extends Component
{
    public $unitClasses;
    public $units;
    public $selectedUnitClass;

    protected $rules = [
        'units.*.unit_class' => 'required|string|max:500',
        'units.*.id' => 'required|string|max:500',
        'units.*.base_unit' => 'required|string|max:500',
        'units.*.symbol' => 'required|string|max:500',
    ];



    public function mount()
    {
        $this->unitClasses = Unit::pluck('unit_class')->unique();
        $this->units = Unit::select('unit_class', 'id', 'base_unit', 'symbol')->get();
    }

    public function save()
    {
        $this->validate();

        foreach ($this->units as $unit){
            $unit->save();
        }
    }

    public function updatedSelectedUnitClass($value)
    {

    }

    public function render()
    {

        return view('livewire.unit-table');
    }
}
