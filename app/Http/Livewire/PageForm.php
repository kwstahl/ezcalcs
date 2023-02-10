<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalcPage;

class PageForm extends Component
{
    public $formula_sympi;
    public $variables;
    public $title;
    public $undotted;

    public function render()
    {
        return view('livewire.page-form');
    }
}
