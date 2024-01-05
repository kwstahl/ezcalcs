<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;

class Solver extends Component
{
    public $formula;
    public $sympyDataArray;

    protected $listeners = [
        'sendData' => 'displayData',
    ];

    public function displayData($data)
    {
        dd($data);
    }

    public function render()
    {
        return view('livewire.page-component.solver');
    }
}
