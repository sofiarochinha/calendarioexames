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
        'epoca_id',
        'course_id',
    ];

    public function epoca(){
        return $this->belongsTo(Epoca::class, 'epoca_id');
    }

    public function evaluationslots(){
        return $this->hasMany(EvaluationSlot::class);
    }

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }

}
