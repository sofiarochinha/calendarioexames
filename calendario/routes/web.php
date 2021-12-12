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

Route::get('/calendarios', function () {
    return view('curso');
});

Route::get('/calendarios/atual', function () {
    return view('curso');
});

Route::get('/calendarios/atual/{curso}', function () {
    return view('calendario_atual');
});


Route::get('/calendarios/antigos', function () {
    return view('calendario_historico');
});

Route::get('/configuracoes/disciplinas', function () {
    return view('conf_disciplinas');
});

Route::get('/configuracoes/salas', function () {
    return view('conf_salas');
});

Route::get('/configuracoes/docentes', function () {
    return view('conf_docentes');
});

Route::get('/importar', function () {
    return view('import');
});

Route::get('/exportar', function () {
    return view('export');
});



