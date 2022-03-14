<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricCalendarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historic_calendar', function (Blueprint $table) {
            $table->id();
            $table->string('calendar_name');
            $table->string('academic_year');
            $table->string('evaluation_season');
            $table->string('course');
            $table->integer('course_year');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('day');
            $table->string('subject');
            $table->string('time_slot');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historic_calendar');
    }
}
