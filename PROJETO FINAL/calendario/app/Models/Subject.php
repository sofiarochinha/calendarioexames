<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = "subject";
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'subject_code',
        'semester',
        'professor_id',
        'course_id',
        'numberOfStudent'
    ];

    public function associated_professor(){
        return $this->belongsTo(Professor::class, 'professor_id');
    }

    public function courses(){
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function evaluationSlot(){
        return $this->hasOne(EvaluationSlot::class, 'subject');
    }
}
