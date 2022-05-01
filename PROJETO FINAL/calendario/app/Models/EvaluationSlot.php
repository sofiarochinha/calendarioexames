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
        "id",
        "calendar_id",
        "subject",
        "time_slot",
        "calendar_day"
    ];


    public function calendar(){
        return $this->belongsTo(Calendar::class, 'calendar_id');
    }

    public function timeslot(){
        return $this->belongsTo(TimeSlot::class, 'time_slot');
    }

    public function Subject(){
        return $this->belongsTo(Subject::class, 'subject');
    }

    public function associatedProf(){
        return $this->hasMany(ObservingProfessor::class, 'id_evaluation_slot');
    }
}
