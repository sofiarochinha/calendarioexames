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
        "day",
        "subject",
        "associated_professor",
        "observing_professor",
        "classroom",
        "time_slot"
    ];

    public function associated_professor(){
        return $this->belongsToMany(Professor::class, 'associated_professor');
    }

    public function observing_professor(){
        return $this->belongsTo(Professor::class, 'observing_professor');
    }

    public function classroom(){
        return $this->belongsToMany(Classroom::class, 'classroom');
    }

    public function timeslot(){
        return $this->belongsTo(TimeSlot::class, 'time_slot');
    }

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject');
    }
}
