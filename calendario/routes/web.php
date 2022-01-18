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
    return view('login');
});

Route::get('/criar-calendario', ['as' => 'criarcalendario', function () {
    return view("create_calendar");
}]);


Route::get('/calendario-atual', ['as' => 'curso', function () {
    return view('curso');
}]);

Route::get('/calendario-atual/{curso}', ['as' => 'calendarioatual', function () {
    return view('calendario_atual');
}]);


Route::get('/calendario-anterior', ['as' => 'calendarioanterior', function ()  {
    return view('calendario_historico');
}]);

Route::get('/dados-auxiliares', ['as' => 'configurations',  function ()  {
    return view('configurations');
}]);

Route::get('/importar', ['as' => 'import',  'uses' => '\App\Http\Controllers\ImportController@showView']);
Route::post('/importar-csv',[ 'as' => 'importCsv', 'uses' => '\App\Http\Controllers\ImportController@import']); //import csv


Route::get('/exportar', ['as' => 'export', function ()  {
    return view('export');
}]);



