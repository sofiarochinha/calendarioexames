<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;

class ExportController extends Controller
{
    public function showView(){
        return view('export', [
        'calendars' => Calendar::all()
    ]);
    }
}
