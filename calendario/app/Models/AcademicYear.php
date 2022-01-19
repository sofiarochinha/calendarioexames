<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "academic_year";

    protected $fillable = ['year_name', 'evaluation_seasons'];
}
