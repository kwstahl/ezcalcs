<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalcPage;

class PageForm extends Component
{
    public $variables;
    public function render()
    {
        return view('livewire.page-form');
    }
}
