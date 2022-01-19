<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicYearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //ano académico, tipo 2021-2022 e épocas de avaliação "Normal, Recurso"
        Schema::create('academic_year', function (Blueprint $table) {
            $table->id();
            $table->string('academic_year');
            $table->string('evaluation_seasons_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_year');
    }
}
