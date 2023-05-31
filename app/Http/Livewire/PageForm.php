<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalcPage;
use Illuminate\Support\Collection;

class PageForm extends Component
{
    #passed in as array of var_name:var_props, ...,
    public $variables;
    public $variables_as_collection;

    public function mount()
    {
        $this->variables_as_collection = collect($this->variables);
    }

    public function render()
    {
        return view('livewire.page-form');
    }
}
