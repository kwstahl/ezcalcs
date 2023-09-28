<?php

Namespace App\Traits;

use App\Models\CalcPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;

trait CalcPageHelpers 
{
    public function CalcPageHelpers_sort($model, $field, $type)
    {
        $sortedModel = $model->sortBy([$field, $type]);     
        dump($sortedModel);

        return($sortedModel);
    }
}