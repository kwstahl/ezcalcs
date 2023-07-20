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
        $this->topics = $this->formulas->pluck('topic')->unique();
        $this->formulas = CalcPage::whereIn('topic', $this->topics)->get()
    }   

    public function render()
    {
        return view('livewire.sidebar');
    }
}
