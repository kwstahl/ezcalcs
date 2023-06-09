<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalcController;
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
 * The route 'testprocess' used to send data from the calc_pages model to the API for the calculator sympi logic.
 *  
 * This is declared before Route::resoures() because it is defined outside of the normal CRUD functions
 * 
 * @return view('apiTestView')
 * 
 * This view contains the form action {{ testprocessAPI.store }}, which sends form input in JSON form to the API calculator
 * 
  */
Route::get('/eqn/testprocess', [CalcController::class, 'testprocess']);

/** 
 * 
 * Accesses the CalcController with CRUD functionality for created, showing, and updating pages from the CalcPage model 
 * 
 * Uses App\Http\Models\CalcPage
 * 
 * 
 * 
*/
Route::resources([
    'eqn' => CalcController::class,
]);

Route::get('/tables', TableMaker::class);
