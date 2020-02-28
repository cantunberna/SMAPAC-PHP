<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('requisition_id')->unsigned();
            $table->integer('prov_id_one')->unsigned();
            $table->string('prov_one_img')->nullable();
            $table->longText('prov_one_file')->nullable();
            $table->integer('prov_id_two')->unsigned();
            $table->string('prov_two_img')->nullable();
            $table->longText('prov_two_file')->nullable();
            $table->integer('prov_id_three')->unsigned();
            $table->string('prov_three_img')->nullable();
            $table->longText('prov_three_file')->nullable();
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
        Schema::dropIfExists('quotes');
    }
}
