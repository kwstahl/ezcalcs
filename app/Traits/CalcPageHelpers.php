<?php

Namespace App\Traits;

use App\Models\CalcPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait CalcPageHelpers 
{
    protected $rules =  [

        //For calcpage update
        'calcPages.*.formula_description' => 'nullable',
        'calcPages.*.formula_name' => 'nullable',
        'calcPages.*.formula_sympy' => 'nullable',
        'calcPages.*.id' => 'nullable',
        'calcPages.*.topic' => 'nullable',
        'calcPages.*.formula_latex' => 'nullable',

        'variablesWithPageId.*.*.unit' => 'nullable',
        'variablesWithPageId.*.*.latex_symbol' => 'nullable',
        'variablesWithPageId.*.*.sympy_symbol' => 'nullable',
        'variablesWithPageId.*.*.description' => 'nullable',
        'variablesWithPageId.*.*.type' => 'nullable',

        //For calcpage create
        'newPage.id' => 'nullable',
        'newPage.formula_name' => 'nullable',
        'newPage.formula_description' => 'nullable',
        'newPage.formula_sympy' => 'nullable',
        'newPage.formula_latex' => 'nullable',
        'newPage.topic' => 'nullable',
        

        'variableCollections.*.unit' => 'nullable',
        'variableCollections.*.latex_symbol' => 'nullable',
        'variableCollections.*.sympy_symbol' => 'nullable',
        'variableCollections.*.description' => 'nullable',
        'variableCollections.*.type' => 'nullable',
        'variableCollections.*.variable_name' => 'nullable',

    ];
}