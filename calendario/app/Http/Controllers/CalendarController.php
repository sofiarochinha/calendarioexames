<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Calendar;
use App\Models\EvaluationSlot;

class CalendarController extends Controller
{
    public function showView(){
        return view('calendario_atual', [ 'epocas' => calendar::all() ]);
    }
}
