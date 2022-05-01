<?php

namespace App\Http\Controllers;

use App\Models\AssociatedClassroom;
use App\Models\Classroom;
use App\Models\ObservingProfessor;
use App\Models\Professor;
use App\Models\Subject;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Models\Calendar;
use App\Models\EvaluationSlot;
use App\Models\Course;
use Mockery\Exception;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    public function showView(){
        return view('calendario_atual',
            [ 'courses_names' => Course::distinct('course_code')->with("calendar")->get()->sortBy('name'),
                'courses' => Course::with("calendar")->get()->sortBy('course_year'),
                'epocas' => Calendar::all(),
                'professors' => Professor::all(),
                'classroom' => Classroom::all()
            ]);
    }

    /**
     * Marca um exame
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function adicionarEvento(Request $request){
            $data = json_decode($request->data);
            $name = json_decode($request->name);
            $subject = Subject::where('name', $name)->first()->id;

            $timeSlot = json_decode($request->timeSlot);
            $calendar = json_decode($request->calendar);



            $evaluationSlot = EvaluationSlot::where('subject', $subject)->where('calendar_id', $calendar)->first();

            if($evaluationSlot == null){
                $evaluationSlot = new EvaluationSlot();
                $evaluationSlot->calendar_id = $calendar;
                $evaluationSlot->subject = $subject;
                $evaluationSlot->time_slot = $timeSlot;
                $evaluationSlot->calendar_day = $data;
                $evaluationSlot->save();

                return \response()->json([
                    'idEvaluationSlot' => $evaluationSlot->id,
                ]);
            } else {
                $evaluationSlot = EvaluationSlot::whereId($evaluationSlot->id)->update([
                    'calendar_id' => $calendar,
                    'subject' => $subject,
                    'time_slot' => $timeSlot,
                    'calendar_day' => $data
                ]);

                return \response()->json([
                    'idEvaluationSlot' => $evaluationSlot->id,
                ]);
            }
    }

    /**
     * Envia todos os dados necessários para o modal na marcação de exames
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function modal(Request $request){
        $idExame = json_decode($request->idExame);

        $exame = EvaluationSlot::findOrFail($idExame)->first();
        $horario = $exame->timeslot->time_slot;

        $docente = $exame->Subject->associated_professor->name;
        $subject = $exame->Subject->name;

        $associatedProf = DB::table('observing_professor')
            ->where('id_evaluation_slot', $idExame)
            ->pluck('id_professor');

        $associatedSala = DB::table('associated_classroom')
            ->where('id_evaluation_slot', $idExame)
            ->pluck('id_classroom');

        $professors = Professor::all()->sortBy('name');
        $salas = Classroom::all();

        return response()->view('modal.modal', compact([
            'horario',
            'docente',
            'professors',
            'salas',
            'idExame',
            'subject',
            'associatedProf',
            'associatedSala'
        ]));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function associarAoExame(Request $request){
        $idExame = json_decode($request->idExame);

        $profsSelected = json_decode($request->profsSelected);
        $salasSelected = json_decode($request->salasSelected);

        foreach ($salasSelected as $selected)
        {
            try{
                DB::insert('insert into associated_classroom (id_evaluation_slot, id_classroom) values (?, ?)',
                    [$idExame, $selected]);

                /*
                 * Existe um bug na inserção de dados onde existe uma chave primária composta por mais de um elemento
                $sala = new AssociatedClassroom();
                $sala->id_evaluation_slot = 1;
                $sala->id_classroom = 1;
                $sala->save();*/

            }catch (Exception $exception){
                return \response()->json([
                    'success' => false,
                    'exception' => $exception
                ]);
            }
        }

        foreach ($profsSelected as $selected)
        {
            try{
                /*$prof = new ObservingProfessor();
                $prof->id_evaluation_slot = (int)$idExame;
                $prof->id_professor = (int)$selected;*/

                DB::insert('insert into observing_professor (id_evaluation_slot, id_professor) values (?, ?)',
                    [$idExame, $selected]);

            }catch (Exception $exception){
                return \response()->json([
                    'success' => false,
                    'exception' => $exception
                ]);
            }
        }

        return \response()->json([
            'success' => true
        ]);



    }



}
