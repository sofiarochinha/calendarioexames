<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\EvaluationSlot;
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
        $courses = Course::all();
        return view('configurations', compact([
            "subjects",
            "professors",
            "classrooms",
            "epocas",
            "courses"]));
    }


    public function deleteSubject(Request $request){

        $id = $request->id;
        Subject::where('id', $id)->delete();

        return view('configurations');
    }

    public function deleteDocente(Request $request){

        $id = $request->id;
        Professor::where('id', $id)->delete();

        return view('configurations');
    }

    public function deleteSala(Request $request){

        $id = $request->id;
        Classroom::where('id', $id)->delete();

        return view('configurations');
    }

    public function deleteEpoca(Request $request){

        $id = $request->id;
        EvaluationSlot::where('id', $id)->delete();

        return view('configurations');
    }
/*
    public function editarSubject(Request $request){

        $id = $request->id;

        Subject::where('id', $id)->update([
        ]);

        return view('configurations');
    }

    public function adicionarSubject(Request $request){

        $id = $request->id;
        Subject::where('id', $id)->delete();

        return view('configurations');
    }*/

}
