<?php

namespace App\View\Components\CalcPage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class test extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.calc-page.test');
    }
}
