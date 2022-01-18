<?php

namespace App\Http\Controllers;

use App\Imports\CourseImport;
use App\Models\Course;
use App\Models\Import;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function showView(){
        return view("import");
    }

    /**
     * Torna o csv num array
     * @param string $filename
     * @param string $delimiter
     * @return array|false
     */
    function csvToArray($filename = '', $delimiter = ',')
    {
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

        return $data;
    }

    public function import()
    {
        $file = request()->file('file'); //obtém a path do ficheiro através do form

        $customerArr = $this->csvToArray($file);

        for ($i = 0; $i < count($customerArr); $i ++)
        {
            Course::firstOrCreate($customerArr[$i]); //adiciona à base de dados os dados 
        }

        $this->showView(); //volta a mostrar a view
    }

}
