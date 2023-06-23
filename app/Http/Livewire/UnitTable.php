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

    //probably need a new component, but this would be for the form part with mass update

    public $new_unit_class;
    public $new_id;
    public $new_base_unit;
    public $new_symbol;
    public $new_description;
    public $new_conversion_to_base;

    protected $rules = [
        'units.*.unit_class' => 'nullable|string|max:500',
        'units.*.id' => 'nullable|string|max:500',
        'units.*.base_unit' => 'nullable|string|max:500',
        'units.*.symbol' => 'nullable|string|max:500',
        'units.*.description' => 'nullable|string|max:500',
        'units.*.conversion_to_base' => 'nullable|string|max:500',
        
        //for make new entry, probably need new component

        'new_unit_class' => 'required',
        'new_base_unit' => 'required',
        'new_id' => 'required',
        'new_symbol' => 'required',
        'new_description' => 'required',
        'new_conversion_to_base' => 'required',

    ];



    public function mount()
    {
        $this->unitClasses = Unit::pluck('unit_class')->unique();
        $this->units = Unit::all();

        //probably need new component

        $this->new_base_unit = '';
        $this->new_conversion_to_base = '';
        $this->new_description = '';
        $this->new_id = '';
        $this->new_symbol = '';
        $this->new_unit_class = '';
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

    public function newUnit()
    {
        $this->validate();
        $ids = $this->new_id->explode('; ');
        $symbols = $this->new_symbol->explode('; ');
        $unit_conversions = $this->new_conversion_to_base->explode('; ');
        
        $base_unit = $this->new_base_unit;
        $unit_class = $this->new_unit_class;
        $description = $this->new_description;

        dd($ids . $symbols . $unit_conversions . $base_unit);
        foreach ($ids as $index => $id){
            $unit = Unit::updateOrCreate(



                ['id' => $id],

                [
                'base_unit' => $base_unit,
                'unit_class' => $unit_class,
                'description' => $description,
                'symbol' => $symbols[$index],
                'unit_conversions' => $unit_conversions[$index] ?? "null",
            ]);
            $unit->save();
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
