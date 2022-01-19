<?php

namespace App\Http\Controllers;

use App\Imports\CourseImport;
use App\Imports\Import;
use App\Models\Course;

use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function showView(){
        return view("import");
    }

    public function import(){
        Excel::import(new Import, request()->file('file'));

        return redirect("/importar");
    }



}
