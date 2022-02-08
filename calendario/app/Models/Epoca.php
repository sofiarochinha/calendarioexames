<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epoca extends Model
{
    use HasFactory;

    public function calendars(){
        return $this->hasMany(Calendar::class);
    }
}
