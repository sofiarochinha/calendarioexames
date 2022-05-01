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
use Illuminate\Database\QueryException;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;

class ConfigurationsController extends Controller
{
    /**
     * It returns the view configurations.blade.php, passing the variables $subjects, $professors, $classrooms, $epocas and
     * $courses to it
     *
     * @return A view with the name configurations.blade.php
     */
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

    /**
     * It takes a request, decodes the id, name, startDate and endDate, then updates the Epoca table with the new values
     *
     * @param Request request the request object
     */
    public function editEpoca(Request $request){
        $id = json_decode($request->id);
        $name = json_decode($request->name);

        $start_date = Carbon::createFromFormat('Y-m-d', trim(json_decode($request->startDate)))->format('Y-m-d');

        $end_date = trim(json_decode($request->endDate));

        Epoca::findOrFail($id)->update(
            ['name' => $name, 'start_date' => $start_date,  'end_date' => $end_date]);
    }

    /**
     * It receives a request from the front-end, decodes the id of the object to be deleted, and then deletes it
     *
     * @param Request request The request object.
     */
    public function deleteEpoca(Request $request){
        $idEpoca = json_decode($request->id);

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

    /**
     * It receives a request from the front-end, decodes the JSON data, and updates the database
     *
     * @param Request request The request object.
     */
    public function editSala(Request $request){
        $id = json_decode($request->id);
        $capacidade = json_decode($request->capacidade);

        Classroom::findOrFail($id)->update(
            ['capacity' => $capacidade]);
    }


    /**
     * It creates a new professor in the database
     *
     * @param Request request The request object.
     *
     * @return The id of the teacher created.
     */
    public function createDocente(Request $request){
        $nome = json_decode($request->nome);
        $email = trim(json_decode($request->email));
        $nmec = trim(json_decode($request->nmec));

        try{
            $professor = new Professor();
            $professor->name = $nome;
            $professor->email = $email;
            $professor->mec = $nmec;
            $professor->created_at = Carbon::now();
            $professor->updated_at = Carbon::now();

            $professor->save();
            $idDocente = $professor->id;

            return \response()->json([
                'idDocente' => $idDocente,
            ]);
        }catch (QueryException $exception){
            return \response()->json([
                'exception' => $exception
            ]);
        }

    }

    /**
     * It receives a request from the front-end, decodes the JSON data, and updates the database
     *
     * @param Request request the request object
     */
    public function editUC(Request $request){
        $idUC = json_decode($request->idUC);
        $idDocente = json_decode($request->idDocente);
        $alunosInscritos = (integer)json_decode($request->alunosInscritos);

        //var_dump($request);
        //dd($alunosInscritos);

        Subject::findOrFail($idUC)->update(
            ['professor_id' => $idDocente,
             'numberOfStudent' => $alunosInscritos]);
    }

    /**
     * It updates docente with the new values
     *
     * @param Request request the request object
     */
    public function editDocente(Request $request){
        $idDocente = json_decode($request->idDocente);
        $fieldNmec = json_decode($request->fieldNmec);
        $fieldName = json_decode($request->fieldName);
        $fieldEmail = json_decode($request->fieldEmail);

        Professor::findOrFail($idDocente)->update(
            ['name' => $fieldName,
             'email' => $fieldEmail,
             'mec' => $fieldNmec,
             'updated_at' => Carbon::now(),
            ]);
    }



}
