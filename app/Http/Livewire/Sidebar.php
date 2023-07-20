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
        $this->formulas = CalcPage::all();
        //$this->topics = $this->formulas->groupBy('topic');
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}
