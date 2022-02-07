<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationSlot extends Model
{
    use HasFactory;
    protected $table= "evaluation_slot";
    public $timestamps = false;

    protected $fillable = [
        "calendar_id",
        "subject",
        "associated_professor",
        "observing_professor",
        "classroom",
        "time_slot"
    ];

    public function associated_professor(){
        return $this->belongsTo(Professor::class, 'associated_professor');
    }

    public function calendar(){
        return $this->belongsTo(Calendar::class, 'calendar_id');
    }


    public function observing_professor(){
        return $this->belongsTo(Professor::class, 'observing_professor');
    }

    public function classroom(){
        return $this->belongsTo(Classroom::class, 'classroom');
    }

    public function timeslot(){
        return $this->belongsTo(TimeSlot::class, 'time_slot');
    }

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject');
    }
}
