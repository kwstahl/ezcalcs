<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;

class Solver extends Component
{
    public $formula;
    public $sympyDataArray;

    public function mount()
    {
        $this->sympyDataArray = [];
    }

    protected $listeners = [
        'sendData' => 'pushData',
    ];

    public function pushData($data)
    {
        $this->sympyDataArray = [];
        array_push($this->sympyDataArray, $data);
        dump($this->sympyDataArray);
    }

    public function render()
    {
        return view('livewire.page-component.solver');
    }
}
