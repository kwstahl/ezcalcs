<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Models\Unit;


class UnitOptions extends SuperOptions implements Validation
{
    public $optionsArray;
    public $baseOption;
    public $unitName;

    /**
     * Create a new component instance.
     */
    public function mount()
    {
        $this->selectedOption = null;
        $this->optionsArray = $this->createUnitOptions($this->unitName);
    }

    protected $rules = [
        'selectedOption' => 'required'
    ];

    protected $listeners = [
        'validationEvent' => 'validation',
    ];

    //returns the option object from the optionsArray
    public function __get($optionId)
    {
        return $this->getOptionObjectFromOptionsArray($optionId);
    }

    public function changeSelectedOption($optionId)
    {
        $optionObject = $this->getOptionObjectFromOptionsArray($optionId);
        $this->selectedOption = $optionObject;
        $this->emit('sendData', $this->name, 'unit_conversion', $optionObject['conversion_to_base']);
    }

    public function validation()
    {
        $this->validate();
        //$this->sendData();
    }

    //returns an array of objects based on the model attribute and the value to filter from
    public function createUnitOptions($unitName){
        $unitModel = new Unit;
        $unitOptions = $this->getIndexedArrayFromModelTable($unitModel, 'id', 'unit_class', $unitName);
        return $unitOptions;

    }

    public function sendData()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('livewire.page-component.unit-options');
    }
}
