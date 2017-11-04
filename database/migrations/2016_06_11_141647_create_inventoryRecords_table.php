<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('inventory_records', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('product_id');
            $table->integer('purchase_order_id');
            $table->integer('purchase_id');  
            $table->float('unit_price');
            $table->float('quantity');
            $table->float('add_on_qty')->default(0);
            $table->float('total_qty')->default(0);
            $table->string('expiry_date_month');
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
         Schema::drop('inventory_records');
    }
}
