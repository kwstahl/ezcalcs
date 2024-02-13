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
    public $variables_json;
    public $formula_sympy;
    public $variableToSolveFor;


    public function mount()
    {
        $this->variables_json = collect($this->variables_json);
        $this->variableToSolveFor = $this->variables_json->keys()->first();
    }

    protected $listeners = [
        'radioSelected' => 'setVariableToSolveFor',
    ];

    protected $messages = [

    ];

    public function setVariableToSolveFor($name){
        $this->variableToSolveFor = $name;
    }

    public function submit()
    {
        $this->emit('validationEvent');
        $this->emit('submit');
    }

    public function render()
    {
        return view('livewire.page-form.page-form-test');
    }

}
