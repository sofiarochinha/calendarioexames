<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('subject_code');
            $table->string('semester');
            $table->integer('professor_id');
            $table->integer('course_id');
            $table->integer('numberOfStudent')->default(0);

            $table->foreign('professor_id')
                ->references('id')
                ->on('professor');

            $table->foreign('course_id')
                ->references('id')
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
        Schema::dropIfExists('subject');
    }
}
