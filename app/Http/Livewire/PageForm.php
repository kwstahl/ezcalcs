<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalcPage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageForm extends Component
{
    public $variables;
    public $variablesCollection;

    public function mount()
    {
        $this->variablesCollection = collect($this->variables);
        dd($this->variablesCollection);
    }

    public function render()
    {
        return view('livewire.page-form');
    }
}