<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/modal', [\App\Http\Controllers\CalendarController::class, 'modal'])->name('api-modal');

Route::post('/getSalasDocente', [\App\Http\Controllers\CalendarController::class, 'getSalasDocentes'])->name('api-getSalasDocentes');

Route::post('/getSalas', [\App\Http\Controllers\CalendarController::class, 'getSalas'])->name('api-getSalas');
Route::post('/getDocente', [\App\Http\Controllers\CalendarController::class, 'getDocentes'])->name('api-getDocentes');

Route::post('/getExames', [\App\Http\Controllers\CalendarController::class, 'getExames'])->name('api-getExames');
