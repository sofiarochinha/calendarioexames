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
    public function showView()
    {
        $courses_names = Course::distinct('course_code')->with("calendar")->get()->sortBy('name');
        $courses = Course::with("calendar")->get()->sortBy('course_year');
        $epocas = Calendar::all();
        $professors = Professor::all();
        $classroom = Classroom::all();

        return view('calendario_atual', compact([
            'courses',
            'courses_names',
            'epocas',
            'professors',
            'classroom'
        ]));
    }


    /**
     * Coisas que eu perciso para a view
     * As disciplinas que estam ativas e não estam marcadas
     * Os exames marcados
     * Os professores e as salas associadas ao exame
     * O horário em que está marcado
     *
     * Verificações:
     *  
     * @param request 
     * @return json com todas as disciplinas e as suas incompatibilidades
     */

    public function getExames(Request $request)
    {

        $codeCourse = json_decode($request->codeCourse);
        $idEpoca = json_decode($request->idEpoca);
        $yearCourse = json_decode($request->yearCourse);

        $idCourse = Course::where('course_code', $codeCourse)->where('course_year', $yearCourse)->first()->id;

        //obtem todas as disciplinas marcadas
        $subjects = Subject::where('course_id', $idCourse)->with('evaluationSlot')->get();

        //verificar que disciplinas têm incompatibilidades
        //salas e docentes associadas
        $array = [];


        foreach ($subjects as $subject) {

            //** estado inicial de todas as variáveis */
            $idEvaluationSlot = null; //estado inicial é que não esteja marcado
            $issueSala = false; //não tem salas associada
            $issueDocente = false; //não tem docentes associados
            $issueSobreposicao = false; //não tem exames sobrepostos
            $associatedSala = null; //quais salas estam associadas
            $associatedDocente = null; //quais docentes estam associadas

            if ($subject->evaluationSlot != null) {

                $associatedSala = DB::table('associated_classroom')
                    ->join('classroom', 'associated_classroom.id_classroom', '=', 'classroom.id')
                    ->where('id_evaluation_slot', $subject->evaluationSlot->id)
                    ->get();

                $associatedDocente = DB::table('observing_professor')
                    ->join('professor', 'observing_professor.id_professor', '=', 'professor.id')
                    ->where('id_evaluation_slot', $subject->evaluationSlot->id)
                    ->get();

                $idEvaluationSlot = $subject->evaluationSlot->id;

                //avisos falta de salas ou docentes
                if ($associatedSala == '[]') {
                    $issueSala = true;
                }

                if ($associatedDocente == '[]') {
                    $issueDocente = true;
                }

                $issueSobreposicao = $this->issueSobresposicao($subjects, $subject);

                //não lembro disto
                //var_dump($this->issueAlunosRepetentes(11, $subject->evaluationSlot->time_slot, $subject->evaluationSlot->calendar_day));


            }

            $issues = array('issueSala' => $issueSala, 'issueDocente' => $issueDocente, 'issueSobreposicao' => $issueSobreposicao);

            $data = array(
                'subject' => $subject,
                'idEvaluationSlot' => $idEvaluationSlot,
                'sala' => $associatedSala,
                'docente' => $associatedDocente,
                'issues' => $issues
            );

            array_push($array, $data);
        }

        //retornar um json com essa informação
        return \response()->json([
            'exames' => $array
        ]);
    }

    /**
     * Sobreposição de exames
     * @param subjects todas as disciplinas do curso
     * @param atualSubject disciplina que vai se verificar se tem sobreposição
     * @return boolean true se tem sobreposição, false se não tiver sobreposição
     */
    public function issueSobresposicao($subjects, $atualSubject)
    {
        $flag = False;

        //verifica se existe alguma disciplina no mesmo dia e no mesmo bloco de avaliação
        foreach ($subjects as $subject) {

            /**
             * * $subject != $atualSubject verifica se a disciplina é a mesma
             * * $subject->evaluationSlot != null verifica se está marcado o exame
             * * verifica se o time_slot e o dia é o mesmo
             */
            if (
                $subject != $atualSubject &&
                $subject->evaluationSlot != null &&
                $subject->evaluationSlot->time_slot == $atualSubject->evaluationSlot->time_slot
                && $subject->evaluationSlot->calendar_day == $atualSubject->evaluationSlot->calendar_day
            ) {
                $flag = True;
            }
        }

        return $flag;
    }

    /**
     * Verifica se existe disciplinas que possam comprometer os alunos repetentes
     * @return bool
     */
    public function issueAlunosRepetentes($courseID, $time_slot, $day)
    {
        $courseCode = Course::find($courseID)->course_code;

        $courses = Course::where('course_code', $courseCode)->get();

        $idSubjects = [];
        foreach ($courses as $course) {
            $id = $course->subject->pluck('id'); //id de todas as disciplinas de todos os anos
            array_push($idSubjects, $id);
        }


        foreach ($idSubjects as $subject) {

            foreach ($subject as $id) {

                $sub = Subject::find($id);
                //echo $sub->course_id;

                if ($sub->course_id != $courseID  && $sub->evaluationSlot != null && $sub->evaluationSlot->time_slot == $time_slot && $sub->evaluationSlot->calendar_day == $day) {
                    return true;
                }

                /*
                if ($sub->course_id != $courseID && $sub->evaluationSlot != null && $sub->evaluationSlot->time_slot == $time_slot && $sub->evaluationSlot->calendar_day == $day) {
                    echo $sub->evaluationSlot->time_slot;
                }*/
            }
        }
        return false;
    }

    /**
     * Marca um exame
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function adicionarEvento(Request $request)
    {
        $data = json_decode($request->data);
        $name = json_decode($request->name);
        $subject = Subject::where('name', $name)->first()->id;

        $timeSlot = json_decode($request->timeSlot);
        $calendar = json_decode($request->calendar);

        $evaluationSlot = EvaluationSlot::where('subject', $subject)->where('calendar_id', $calendar)->first();

        if ($evaluationSlot == null) {
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
            EvaluationSlot::whereId($evaluationSlot->id)->update([
                'calendar_id' => $calendar,
                'subject' => $subject,
                'time_slot' => $timeSlot,
                'calendar_day' => $data
            ]);

            //var_dump($evaluationSlot);
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
    public function modal(Request $request)
    {
        $idExame = json_decode($request->idExame);

        $exame = EvaluationSlot::find($idExame);
        $horario = $exame->timeslot->time_slot;

        $docente = $exame->Subject->associated_professor->name;
        $subject = $exame->Subject->name;

        $associatedProf = DB::table('observing_professor')
            ->join('professor', 'observing_professor.id_professor', '=', 'professor.id')
            ->where('id_evaluation_slot', $idExame)
            ->get();

        $associatedSala = DB::table('associated_classroom')
            ->join('classroom', 'associated_classroom.id_classroom', '=', 'classroom.id')
            ->where('id_evaluation_slot', $idExame)
            ->get();

        $professors = Professor::all()->toArray();
        $salas = Classroom::all()->toArray();

        return \response()->json([
            'horario' => $horario,
            'docente' => $docente,
            'professors' => $professors,
            'salas' => $salas,
            'idExame' => $idExame,
            'subject' => $subject,
            'associatedProf' => $associatedProf,
            'associatedSala' => $associatedSala
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function associarAoExame(Request $request)
    {
        $idExame = json_decode($request->idExame);

        $profsSelected = json_decode($request->profsSelected);
        $salasSelected = json_decode($request->salasSelected);

        foreach ($salasSelected as $selected) {
            try {
                DB::insert(
                    'insert into associated_classroom (id_evaluation_slot, id_classroom) values (?, ?)',
                    [$idExame, $selected]
                );

                /*
                 * Existe um bug na inserção de dados onde existe uma chave primária composta por mais de um elemento
                $sala = new AssociatedClassroom();
                $sala->id_evaluation_slot = 1;
                $sala->id_classroom = 1;
                $sala->save();*/
            } catch (Exception $exception) {
                return \response()->json([
                    'success' => false,
                    'exception' => $exception
                ]);
            }
        }

        foreach ($profsSelected as $selected) {
            try {
                /*$prof = new ObservingProfessor();
                $prof->id_evaluation_slot = (int)$idExame;
                $prof->id_professor = (int)$selected;*/

                DB::insert(
                    'insert into observing_professor (id_evaluation_slot, id_professor) values (?, ?)',
                    [$idExame, $selected]
                );
            } catch (Exception $exception) {
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSalasDocentes(Request $request)
    {
        $idExame = json_decode($request->idExame);

        $countProf = count(DB::table('observing_professor')
            ->where('id_evaluation_slot', $idExame)
            ->pluck('id_professor'));


        $countSala = count(DB::table('associated_classroom')
            ->where('id_evaluation_slot', $idExame)
            ->pluck('id_classroom'));

        return \response()->json([
            'countSala' => $countSala,
            'countProf' => $countProf,
        ]);
    }

    public function getSalas(Request $request)
    {
        $idExame = json_decode($request->idExame);

        $countSala = count(DB::table('associated_classroom')
            ->where('id_evaluation_slot', $idExame)
            ->pluck('id_classroom'));

        return \response()->json([
            'countSala' => $countSala,
        ]);
    }

    public function getDocentes(Request $request)
    {
        $idExame = json_decode($request->idExame);

        $countProf = count(DB::table('observing_professor')
            ->where('id_evaluation_slot', $idExame)
            ->pluck('id_professor'));

        return \response()->json([
            'countProf' => $countProf,
        ]);
    }
}