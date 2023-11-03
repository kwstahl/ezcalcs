<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;

class UnitOptions extends SuperOptions
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public $optionsArray,
        public $baseOption,
    ) {
        $this->name = $name;
        $this->optionsArray = $optionsArray;
        $this->baseOption = $baseOption;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.calc-page.form.unit-options');
    }
}

