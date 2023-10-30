<?php

namespace App\View\Components\CalcPage\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Classes\PageHelpers;

class Womp extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $attributes,
    ) {

        $this->name = $name;
        $this->attributes = collect($attributes);

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.calc-page.form.womp');
    }
}
