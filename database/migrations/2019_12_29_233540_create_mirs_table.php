<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mirs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('component');
            $table->string('objective');
            $table->string('fedresource');
            $table->string('ownresource');
            $table->string('trianual');
            $table->string('nineteen');
            $table->string('twenty');
            $table->string('twenty_one');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('mirs');
    }
}
