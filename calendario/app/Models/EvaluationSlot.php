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
        return $this->hasMany(Professor::class);
    }

    public function observing_professor(){
        return $this->hasMany(Professor::class);
    }

    public function classroom(){
        return $this->hasMany(Classroom::class);
    }

    public function timeslot(){
        return $this->hasMany(TimeSlot::class);
    }

    public function subject(){
        return $this->belongstoMany(Subject::class);
    }

    public function day(){
        return $this->hasMany(CalendarDay::class);
    }
}
