<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\CalcController;
use App\Http\Controllers\SympiAPIController;
/** CalcController connects the CalcPageView to the CalcPage model */
Route::resources([
    'eqn' => CalcController::class,
]);

Route::get('/apitestview', function(){
    return view('apiTestView');
});

Route::get('/gitupdate', function() {
    return view('gitUpdate');
});

Route::get('/sync-repo', 'App\Http\Controllers\RepoSyncController@syncRepo');

Route::post('/webhook', 'App\Http\Controllers\WebhookController@handlePayload')->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);

Route::post('/testsymfonyprocess', function(){
    return view('testsymfonyprocess');
});