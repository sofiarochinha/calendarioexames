<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Course;
use App\Models\EvaluationSlot;
use App\Models\Professor;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\Epoca;
use Carbon\Carbon;
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

    public function editEpoca(Request $request){
        $id = json_decode($request->id);
        $name = json_decode($request->name);
        $start_date = Carbon::createFromFormat('Y-m-d', trim(json_decode($request->startDate)))->format('Y-m-d');
        var_dump($start_date);

        $end_date = trim(json_decode($request->endDate));
        var_dump($end_date);

        Epoca::findOrFail($id)->update(
            ['name' => $name, 'start_date' => $start_date,  'end_date' => $end_date]);
    }

    public function deleteEpoca(Request $request){
        $idEpoca = json_decode($request->id);

        Epoca::findOrFail($idEpoca)->delete();
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
