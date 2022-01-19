<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationSlot extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "evaluation_slot";

    protected $fillable = [
        'day', 'subject', 'associated_professor',
        'observing_professor', 'classroom',
        'time_slot','historic_calendar_id'];


}
