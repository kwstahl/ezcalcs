<?php

Namespace App\Traits;

use App\Models\CalcPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;

trait CalcPageHelpers 
{
    public function sortAscending(&$thing, $model, $field)
    {
        $model = '\\App\\Models\\'.$model;
        $model = $model::all()->sortBy([$field, 'asc']);     
        return($thing);
        $this->render();
    }

    public function sortDescending($field)
    {
        $this->units = Unit::all()->sortBy([
            [$field, 'desc'],
        ]);

        $this->render();
    }

    public function filter($field, $value)
    {
        $this->units = Unit::all()->filter;
    }
}