<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;

class Solver extends Component
{
    public $formula;
    public $sympyDataArray;

    protected $listeners = [
        'sendData' => 'pushData',
    ];

    public function pushData($data)
    {
        array_push($data);
    }

    public function render()
    {
        return view('livewire.page-component.solver');
    }
}
