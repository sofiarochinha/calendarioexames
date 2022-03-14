<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $table = "classroom";
    public $timestamps = false;

    protected $fillable = ['classroom', 'capacity', 'type'];

    public function evaluationSlot(){
        return $this->hasOne(EvaluationSlot::class);
    }
}
