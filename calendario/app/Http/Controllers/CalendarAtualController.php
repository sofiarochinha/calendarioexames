<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Course;

/**
 * Controller com todos os métodos para o calendário atual e para criar o calendário
 */
class CalendarAtualController extends Controller
{
    public function showViewAtual(){
        return view("calendario_atual");
    }

    //------
    //percisa de uma função que va buscar o calendario pelo id do curso
    //------


    //view para criar um novo calendario
    //envia todos os dados necessários para as comboboxs
    public function showViewCreate(){
        $courses = Course::all(); //obtém todos os cursos
        $academicYears = AcademicYear::all(); //obtém todas as épocas de avaliação

        return view('create_calendar', compact(['courses', 'academicYears']));
    }

    public function addcryptos()
    {
        $cryptos = Crypto::all();
        return view('investimentos.cryptos.addcryptos',compact('cryptos'));
    }
}
