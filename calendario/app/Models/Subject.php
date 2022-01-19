<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model for subject table
 */

class Subject extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "subject";

    protected $fillable = [
        'name',
        'subject_id',
        'semester',
        'associated_professor',
        'associated_course',
        'course_year',
        'abbreviation'
    ];
}
