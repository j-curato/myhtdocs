<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('sales', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('sales_number');
            $table->integer('product_id');
            $table->integer('purchase_order_id');
            $table->integer('purchase_id');  
            $table->integer('inventory_record_id');  
            $table->integer('client_id');
            $table->integer('agent_id')->default(0);
            $table->boolean('sales_status')->default(0);
            $table->string('lot_num');
            $table->string('expiry_date_month');
            $table->string('brand');
            $table->string('articles');
            $table->float('quantity');
            $table->string('unit');
            $table->float('unit_price');
            $table->float('amount');
            $table->string('month');
            $table->string('day');
            $table->string('year');
            $table->timestamps();


            /*$table->string('sold_to');
            $table->string('TIN');
            $table->string('address');
            $table->string('business_style');
            $table->string('sales_date');
            $table->string('terms_po');
            $table->string('osca_pwd_id');*/
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('sales');
    }
}
