<?php

Namespace App\Traits;

use App\Models\CalcPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;

trait CalcPageHelpers 
{
    public function sortAscending(&$model, $field)
    {
        $model = "\\App\\Models\\".$model;     
        $model = $model::all();   
        $model = $model->sortBy([
            [$field, 'asc'],
        ]);
        return($model);
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