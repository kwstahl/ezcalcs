<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalcPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CalcPageData extends Component
{
    public $calcPages;

    protected $rules = [
        'calcPages.*.*' => 'nullable'
    ];

    public function mount()
    {
        $this->calcPages = CalcPage::all();
    }

    public function render()
    {
        return view('livewire.calc-page-data');
    }
}
