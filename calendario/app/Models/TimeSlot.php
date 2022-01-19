<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "time_slot";


    protected $fillable = ['time_slot'];

}
