<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LogoComponent extends Component
{

    public $showGif = false;

    public function mount()
    {
        $this->showGif=true;
    }

    public function render()
    {
        return view('livewire.logo-component');
    }
}
