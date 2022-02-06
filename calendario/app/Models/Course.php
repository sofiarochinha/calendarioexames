<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = "course";
    public $timestamps = false;

    protected $fillable = ['name', 'course_code', 'course_year'];

    public function subject(){
        return $this->hasMany(Subject::class);
    }

    public function calendar(){
        return $this->hasOne(Calendar::class);
    }
}
