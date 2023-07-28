<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Information extends Component
{
    public $description;
    public $variables;

    public function prepareForHtmlIdNaming($attributeValue)
    {
        return Str::remove(' ', $attributeValue);
    }

    public function render()
    {
        return view('livewire.information');

        $this->variables = collect($this->variables);
        
    }
}
