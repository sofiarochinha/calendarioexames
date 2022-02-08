<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricCalendar extends Model
{
    use HasFactory;
    protected $table = "historic_calendar" ;
    public $timestamps = false;

    protected $fillable = [
    'calendar_name',
    'evaluation_season',
    'academic_year',
    'day',
    'course',
    'course_year',
    'subject',
    'time_slot',
    'start_date',
    'end_date'
    ];
}
