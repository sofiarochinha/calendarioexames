<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssociatedClassroom extends Model
{
    use HasFactory;
    protected $table = "associated_classroom";
    protected $primaryKey = ['id_evaluation_slot', 'id_classroom'];
    public $timestamps = false;

    protected $fillable = [
        'id_evaluation_slot',
        'id_classroom',
    ];

    /*public function sala(){
        return $this->belongsTo(Epoca::class, 'epoca_id');
    }*/

}
