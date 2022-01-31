<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Calendar;
use App\Models\EvaluationSlot;
use App\Models\Course;

class CalendarController extends Controller
{
    public function showView(){
        return view('calendario_atual', [ 'courses' => Course::all(), 'epocas' => Calendar::all()]);
    }
}
