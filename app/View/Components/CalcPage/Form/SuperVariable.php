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
    public $attributesArray;

    /**
     * Create a new component instance.
     */

    protected function setPropertiesFrom_attributes_array(Array $attributesArray)
    {
        foreach($attributesArray as $attribute=>$value){
            $this->$attribute = $value;
        }
    }

    public function render(): View|Closure|string
    {
    }
}
