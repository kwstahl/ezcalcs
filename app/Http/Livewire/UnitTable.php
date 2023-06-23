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
        'units.*.unit_class' => 'nullable|string|max:500',
        'units.*.id' => 'nullable|string|max:500',
        'units.*.base_unit' => 'nullable|string|max:500',
        'units.*.symbol' => 'nullable|string|max:500',
        'units.*.description' => 'nullable|string|max:500',
        'units.*.conversion_to_base' => 'nullable|string|max:500',

    ];


    public function mount()
    {
        $this->unitClasses = Unit::pluck('unit_class')->unique();
        $this->units = Unit::all();
    }

    public function save()
    {
        $this->validate();
        foreach ($this->units as $index => $unit){
            $unitModel = Unit::find($unit['id']);
            $unitModel->unit_class = $unit['unit_class'];
            $unitModel->base_unit = $unit['base_unit'];
            $unitModel->symbol = $unit['symbol'];
            $unitModel->conversion_to_base = $unit['conversion_to_base'];
            $unitModel->description = $unit['description'];
            $unitModel->save();
        }
    }

    public function deleteUnit($unitId)
    {
        $unit = Unit::find($unitId);
        
        if ($unit) {
            $unit->delete();

            // this portion uses the collection reject function to filter out some thing from the collection.
            // the reject has a closure that uses the $unitId (outer scope) passed as $item. 
            // the conditional statement checks if $item['id'] is equal to the collection's $unitId, and when found returns the item.
            // it is then filtered out.

            $this->units = $this->units->reject(function($item) use ($unitId){
                return $item['id'] == $unitId;
            });
        }
    }

    public function render()
    {
        return view('livewire.unit-table');
    }
}
