<?php

namespace App\View\Components\CalcPage\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UnitOptions extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public $arrayOfOptions,
        public $baseOption,
        
        )
    {


    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.calc-page.form.unit-options');
    }
}
