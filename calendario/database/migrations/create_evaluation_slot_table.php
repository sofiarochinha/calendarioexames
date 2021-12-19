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
            
            $table->foreign('associated_professor')->references('name')->on('professors');
				$table->foreign('observing_professor')->references('name')->on('professors');
				$table->foreign('time_slot')->references('time_slot')->on('time_slot');
				$table->foreign('day')->references('evaluation_day')->on('calendar_day');
				$table->foreign('subject')->references('name')->on('subject');
				$table->foreign('classroom')->references('classroom')->on('classrooms');
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
