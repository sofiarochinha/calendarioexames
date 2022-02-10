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
Route::get('/', function (){
    return view("login");
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
//Route::get('calendario-atual', [\App\Http\Controllers\LoginController::class, 'dashboard'])->name('calendarioatual');
Route::get('login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('custom-login', [\App\Http\Controllers\LoginController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [\App\Http\Controllers\LoginController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [\App\Http\Controllers\LoginController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [\App\Http\Controllers\LoginController::class, 'signOut'])->name('signout');

//eliminar as disciplinas
Route::get('/eliminar-disiciplina/{id}', ['as' => 'suject.delete', 'uses' => 'App\Http\Controllers\ConfigurationsController@deleteSubject']);
Route::get('/editar-disiciplina/{id}', ['as' => 'suject.edit', 'uses' => 'App\Http\Controllers\ConfigurationsController@editSubject']);
Route::get('/adicionar-disiciplina/', ['as' => 'suject.adicionar', 'uses' => 'App\Http\Controllers\ConfigurationsController@adicionarSubject']);

//eliminar os docentes
Route::get('/eliminar-docente/{id}', ['as' => 'docente.delete', 'uses' => 'App\Http\Controllers\ConfigurationsController@deleteSubject']);
Route::get('/editar-docente/{id}', ['as' => 'docente.edit', 'uses' => 'App\Http\Controllers\ConfigurationsController@editSubject']);
Route::get('/adicionar-docente/', ['as' => 'docente.adicionar', 'uses' => 'App\Http\Controllers\ConfigurationsController@adicionarSubject']);


//eliminar as salas
Route::get('/eliminar-sala/{id}', ['as' => 'sala.delete', 'uses' => 'App\Http\Controllers\ConfigurationsController@deleteSubject']);
Route::get('/editar-sala/{id}', ['as' => 'sala.edit', 'uses' => 'App\Http\Controllers\ConfigurationsController@editSubject']);
Route::get('/adicionar-sala/', ['as' => 'sala.adicionar', 'uses' => 'App\Http\Controllers\ConfigurationsController@adicionarSubject']);


//eliminar as épocas
Route::get('/eliminar-epoca/{id}', ['as' => 'epoca.delete', 'uses' => 'App\Http\Controllers\ConfigurationsController@deleteSubject']);
Route::get('/editar-epoca/{id}', ['as' => 'epoca.edit', 'uses' => 'App\Http\Controllers\ConfigurationsController@editSubject']);
Route::get('/adicionar-epoca/', ['as' => 'epoca.adicionar', 'uses' => 'App\Http\Controllers\ConfigurationsController@adicionarSubject']);



Route::get('/criar-calendario', ['as' => 'criarcalendario', 'uses' => 'App\Http\Controllers\CreateController@showView']);

Route::get('/calendario-atual', ['as' => 'calendarioatual', 'uses' => 'App\Http\Controllers\CalendarController@showView']);
Route::post('/calendario-atual/adicionar-evento', ['as' => 'addevento', 'uses' => 'App\Http\Controllers\CalendarController@adicionarEvento']);


Route::get('/calendario-anterior', ['as' => 'calendarioanterior',  'uses' => 'App\Http\Controllers\HistoricController@showView']);

Route::get('/dados-auxiliares', ['as' => 'configurations',  'uses' => 'App\Http\Controllers\ConfigurationsController@showView']);

Route::get('/importar', ['as' => 'import', 'uses' => 'App\Http\Controllers\ImportController@showView']);
Route::post('/importar', ['as' => 'import', 'uses' => 'App\Http\Controllers\ImportController@importCSV']);

Route::get('/exportar', ['as' => 'export','uses' => 'App\Http\Controllers\ExportController@showView']);

Route::post('/criar-calendario/teste', ['as' => 'enviardados','uses' => 'App\Http\Controllers\CreateController@add']);


