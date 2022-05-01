<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociatedClassroomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associated_classroom', function (Blueprint $table) {

            $table->bigInteger('id_evaluation_slot');
            $table->bigInteger('id_classroom');

            $table->foreign('id_evaluation_slot')->references('id')->on('evaluation_slot');
            $table->foreign('id_classroom')->references('id')->on('classroom');

            $table->primary(['id_evaluation_slot', 'id_classroom']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('associated_classroom');
    }
}
