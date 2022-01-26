<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;
    protected $table = "academic_year";
    public $timestamps = false;

    protected $fillable = ['academic_year', 'evaluation_season'];


}
