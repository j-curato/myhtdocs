<?php

namespace App\Sale;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
                           'sales_number',
              					   'product_id',
              					   'purchase_order_id',
              					   'purchase_id',
              					   'inventory_record_id',
                           'client_id',
                           'agent_id',
              					   'sales_status',
                           'lot_num',
                           'expiry_date_month',
                           'brand',
                           'articles',
                           'quantity',
                           'unit',
                           'unit_price',
                           'amount',
                           'month',
                           'day',
    					             'year'
    					  ];

    public function inventory(){
      return $this->belongsTo('App\InventoryRecord\InventoryRecord', 'inventory_record_id');
    }


    public function agents(){

      return $this->belongsTo('App\Agent\Agent', 'agent_id');

    }


}
