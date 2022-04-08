<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Calendar;
use App\Models\Epoca;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CreateController extends Controller
{
    /**
     * This function is used to show the view that will be used to create the calendar
     *
     * @return The view is being returned.
     */
    public function showView(){
        $allCourses = Course::all()->sortBy('course_year'); //ordena por ano de curso
        $courses = Course::distinct('course_code')->get();
        $evaluation_season = Epoca::all();

        return view('create_calendar', compact(["courses", "evaluation_season","allCourses"]));
    }

    /**
     * It takes the id of the course and the id of the epoca and creates a calendar for each one of them
     *
     * @param Request request The request object.
     */
    public function add(Request $request){
        $decodeanos = $request->ano;
        $anos = json_decode($decodeanos);
        $decodeepoca = $request->epoca;
        $epocas = json_decode($decodeepoca);

        for ($i = 0; $i < count($anos); $i ++)
        {
            $curso = Course::findOrFail($anos[$i]);


            for ($r = 0; $r < count($epocas); $r ++)
            {
                $epoca = Epoca::findOrFail($epocas[$r]);
                $calendario = Calendar::where('course_id', $curso->id)
                    ->where('epoca_id', $epoca->id)->get();

                if($calendario=='[]'){
                    $novocalendario = new Calendar();
                    $novocalendario->epoca_id= $epoca->id;
                    $novocalendario->course_id= $curso->id;
                    $novocalendario->save();

                }
            }
        }
    }


    /**
     * Create a new epoca
     *
     * @param Request request The request object.
     */
    public function createEpoca(Request $request){
        $nome = json_decode($request->nome);
        $dataInicio = json_decode($request->dataInicio);
        $dataFim = json_decode($request->dataFim);

        $epoca = new Epoca();
        $epoca->name = $nome;
        $epoca->start_date = Carbon::createFromFormat('m/d/Y', trim($dataInicio))->format('Y-m-d');
        $epoca->end_date = Carbon::createFromFormat('m/d/Y', trim($dataFim))->format('Y-m-d');

        $epoca->save();




    }


}
