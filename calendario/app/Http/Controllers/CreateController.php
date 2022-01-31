<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Calendar;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function showView(){
        $courses = Course::all();
        $evaluation_season = Calendar::all();
        return view('create_calendar', compact(["courses", "evaluation_season"]));
    }
}
