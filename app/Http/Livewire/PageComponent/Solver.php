<?php

namespace App\Http\Livewire\PageComponent;

use Livewire\Component;


class Solver extends Component
{
    public $formula;
    public $sympyDataArray;
    public $variablesJson;
    public $variableCollection;

    public function mount()
    {
        $this->sympyDataArray = [];
        $this->variableCollection = $this->makeSympyPreparationCollection();
    }

    protected $listeners = [
        'sendData' => 'pushData',
    ];

    public function makeSympyPreparationCollection()
    {
        $variablesJson = collect($this->variablesJson);
        $emptyCollection = $variablesJson->mapWithKeys(function($variableItem, $variableName){
            return [$variableName => ['value' => null, 'unit_conversion' => null]];
        });
        return $emptyCollection;
    }

    public function pushData($name, $type, $value)
    {
        $sympyDataArray = collect();
        $sympyDataArray = $sympyDataArray->merge([$name => [$type, $value]]);
        dump($sympyDataArray);
    }

    public function render()
    {
        return view('livewire.page-component.solver');
    }
}
