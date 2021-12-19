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
        Schema::create('evaluation_slot', function (Blueprint $table) {
            $table->id();
            $table->date('day');
            $table->string('subject');
            $table->string('associated_professor');
            $table->string('observing_professor');
            $table->string('classroom');
            $table->string('time_slot');
            $table->integer('historic_calendar_id');
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
