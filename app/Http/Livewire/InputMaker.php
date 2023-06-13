<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InputMaker extends Component
{
    public $inputCount = 1;

    public function incrementCount()
    {
        $this->inputCount++;
    }

    public function decrementCount()
    {
        if ($this->inputCount>1){
            $this->inputCount--;
        }
    }
    
    public function render()
    {
        return view('livewire.input-maker');
    }
}
