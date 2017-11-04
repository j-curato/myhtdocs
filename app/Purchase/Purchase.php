<?php

namespace App\Purchase;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
	protected $table = "purchases";
    protected $fillable = [
    					   'purchase_order_id',
    					   'product_id',
    					   'po_quantity',
    					   'actual_purchase_quantity',
    					   'po_total',
    					   'purchase_total_amount',
    					   'packaging',
    					   'lot',
    					   'expiry_date_month',
                           'unit_price',
    					   'freight_charge',
    					   'add_toInventory_status',
                           'add_on_quantity'
    					  ];

    public function purchase_orders(){
    	return $this->belongsTo('App\PurchaseOrder\PurchaseOrder','purchase_order_id');
    }

    public function inventory(){
        return $this->hasMany('App\InventoryRecord\InventoryRecord');
    }

}
