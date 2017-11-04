<?php

namespace App\PurchaseOrder;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    //
    protected $fillable = ['supplier_id','po_code','shipped_via','terms','purchase_orders','freight_charge','overall_total','add_toInventory_status'];

    public function purchases(){
    	return $this->hasMany('App\Purchase\Purchase');
    }

    public function getPurchaseIdsAttribute()
    {
        return $this->purchases->lists('purchase_order_id');
    }
    
    public function products()
    {
       return $this->hasMany('App\Product\Product');
    }
}
