<?php

namespace App\Http\Controllers\InventoryRecord;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\InventoryRecord\InventoryRecord as InventoryRecord;
use Excel;


class InventoryRecordController extends Controller{

    public function __construct(){
    	$this->middleware('auth');
    } 

    public function index(){
    	$inventory = InventoryRecord::all();
    	return view('inventory/view_inventory', ['inventory' => $inventory]);
    }

    public function store( Request $request ){

        $prod_ids = $request['product_ids'];
        $purchase_order_ids = $request['purchase_order_ids'];
        $purchase_ids = $request['purchase_ids'];
        $price = $request['purchasePrice'];
        $quantity = $request['purchaseQuantity'];
        $addOnQty = $request['purchaseAddOnQty'];
        $expiryDate = $request['purchaseExpiryDate'];

    	  for($i = 0; $i < count($prod_ids); $i++){

    		  InventoryRecord::create([
    		                            'product_id' => $prod_ids[$i],
    		                            'purchase_order_id' =>  $purchase_order_ids[$i],
    		                            'purchase_id' => $purchase_ids[$i],
                                    'unit_price' => $price[$i],
                                    'quantity' => $quantity[$i],
                                    'add_on_qty' => $addOnQty[$i],
                                    'total_qty' => $quantity[$i]+$addOnQty[$i],
    		                            'expiry_date_month' => $expiryDate[$i]               
    		                      ]);

    	  }

    		     
    	  return json_encode(array('notify' => "Success"));

    }

    public function exportInventory( $param = null ){

        ob_end_clean();
        ob_start();

        if( !$param ){

          Excel::create('InventoryReport', function($excel){

            $excel->sheet('inventory_sheet', function($sheet){

              $inventory = InventoryRecord::orderBy('created_at', 'desc')->get();
              $sheet->loadView('inventory/view_inventory_excel', [ 'inventory' => $inventory ]);

            });

          })->download('xls');

                                   

        } else{

          /*$products = InventoryRecord::orderBy('pharmaceutical','asc')
                             ->where('type', 'ILIKE', '%'.$param.'%')
                             ->orwhere('unit', 'ILIKE', '%'.$param.'%')
                             ->get();*/
          return redirect()->back()->with( 'message', 'Cannot export with the parameter '.$param.'. Please contact developer for additional functions needed. Thank you.' );                   

        }

    }


    public function getprodDetails( Request $request ){

      $prod_ids = $request['prod_IDs'];
      $purchase_ids = $request['purchase_IDs'];

      $sales_details = InventoryRecord::whereIn('inventory_records.purchase_id', $purchase_ids)
                                      ->join('products', 'products.id', '=', 'inventory_records.product_id')
                                      ->join('purchases', 'purchases.id', '=', 'inventory_records.purchase_id')
                                      ->select(
                                        'inventory_records.id',
                                        'inventory_records.product_id', 
                                        'inventory_records.purchase_order_id', 
                                        'inventory_records.purchase_id',  
                                        'purchases.lot', 
                                        'purchases.expiry_date_month',
                                        'products.type', 
                                        'products.pharmaceutical',
                                        'inventory_records.total_qty',
                                        'products.unit',
                                        'inventory_records.unit_price'
                                        )
                                      ->get();

     
      return json_encode(array('prodval' => $sales_details));

    }

    public function updateInventory( Request $request ){

      $dataSales = $request['salesDetails'];

      for($i = 0; $i < count($dataSales); $i++){

          if( $dataSales[$i]['actual_inv_quantity']-$dataSales[$i]['sales_qty'] > 0 ){
            InventoryRecord::where('id', $dataSales[$i]['sales_inv_id'])
                           ->update(['total_qty' => $dataSales[$i]['actual_inv_quantity']-$dataSales[$i]['sales_qty']]);
          }else{
            InventoryRecord::where('id', $dataSales[$i]['sales_inv_id'])
                           ->delete();
          }

      }
      
        return json_encode(array('notify' => "Success"));
    }

}
