<?php
//purchaseOrders
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('purchase_orders', function(Blueprint $table){

            $table->increments('id');
            $table->integer('supplier_id');
            $table->string('po_code');
            $table->string('shipped_via');
            $table->string('terms');
            $table->text('purchase_orders');
            $table->float('freight_charge')->default(0);
            $table->float('overall_total');
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
        //
        Schema::drop('purchase_orders');
    }
}
