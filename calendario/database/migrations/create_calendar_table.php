<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('academic_year');
            $table->string('evaluation_season');
            $table->string('associated_professor');
            $table->string('course');
            $table->integer('course_year');
            $table->date('start_date');
            $table->date('end_date');
            
            $table->foreign('academic_year')->references('year_name')->on('academic_year');
            $table->foreign('course')->references('name')->on('courses');
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
