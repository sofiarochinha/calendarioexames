<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epoca extends Model
{
    use HasFactory;

    protected $table = "epocas";
    public $timestamps = false;

    protected $fillable = ['name', 'start_date', 'end_date'];

    public function calendars(){
        return $this->hasMany(Calendar::class);
    }
}
