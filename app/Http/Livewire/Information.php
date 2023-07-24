<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Information extends Component
{
    public $description;
    public $variables;


    public function render()
    {
        return view('livewire.information');

        $this->variables = collect($this->variables);
        
    }
}
