<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('agents', function (Blueprint $table) {

            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('sex');
            $table->string('age');
            $table->string('address');
            $table->string('contact_num');
            $table->string('date_of_birth');
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
        Schema::drop('agents');
    }
}
