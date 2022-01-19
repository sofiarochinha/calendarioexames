<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "professors";

    protected $fillable = [
        'name',
        'email',
        'availability'
    ];
}
