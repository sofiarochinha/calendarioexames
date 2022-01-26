<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function showView(){
        return view('calendario_atual');
    }
}
