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
        'calendar_name', 'academic_year',
        'evaluation_season', 'associated_professor',
        'course', 'course_year', 'start_date','end_date'];


}
