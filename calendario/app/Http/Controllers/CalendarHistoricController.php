<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Controller com todas as funcionalidades do calendario histórico
 */
class CalendarHistoricController extends Controller
{
    public function showView(){
        return view("calendario_historic");
    }
}
