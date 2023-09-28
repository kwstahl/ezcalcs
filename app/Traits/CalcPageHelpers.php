<?php

Namespace App\Traits;

use App\Models\CalcPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;

trait CalcPageHelpers 
{
    public function sortAscending($model, $field)
    {
        $model = $model::all()->sortBy([$field, 'asc']);     
        dump($model);        
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