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
    return view('ano_letivo');
});

Route::get('/calendarios/ano-letivo', function () {
    return view('ano_letivo');
});

Route::get('/calendarios/{anoletivo}', function () {
    return view('curso');
});

Route::get('/calendarios/{anoletivo}/{curso}', function () {
    return view('calendar');
});

Route::get('/calendarios/{curso}', function () {
    return view('c');
});

Route::get('/calendarios/curso', function () {
    return view('curso');
});

Route::get('/calendarios/curso/{curso}', function () {
    return view('welcome');
});

Route::get('/configuracoes/disciplinas', function () {
    return view('configurar');
});

Route::get('/configuracoes/salas', function () {
    return view('configurar');
});

Route::get('/configuracoes/docentes', function () {
    return view('configurar');
});

Route::get('/exportar', function () {
    return view('welcome');
});



