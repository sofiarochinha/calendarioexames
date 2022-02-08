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
        'id_epoca',
        'id_course',
    ];

    public function epoca(){
        return $this->belongsTo(Epoca::class, 'id_epoca');
    }

    public function evaluationslots(){
        return $this->hasMany(EvaluationSlot::class);
    }

    public function course(){
        return $this->belongsTo(Course::class, 'id_course');
    }

}
