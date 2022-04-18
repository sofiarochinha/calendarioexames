<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;

/*Autenticação
/ ->pagina de login

*/
Route::get('/', function () {
    return view("Auth/login");
});

Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'showView'])->name('login');
Route::post('custom-login', [\App\Http\Controllers\Auth\LoginController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [\App\Http\Controllers\Auth\LoginController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [\App\Http\Controllers\Auth\LoginController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [\App\Http\Controllers\Auth\LoginController::class, 'signOut'])->name('signout');


Route::middleware([Authenticate::class])->group(function (){

    /*Importar ficheiro csv*/
    Route::get('/importar', [\App\Http\Controllers\ImportController::class, 'showView'])->name('import');
    Route::post('/importar', [\App\Http\Controllers\ImportController::class, 'importCSV'])->name('import');
    Route::post('/csv-importado', [\App\Http\Controllers\ImportController::class, 'checkIfImported'])->name('checkifimported');

    /*Marcação de exames
    - mostrar a view
    - adicionar um novo evento a base de dados
    */
    Route::get('/marcar-exames', [\App\Http\Controllers\CalendarController::class, 'showView'])->name('marcarexames');
    Route::post('/marcar-exames/adicionar-evento', [\App\Http\Controllers\CalendarController::class, 'adicionarEvento'])->name('addevento');

    /**
     * Eliminar épocas
     * Editar épocas
     * Adicionar épocas
     */
    Route::post('/adicionar-epoca', [\App\Http\Controllers\CreateController::class, 'createEpoca'])->name('criarEpoca');
    Route::post('/adicionar-epoca-dados-auxiliares', [\App\Http\Controllers\ConfigurationsController::class, 'createEpoca'])->name('criarEpocaConfigurations');

    Route::post('/editar-epoca/', [\App\Http\Controllers\ConfigurationsController::class, 'editEpoca'])->name('editepoca');
    Route::post('/eliminar-epoca/', [\App\Http\Controllers\ConfigurationsController::class, 'deleteEpoca'])->name('deleteEpoca');
    /**
     * Editar sala de aula
     */
    Route::post('/editar-sala/', [\App\Http\Controllers\ConfigurationsController::class, 'editSala'])->name('editSala');

    /**
     * Adiciona um novo docente
     */
    Route::post('/adicionar-docente/', [\App\Http\Controllers\ConfigurationsController::class, 'createDocente'])->name('criarDocente');

    Route::get('/calendario-anterior', ['as' => 'calendarioanterior', 'uses' => 'App\Http\Controllers\HistoricController@showView']);

    Route::get('/dados-auxiliares', ['as' => 'configurations', 'uses' => 'App\Http\Controllers\ConfigurationsController@showView']);

    Route::get('/exportar', ['as' => 'export', 'uses' => 'App\Http\Controllers\ExportController@showView']);

    /**
     * Criar novos calendários e adicionar à base de dados
     */
    Route::post('/criar-calendario/enviar-dados', ['as' => 'enviardados', 'uses' => 'App\Http\Controllers\CreateController@add']);

    //mostra a view criar calendário
    Route::get('/criar-calendario', ['as' => 'criarcalendario', 'uses' => 'App\Http\Controllers\CreateController@showView']);
});
