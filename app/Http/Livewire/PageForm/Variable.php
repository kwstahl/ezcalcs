<?php

namespace App\Http\Livewire\PageForm;

use Livewire\Component;

class Variable extends Component
{
    public $variables_json;
    public $variableToSolveFor;
    public function render()
    {
        return view('livewire.page-form.variable');
    }
}
