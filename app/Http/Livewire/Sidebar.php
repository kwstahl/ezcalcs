<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalcPage;


class Sidebar extends Component
{
    public $formulas;
    public $topics;
    public $topicsArray;

    public function mount()
    {
        $this->formulas = CalcPage::all()->pluck('topic', 'id', 'formula_name');
        $this->topics = $this->formulas->groupBy('topic')->all();
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}
