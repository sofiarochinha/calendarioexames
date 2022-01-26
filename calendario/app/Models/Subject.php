<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = "subject";
    public $timestamps = false;

    protected $fillable = [
        'name',
        'subject_code',
        'semester',
        'professor_mec',
        'course_code',
        'course_year',
    ];
}
