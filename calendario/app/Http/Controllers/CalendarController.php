<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Professor;
use App\Models\Subject;
use Illuminate\Http\Request;

use App\Models\Calendar;
use App\Models\EvaluationSlot;
use App\Models\Course;

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


    public function adicionarEvento(Request $request){
            $data = json_decode($request->data);
            $name = json_decode($request->name);
            $subject = Subject::where('name', $name)->first()->id;

            $timeSlot = json_decode($request->timeSlot);
            $calendar = json_decode($request->calendar);
            echo $timeSlot;

            $evaluationSlot = EvaluationSlot::where('subject', $subject)->where('calendar_id', $calendar)->first();

            if($evaluationSlot == null){
                $evaluationSlot = new EvaluationSlot();
                $evaluationSlot->calendar_id = $calendar;
                $evaluationSlot->subject = $subject;
                $evaluationSlot->associated_professor = 6;
                $evaluationSlot->observing_professor = 15;
                $evaluationSlot->classroom = 3;
                $evaluationSlot->time_slot = $timeSlot;
                $evaluationSlot->calendar_day = $data;
                $evaluationSlot->save();
            } else {
                EvaluationSlot::whereId($evaluationSlot->id)->update([
                    'calendar_id' => $calendar,
                    'subject' => $subject,
                    'associated_professor' => 6,
                    'observing_professor' => 15,
                    'classroom' => 3,
                    'time_slot' => $timeSlot,
                    'calendar_day' => $data
                ]);


            }


    }
}
