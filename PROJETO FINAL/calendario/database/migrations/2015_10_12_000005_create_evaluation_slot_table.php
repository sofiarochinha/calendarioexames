<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationSlotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_slot', function (Blueprint $table) {
            $table->id();
            $table->integer('calendar_id'); //para obter start_date e end_date
            $table->integer('subject'); //nome do evento
            $table->integer('time_slot');
            $table->date('calendar_day');

            $table->foreign('calendar_id')->references('id')->on('calendar');
            $table->foreign('time_slot')->references('id')->on('time_slot');
	        $table->foreign('subject')->references('id')->on('subject');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluation_slot');
    }
}
