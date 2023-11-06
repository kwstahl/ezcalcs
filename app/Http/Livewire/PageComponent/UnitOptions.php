<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;

class UnitOptions extends SuperOptions
{

    public $name;
    public $optionsArray;
    public $baseOption;

    protected $listeners = [
        'ugh'
    ];

    /**
     * Create a new component instance.
     */
    public function mount() {
    }

    //returns the option object from the optionsArray
    public function __get($optionId)
    {
        return $this->getOptionObjectFromOptionsArray($optionId);
    }

    public function changeSelectedOption($optionId)
    {
        $this->selectedOption = $optionId;
        dump($this->selectedOption);
    }

    public function ugh($optionId){
        dd($optionId);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('livewire.page-component.unit-options');
    }
}

