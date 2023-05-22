<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class UnitController extends Controller
{
    public function create()
    {
        return view('UnitCreator');
    }


}