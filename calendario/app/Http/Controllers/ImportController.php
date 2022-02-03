<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportController extends Controller
{

    public function showView(){
        return view('import');
    }

    public function importCSV(Request $request){

       //dd($request);

        for($i = 0; $i< count($request); $i++){

            


        }

        return view('import');
    }



    /*
    public function import()
    {
        $file = request()->file('file'); //obtém a path do ficheiro através do form

        $customerArr = $this->csvToArray($file);

        for ($i = 0; $i < count($customerArr); $i ++)
        {
            Course::firstOrCreate($customerArr[$i]); //adiciona à base de dados os dados
        }

        $this->showView(); //volta a mostrar a view
    }*/


}
