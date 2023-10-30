<?php

namespace App\View\Components\CalcPage\Forms;

use App\View\Components\CalcPage\Form\SuperVariable;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Variable extends SuperVariable
{
    public $name;
    public $unit;
    public $unit_class;
    public $sympy_symbol;
    public $latex_symbol;
    public $input_value;

    /**
     * Create a new component instance.
     */
    public function __construct(String $name, Array $attributes_array)
    {
        $this->name = $name;
        $this->attributes_array = $attributes_array;
        $this->input_value = null;

        //sets properties based on their key, value pairs
        $this->setPropertiesFrom_attributes_array($attributes_array);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.calc-page.forms.variable');
    }
}
