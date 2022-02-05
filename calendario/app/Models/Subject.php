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
        'professor_mec',
        'course_code',
        'course_year',
    ];

    public function associated_professor(){
        return $this->belongsTo(Professor::class, 'professor_mec');
    }

    public function courses(){
        return $this->belongsTo(Course::class, 'course_code');
    }

    public function evaluationSlot(){
        return $this->hasOne(EvaluationSlot::class);
    }
}
