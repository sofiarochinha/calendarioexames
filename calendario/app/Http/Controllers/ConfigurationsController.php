<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\Epoca;
use Illuminate\Http\Request;

class ConfigurationsController extends Controller
{
    public function showView(){
        $subjects = Subject::all();
        $professors = Professor::all();
        $classrooms = Classroom::all();
        $epocas = Epoca::all();
        return view('configurations', compact(["subjects","professors","classrooms","epocas"]));
    }
}
