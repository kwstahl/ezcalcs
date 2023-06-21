<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UnitTable extends Component
{
    public Unit $unitClasses;
    public Unit $unitData;

    protected $rules = [
        'unitData.*.unit_class' => 'required|string|max:500',
        'unitData.*.id' => 'required|string|max:500',
        'unitData.*.base_unit' => 'required|string|max:500',
        'unitData.*.symbol' => 'required|string|max:500',
    ];



    public function mount()
    {
        $this->unitClasses = UnitClasses::select('unit_class')
                            ->groupBy('unit_class')
                            ->get();
    
        $this->unitData = Unit::select('unit_class', 'id', 'base_unit', 'symbol')
                            ->get();
    }

    public function save(){
        $this->validate();
        foreach ($this->unitData as $unitData){
            $unitData->save();
        }
    }

    public function render()
    {

        return view('livewire.unit-table');
    }
}
