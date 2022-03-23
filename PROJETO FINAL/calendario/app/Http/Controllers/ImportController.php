<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Course;
use App\Models\Professor;
use App\Models\Subject;
use Illuminate\Http\Request;

class ImportController extends Controller
{


    /**
     * This function returns the view of the import page
     *
     * @return A view.
     */
    public function showView(){
        return view('import');
    }

    /**
     * Importa o csv
     * WARNING: falta resolver o problema quando tém vários docentes na mesma disciplina
     * WARNING: falta indicar o semestre
     * @param Request $request ficheiro JSON
     * @return void
     */
    public function importCSV(Request $request){

        $json = $request->data; //obtém os dados do método post
        $data = json_decode($json); //decode do JSON

        dd($data);

        for ($i = 0; $i < count($data); $i ++)
        {
                //cria um professor ou atualiza o prof se tiver o mesmo número mecanografico
                Professor::updateOrCreate([
                    'mec' => $data[$i][9],
                    'name' => $data[$i][7],
                    'email' => $data[$i][8],
                ]);

                //contém o codigo de curso e o ano do curso na forma '8912-1'
                $string = $data[$i][6];

                /*$var[0] = course_code
                $var[1] = course_year*/
                $var = explode('-', $string);

                //obtém o id do curso que tem o mesmo código de curso e o mesmo ano
                $idCourse = Course::where('course_code', $var[0])
                    ->where('course_year', $var[1]) //AND condition
                    ->first()
                    ->id;

                //obtém o id do professor
                $idProfessor = Professor::where('mec', $data[$i][9])
                    ->first()
                    ->id;


                //adiciona a disiciplina
                //verifica se não existe nenhuma disciplina com o mesmo subject_code
                //se existir faz update
                Subject::updateOrCreate([
                    'subject_code' => $data[$i][2],
                    'name' => $data[$i][0],
                    'semester' => 1, //temos de adicionar este dado
                    'professor_id' => $idProfessor,
                    'course_id' => $idCourse
                ]);

                //contém a sala e o tipo de sala na forma '5.1.1 Aulas'
                $classrom = explode(' ', $data[$i][10]);

                //adiciona a sala ou atualiza caso exista uma sala já adicionada
                Classroom::updateOrCreate([
                    'classroom' => $classrom[0],
                    'type' => $classrom[1]
                ]);

        }

    }

    /**
     * Verifica se o csv já foi importado
     * @return bool
     */
    public function checkIfImported(){

        if(Professor::exists()){
            return true;
        }else {
            return false;
        }
    }

}
