<?php

namespace App\Http\Livewire\PageForm;

use Livewire\Component;
use App\Models\Unit;
use App\Classes\Variable;
use App\Classes\UnitHelpers;
use App\Classes\EqValidations;
use Illuminate\Support\Facades\Process;
use App\Classes\PageHelpers;
use App\Http\Livewire\PageComponent\UnitOptions;

class PageFormTest extends Component
{
    public $variableToSolveFor;

    public function mount()
    {
    }

    protected $listeners = [
        'radioSelected' => 'setVariableToSolveFor',
    ];

    public function setVariableToSolveFor($name){
        $this->variableToSolveFor = $name;
    }

    public function render()
    {
        return view('livewire.page-form.page-form-test');
    }

}
