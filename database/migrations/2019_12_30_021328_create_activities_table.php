<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('component_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->string('activity', 500);
            $table->string('amount');
            $table->string('trianual');
            $table->string('fist_year');
            $table->string('second_year');
            $table->string('third_year');
            $table->string('indicator');
            $table->string('formula');
            $table->string('frequency');
            $table->string('measure');
            $table->string('prog_indicator', 20);
            $table->string('prog_one', 20);
            $table->string('prog_two', 20);
            $table->string('prog_three', 20);
            $table->string('prog_four', 20);
            $table->string('real_indicator', 20);
            $table->string('real_one', 20);
            $table->string('real_two', 20);
            $table->string('real_three', 20);
            $table->string('real_four', 20);
            $table->string('total');
            $table->string('verification');
            $table->string('supposed');            
            $table->timestamps();

            // Relation
            $table->foreign('component_id')->references('id')->on('mirs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('department_id')->references('id')->on('departments')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
