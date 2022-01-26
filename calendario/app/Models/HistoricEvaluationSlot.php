<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricEvaluationSlot extends Model
{
    use HasFactory;

    public function historic_calendar(){
        return $this->hasMany(HistoricCalendar::class);
    }
}
