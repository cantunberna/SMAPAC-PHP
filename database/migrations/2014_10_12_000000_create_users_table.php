<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('paterno');
            $table->string('materno');
            $table->string('curp');
            $table->string('rfc');
            $table->string('phone');
            $table->string('birthday');
            $table->string('gender');
            $table->string('age');
            $table->string('profession');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address');
            // $table->integer('role_id');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
