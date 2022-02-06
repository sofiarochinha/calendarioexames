<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Calendar;
use App\Models\EvaluationSlot;
use App\Models\Course;

class CalendarController extends Controller
{
    public function showView(){
        return view('calendario_atual', [ 'courses_names' => Course::distinct('course_code')->with("calendar")->get()->sortBy('name'),'courses' => Course::with("calendar")->get()->sortBy('course_year'), 'epocas' => Calendar::all()->sortBy('calendar_name')]);
    }
}
