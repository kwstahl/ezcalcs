<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Unit;

class PageForm extends Component
{
    public $variables;
    public $variablesCollection;
    public $units;
    public $pyData;
    public $formula_sympi;
    public $unitOptions;

    
    public function mount()
    {
        //$variables comes in as an array with many arguments, including the "unit" argument. This is used to query the model for matching to the Unit "unit_class" property.
        $this->variablesCollection = collect($this->variables);
        $this->units = Unit::all();
        $this->pyData = collect();

        $this->variablesCollection->transform(function($item){
            $item['unitOptionsCollection'] = collect();
            $item['inputValue'] = "";
            return $item;
        });

        
        $this->variablesCollection->map(function($item, $key){
            $unitString = $item['unit'];
            
            $filtered = $this->units->filter(function($item, $key) use ($unitString){
                return $item['unit_class'] === $unitString;
            });


            
            $this->pyData->put($key, ['Value' => $item['inputValue'], 'Unit' => $filtered->get('unit_class')]);
        });
                                        
    }
        
    public function getUnitConversionProperty($variable, $unitSelection)
    {
        
    }

    public function render()
    {
        return view('livewire.page-form');
    }
}
