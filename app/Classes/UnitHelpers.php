<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class UnitHelpers extends EquationComponents
{
    public $unit_class;
    public $symbol;
    public $base_unit;
    public $conversion_to_base;
    public $id;

    public function __construct(String $id, Array $attributes_array)
    {
        $this->id = $id;
        $this->attributes_array = $attributes_array;
    }



}
