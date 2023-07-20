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
        $this->topics = CalcPage::all();
        $this->formulas = $this->topics->groupBy('topic');
    }   

    public function render()
    {
        return view('livewire.sidebar');
    }
}
