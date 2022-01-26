<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $table = "calssroms";
    public $timestamps = false;

    protected $fillable = ['classroom', 'capacity', 'type'];
}
