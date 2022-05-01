<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservingProfessorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observing_professor', function (Blueprint $table) {
            $table->bigInteger('id_evaluation_slot');
            $table->bigInteger('id_professor');

            $table->foreign('id_evaluation_slot')->references('id')->on('evaluation_slot');
            $table->foreign('id_professor')->references('id')->on('professor');

            $table->primary(['id_evaluation_slot', 'id_professor']);



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('observing_professor');
    }
}
