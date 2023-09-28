<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Information extends Component
{
    public $description;
    public $variables_json;

    public function prepareForHtmlIdNaming($attributeValue)
    {
        return Str::remove(' ', $attributeValue);
    }

    public function render()
    {
        return view('livewire.information');        
    }
}
