<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportController extends Controller
{

    public function showView(){
        return view('import');
    }

    /**
     * Torna o csv num array
     * @param string $filename
     * @param string $delimiter
     */
    public function csvToArray( $delimiter = ';')
    {
        $filename = request()->file('file');
        //verifica se o ficheiro pode ser lido
        if (!is_readable($filename))
            return false;

        $header = null;
        $data = array();

        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return view('import', compact('data'));
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
