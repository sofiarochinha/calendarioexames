<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoricController extends Controller
{
    public function showView(){
        return view('calendario_historico');
    }
}
