<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = "courses";
    public $timestamps = false;

    protected $fillable = ['name', 'course_code', 'course_year'];
}
