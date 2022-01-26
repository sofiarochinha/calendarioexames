<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function showView(){
        return view('create_calendar');
    }
}
