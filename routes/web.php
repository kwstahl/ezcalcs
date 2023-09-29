<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalcController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Process;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

/** 
 * 
 * Accesses the CalcController with CRUD functionality for created, showing, and updating pages from the CalcPage model 
 * 
 * Uses App\Http\Models\CalcPage
 * 
 * 
 * 
*/

Route::get('/test', [CalcController::class, 'test']);
Route::resources([
    'eqn' => CalcController::class,
    'unit' => UnitController::class,
]);


