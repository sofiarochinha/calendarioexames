<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarDay extends Model
{
    use HasFactory;
    protected $table = "calendar_day";
    public $timestamps = false;

    protected $fillable = ['calendar_id', 'evaluation_day'];
}
