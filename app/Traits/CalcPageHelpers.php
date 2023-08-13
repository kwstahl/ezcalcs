<?php

Namespace App\Traits;

use App\Models\CalcPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait CalcPageHelpers 
{
    protected $rules =  [
        'calcPages.*.formula_description' => 'nullable',
        'calcPages.*.formula_name' => 'nullable',
        'calcPages.*.formula_sympi' => 'nullable',
        'calcPages.*.id' => 'nullable',
        'calcPages.*.topic' => 'nullable',
        'calcPages.*.formula_latex' => 'nullable',
        'variables.*.*.unit' => 'nullable',
        'variables.*.*.latex_symbol' => 'nullable',
        'variables.*.*.sympi_symbol' => 'nullable',
        'variables.*.*.description' => 'nullable',

    ];

    //Sets the id of each variable to its array
    public function setIdsToArraysOnVariables(){
        $calcPages = CalcPage::all();
        $variables = $calcPages->mapWithKeys(function($item, $key){
            return [$item['id'] => $item['variables_json']];
        });
        return $variables;
    }
}