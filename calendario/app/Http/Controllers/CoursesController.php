<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{

    public function insert(){

        $test = new Courses;
        $test->id = 0;
        $test->name = 'sofia';
        $test->course_id = 2;
        $test->course_years = 2;
        $test->save();

        return view('create_calendar');
    }
}
