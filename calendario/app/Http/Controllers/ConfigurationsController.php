<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigurationsController extends Controller
{
    public function showView(){
        return view('configurations');
    }
}
