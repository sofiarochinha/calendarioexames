<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Mostra todas as configuracoes nas tabela que estam na view de dados-auxiliares
 */

class ConfigurationController extends Controller
{
    /**
     * Mostra a view
     */
    public function showView(){
        return view("configurations");
    }
}
