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
use Illuminate\Http\Client\Response;
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

        $end_date = trim(json_decode($request->endDate));

        Epoca::findOrFail($id)->update(
            ['name' => $name, 'start_date' => $start_date,  'end_date' => $end_date]);
    }

    public function deleteEpoca(Request $request){
        $idEpoca = json_decode($request->id);
        var_dump($idEpoca);

        Epoca::findOrFail($idEpoca)->delete();
    }

    /**
     * Create a new epoca
     *
     * @param Request request The request object.
     */
    public function createEpoca(Request $request){
        $nome = json_decode($request->nome);
        $startDate = trim(json_decode($request->startDate));
        $endDate = trim(json_decode($request->endDate));

        $epoca = new Epoca();
        $epoca->name = $nome;
        $epoca->start_date = $startDate;
        $epoca->end_date = $endDate;

        $epoca->save();
        $idEpoca = $epoca->id;

        return \response()->json([
            'idEpoca' => $idEpoca,
        ]);
    }

    public function editSala(Request $request){
        $id = json_decode($request->id);
        $capacidade = json_decode($request->capacidade);

        var_dump($capacidade);
        Classroom::findOrFail($id)->update(
            ['capacity' => $capacidade]);
    }


}
