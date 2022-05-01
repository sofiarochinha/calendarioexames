<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObservingProfessor extends Model
{
    use HasFactory;
    protected $table = "observing_professor";
    protected $primaryKey = ['id_evaluation_slot', 'id_professor'];
    public $timestamps = false;


    public function evaluationSlot(){
        return $this->belongsTo(EvaluationSlot::class);
    }

    public function professor(){
        return $this->hasMany(Professor::class);
    }
}
