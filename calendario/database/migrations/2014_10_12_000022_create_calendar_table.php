<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar', function (Blueprint $table) {
            $table->id();
            $table->string('calendar_name');
            $table->integer('academic_year');
            $table->string('evaluation_season');
            $table->string('professor_mec');
            $table->integer('course_code');
            $table->integer('course_year');
            $table->date('start_date');
            $table->date('end_date');

            $table->foreign('academic_year')
                ->references('id')
                ->on('academic_year');

            $table->foreign('course_code')
                ->references('course_code')
                ->on('course');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendar');
    }
}
