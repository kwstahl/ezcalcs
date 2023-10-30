<?php

namespace App\View\Components\CalcPage\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Classes\PageHelpers;

class SuperVariable extends Component
{
    public $type;
    public $description;
    public $attributes_array;

    /**
     * Create a new component instance.
     */

    protected function setPropertiesFrom_attributes_array(Array $attributes_array)
    {
        foreach($attributes_array as $attribute=>$value){
            $this->$attribute = $value;
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.calc-page.forms.variable');
    }
}
