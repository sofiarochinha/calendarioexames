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
    return view('welcome');
});

Route::get('/calendarios', function () {
    return view('welcome');
});

Route::get('/calendarios/ano-letivo', function () {
    return view('academic_year');
});

Route::get('/calendarios/curso', function () {
    return view('courses');
});

Route::get('/configuracoes/disciplinas', function () {
    return view('welcome');
});

Route::get('/configuracoes/salas', function () {
    return view('welcome');
});

Route::get('/configuracoes/docentes', function () {
    return view('welcome');
});

Route::get('/exportar', function () {
    return view('welcome');
});



