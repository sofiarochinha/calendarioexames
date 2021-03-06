<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
    protected $table = "professor";
    public $timestamps = true;

    protected $fillable = ['name', 'email', 'availability', 'mec'];

    public function subject(){
        return $this->hasOne(Subject::class);
    }

    public function observingProfessor(){
        return $this->hasOne(ObservingProfessor::class);
    }


}
