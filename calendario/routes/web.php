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
Route::get('/', ['as' => 'login', 'uses' => 'App\Http\Controllers\LoginController@showView']);

Route::get('/criar-calendario', ['as' => 'criarcalendario', 'uses' => 'App\Http\Controllers\CreateController@showView']);

Route::get('/calendario-atual', ['as' => 'curso', 'uses' => 'App\Http\Controllers\CourseController@showView']);

Route::get('/calendario-atual/{curso}', ['as' => 'calendarioatual', 'uses' => 'App\Http\Controllers\CalendarController@showView']);

Route::get('/calendario-anterior', ['as' => 'calendarioanterior',  'uses' => 'App\Http\Controllers\HistoricController@showView']);

Route::get('/dados-auxiliares', ['as' => 'configurations',  'uses' => 'App\Http\Controllers\ConfigurationsController@showView']);

Route::get('/importar', ['as' => 'import', 'uses' => 'App\Http\Controllers\ImportController@showView']);
Route::post('/importar', ['as' => 'import', 'uses' => 'App\Http\Controllers\ImportController@showView']);

Route::get('/exportar', ['as' => 'export','uses' => 'App\Http\Controllers\ExportController@showView']);


