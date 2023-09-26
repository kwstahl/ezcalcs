<?php

Namespace App\Traits;

use App\Models\CalcPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait CalcPageHelpers 
{
    public function sortAscending(){
        $this->units = Unit::all()->sortBy([
            ['id', 'desc'],
        ]);

        $this->render();
    }
}