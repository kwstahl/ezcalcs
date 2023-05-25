<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalcPage;

class PageForm extends Component
{
    #passed in as array of var_name:var_props, ...,
    public $variables;

    public function render()
    {
        return view('livewire.page-form');
    }
}
