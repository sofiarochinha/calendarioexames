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

$import = false;
Route::get('/criar-calendario', ['as' => 'criarcalendario', function () use ($import) {
    return view("create_calendar", ["import" => $import]);
}]);


Route::get('/calendario-atual', ['as' => 'curso', function () use ($import) {
    return view('curso', ["import" => $import]);
}]);

Route::get('/calendario-atual/{curso}', ['as' => 'calendarioatual', function () use ($import) {
    return view('calendario_atual', ["import" => $import]);
}]);


Route::get('/calendario-anterior', ['as' => 'calendarioanterior', function () use ($import) {
    return view('calendario_historico', ["import" => $import]);
}]);

Route::get('/configuracoes/', ['as' => 'configurations',  function () use ($import) {
    return view('configurations', ["import" => $import]);
}]);

Route::get('/importar', ['as' => 'import', function () use ($import) {
    return view('import', ["import" => $import]);
}]);

Route::get('/exportar', ['as' => 'export', function () use ($import) {
    return view('export' , ["import" => $import]);
}]);



