<?php
namespace App\Product;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{

    protected $fillable = ['pharmaceutical','description','unit','type','category','price','quantity','po_status'];
    protected $guarded = ['price'];

   /* public function inventory(){
    	return $this->belongsTo('App\InventoryRecord\InventoryRecord','id');
    }*/

   	public function inventory(){
    	return $this->hasMany('App\InventoryRecord\InventoryRecord');
    }

    public function purchaseorder()
    {
       return $this->belongsTo('App\PurchaseOrder\PurchaseOrder','product_id');
    }
    
}