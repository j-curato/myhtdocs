<?php
//purchases
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('purchases', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('purchase_order_id');
            $table->integer('product_id');
            $table->float('po_quantity');
            $table->float('add_on_quantity')->default(0);
            $table->string('actual_purchase_quantity');
            $table->float('po_total');
            $table->float('purchase_total_amount');
            $table->string('packaging');
            $table->string('lot');
            $table->string('expiry_date_month');
            $table->float('unit_price');
            $table->float('freight_charge')->default(0);
            $table->boolean('add_toInventory_status');
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
        Schema::drop('purchases');
    }
}
