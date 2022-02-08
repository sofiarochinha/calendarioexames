<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    protected $table = "calendar";
    public $timestamps = false;

    protected $fillable = [
        'calendar_name',
        'academic_year',
        'evaluation_season',
        'professor_mec',
        'course_id',
        'start_date',
        'end_date'
    ];

    public function epoca(){
        return $this->belongsTo(Epoca::class, 'academic_year');
    }

    public function evaluationslot(){
        return $this->hasMany(EvaluationSlot::class);
    }

    public function course(){
        return $this->belongsTo(Course::class, 'id_course');
    }

}
