<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;

class UnitOptions extends SuperOptions
{

    public $name;
    public $optionsArray;
    public $baseOption;

    /**
     * Create a new component instance.
     */
    public function mount() {
    }



    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('livewire.page-component.unit-options');
    }
}

