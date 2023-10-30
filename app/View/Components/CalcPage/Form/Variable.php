<?php

namespace App\View\Components\CalcPage\Forms;

use App\View\Components\CalcPage\Form\SuperVariable;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Variable extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $thing
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.calc-page.forms.variable');
    }
}
