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
        dd("Save method triggered");
        $this->validate();

        foreach ($this->units as $index => $unit){
            $unitModel = Unit::find($unit['id']);
            $unitModel->unit_class = $unit['unit_class'];
            $unitModel->base_unit = $unit['base_unit'];
            $unitModel->symbol = $unit['symbol'];
            $unitModel->save();
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
