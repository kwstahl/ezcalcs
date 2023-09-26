<?php

Namespace App\Traits;

use App\Models\CalcPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Unit;

trait CalcPageHelpers 
{
    public function sortAscending($field){
        $this->units = Unit::all()->sortBy([
            [$field, 'asc'],
        ]);

        $this->render();
    }

    public function sortDescending(){
        $this->units = Unit::all()->sortBy([
            [$field, 'desc'],
        ]);

        $this->render();
    }
}