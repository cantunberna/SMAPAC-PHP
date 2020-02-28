<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignedRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_requisitions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('accountant');
            $table->integer('user_id')->unsigned();
            $table->integer('coordination_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->integer('requisition_id')->unsigned();
            $table->tinyInteger('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigned_requisitions');
    }
}
