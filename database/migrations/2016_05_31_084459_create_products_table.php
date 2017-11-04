<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('products', function (Blueprint $table){
            $table->increments('id');
            $table->string('pharmaceutical');
            $table->string('description');
            $table->string('type');
            $table->string('unit');
            $table->string('category');
            $table->float('price');
            $table->float('quantity')->default(0);
            $table->boolean('po_status')->default(0);
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
        //
        Schema::drop('products');
    }
}
