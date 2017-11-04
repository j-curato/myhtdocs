<?php

namespace App\InventoryRecord;

use Illuminate\Database\Eloquent\Model;

class InventoryRecord extends Model
{
    protected $fillable = [
                            'product_id',
                            'purchase_order_id',
                            'purchase_id',
                            'unit_price',
                            'quantity',
                            'add_on_qty',
                            'total_qty',
                            'expiry_date_month'  
                          ];
   
    /*public function products(){
    	return $this->hasMany('App\Product\Product');
    }*/

    public function products(){
    	 return $this->belongsTo('App\Product\Product','product_id');
    }

    public function purchases(){
    	 return $this->belongsTo('App\Purchase\Purchase','purchase_id');
    }

    public function sales(){
        return $this->hasMany('App\Sale\Sale');
    }
}
