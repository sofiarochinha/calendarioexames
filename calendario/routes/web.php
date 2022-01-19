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

Route::get('/criar-calendario', ['as' => 'criarcalendario',  'uses' => '\App\Http\Controllers\CalendarAtualController@showViewCreate']);

Route::get('/calendario-atual', ['as' => 'curso', function () {
    return view('curso');
}]);


Route::get('/calendario-atual/{curso}', ['as' => 'calendarioatual', 'uses' => '\App\Http\Controllers\CalendarAtualController@showViewAtual']);


Route::get('/calendario-anterior', ['as' => 'calendarioanterior',  'uses' => '\App\Http\Controllers\CalendarHistoricController@showView']);

Route::get('/dados-auxiliares', ['as' => 'configurations',   'uses' => '\App\Http\Controllers\ConfigurationController@showView']);

//importar csv
Route::get('/importar', ['as' => 'import',  'uses' => '\App\Http\Controllers\ImportController@showView']);

//rota para importar para a base de dados
Route::post('/importar-csv',[ 'as' => 'importCsv', 'uses' => '\App\Http\Controllers\ImportController@import']); //import csv


Route::get('/exportar', ['as' => 'export', function ()  {
    return view('export');
}]);



