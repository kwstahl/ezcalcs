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
        $this->topics = CalcPage::all()->pluck('topic')->unique();
        $this->formulas = CalcPage::all()->groupBy('topic')->all();
    }   

    public function render()
    {
        return view('livewire.sidebar');
    }
}
