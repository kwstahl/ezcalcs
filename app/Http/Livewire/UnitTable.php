<?php

namespace App\Http\Livewire;

use App\Traits\CalcPageHelpers;
use Livewire\Component;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UnitTable extends Component 
{
    use CalcPageHelpers;
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
    public $new_type;
    public $baseUnits;

    protected $rules = [
        'units.*.unit_class' => 'nullable|string|max:500',
        'units.*.id' => 'nullable|string|max:500',
        'units.*.base_unit' => 'nullable|string|max:500',
        'units.*.symbol' => 'nullable|string|max:500',
        'units.*.description' => 'nullable|string',
        'units.*.conversion_to_base' => 'nullable|numeric',
        'units.*.type' => 'nullable|string|max:500',
        
        //for make new entry, probably need new component
        
        'new_unit_class' => 'nullable',
        'new_base_unit' => 'nullable',
        'new_id' => 'nullable',
        'new_symbol' => 'nullable',
        'new_description' => 'nullable',
        'new_conversion_to_base' => 'nullable',
        'new_type' => 'nullable',
            
    ];

    public function mount()
    {
        $this->unitClasses = Unit::pluck('unit_class')->unique();
        $this->baseUnits = Unit::pluck('base_unit')->unique();
        $this->units = Unit::all();

        //probably need new component

        $this->new_base_unit = '';
        $this->new_conversion_to_base = '';
        $this->new_description = '';
        $this->new_id = '';
        $this->new_symbol = '';
        $this->new_unit_class = '';
        $this->new_type = '';
    }

    public function sortUnits($field, $type)
    {
        $this->units = Unit::all()->sortBy([
            [$field, $type],
        ]);

        $this->render();
    }

    public function save()
    {
        $this->validate();
        foreach ($this->units as $index => $unit){
            $unitModel = Unit::find($unit['id']);
            $unitModel->unit_class = $unit['unit_class'];
            $unitModel->base_unit = $unit['base_unit'];
            $unitModel->symbol = $unit['symbol'];
            $unitModel->conversion_to_base = (float) $unit['conversion_to_base'];
            $unitModel->description = $unit['description'];
            $unitModel->type = $unit['type'];
            $unitModel->save();
        }
    }

    public function newUnit()
    {
        $this->validate();
        $ids = Str::of($this->new_id)->explode(';');
        $symbols = Str::of($this->new_symbol)->explode(';');
        $unit_conversions = Str::of($this->new_conversion_to_base)->explode(';');
        
        $base_unit = $this->new_base_unit;
        $unit_class = $this->new_unit_class;
        $description = $this->new_description;
        $type = $this->new_type;

        foreach ($ids as $index => $id){
            $unit = Unit::create([
                'id' => $id,
                'base_unit' => $base_unit,
                'unit_class' => $unit_class,
                'description' => $description,
                'symbol' => $symbols[$index] ?? "null",
                'conversion_to_base' => (float) $unit_conversions[$index] ?? "null",
                'type' => $type,
            ]);
        }
        return redirect()->to('/unit');
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

        return redirect()->to('/unit');
    }

    public function render()
    {
        return view('livewire.unit-table');
    }
}
