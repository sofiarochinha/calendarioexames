<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
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

    public function deleteEpoca(Request $request){

        $id = $request->id;

        $calendar = Epoca::where('id', $id)->with('calendars')->get();
        if($calendar == '[]'){
            Epoca::where('id', $id)->delete();
        } else {

            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //Epoca::where('id', $id)->foreign('')

            $epocas = Epoca::where('id', $id)->with('calendars')->get();
            foreach ($epocas as $epoca){
               if($epoca->calendar != null){
                   Calendar::where('id', $epoca->calendar->first()->id)->delete();
               }
            }

            Epoca::where('id', $id)->delete();
/*
            if($epocas->calendars != null){
                foreach ($epocas as $epoca){
                    Calendar::where('id', $epoca->calendars->first()->id)->delete();
                }
                $this->deleteEpoca();
            }else{
                Epoca::where('id', $id)->delete();
            }*/


        }

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
