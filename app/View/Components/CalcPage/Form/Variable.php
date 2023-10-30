<?php

namespace App\View\Components\CalcPage\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Classes\PageHelpers;
use App\Classes\VariableHelper;

class Variable extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public $variableArray,
        public $thingu,
    ) {

        $this->name = $name;
        $this->variableArray = $variableArray;
        $this->thingu = new VariableHelper($name, $variableArray);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.calc-page.form.variable');
    }
}
