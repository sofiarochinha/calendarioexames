<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Calendar;
use App\Models\Epoca;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function showView(){
        $coursesall = Course::all()->sortBy('course_year');
        $courses = Course::distinct('course_code')->get();
        $evaluation_season = Epoca::all();
        return view('create_calendar', compact(["courses", "evaluation_season","coursesall"]));
    }

    public function add(Request $request){
        $decodeanos = $request->ano;
        $anos = json_decode($decodeanos);
        $decodeepoca = $request->epoca;
        $epocas = json_decode($decodeepoca);

        for ($i = 0; $i < count($anos); $i ++)
        {
            $curso = Course::findOrFail($anos[$i]);

            print_r($curso->name);

            for ($r = 0; $r < count($epocas); $r ++)
            {
                $epoca = Epoca::findOrFail($epocas[$r])->first();
                $calendario = Calendar::where('id_course', $curso->id)->where('id_epoca', $epoca->id)->get();
                if($calendario==null){
                    $novocalendario = new Calendar();
                    $novocalendario->id_epoca= $epoca->id;
                    $novocalendario->id_course= $curso->id;
                    $novocalendario->save();
                    print_r($novocalendario);
                }
            }
        }
        //return $teste;

    }
}
