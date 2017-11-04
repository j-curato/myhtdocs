<?php

namespace App\Http\Controllers\PurchaseOrder;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PurchaseOrder\PurchaseOrder as PurchaseOrder;
use App\PurchaseOrder\PurchaseOrder as PDO;

class PurchaseOrderController extends Controller{
  
   public function __construct(){
      $this->middleware('auth');
    } 

    public function index(){

        $purchaseOrders = PurchaseOrder::all();
        return view('purchaseOrders/purchase_orders', ['purchaseOrders' => $purchaseOrders->toArray()]);
    }


    public function store(Request $request){

         $supplierID = $request['supplierID'];
         $po_code = $request['po_code'];
         $shipped_via = $request['shipped_via'];
    	   $terms = $request['terms'];
         $serialize_po = serialize($request['purchase_orders']);
    	   $overall_total = $request['overall_total'];
         $freight_charge = $request['freight_charge'];
    	   $purchase_orders_save = PurchaseOrder::create([
                                                        'supplier_id' => $supplierID,
                                                        'po_code' => $po_code,
                                                        'shipped_via' => $shipped_via,
                                                        'terms' => $terms,
                                                        'purchase_orders' => $serialize_po, 
                                                        'freight_charge' => $freight_charge, 
                                                        'overall_total' => $overall_total,
                                                        'add_toInventory_status' => 0
                                                      ]);

           return json_encode(array('notify'=>"Success"));

    }

    public function getPurchaseOrder($id){

       $getPo = PurchaseOrder::find($id);
       //var_dump($getPo->toArray());
       return view('purchaseOrders/purchase_order_for_printing', ['purchaseOrder' => $getPo->toArray()]);

    }

    public function getPOforValidation($id){

      $getPO = PurchaseOrder::find($id);
      return view('purchaseOrders/actual_purchaseOrder', ['purchaseOrders' => $getPO->toArray()]);

    }

    public function editPurchase($id){

      $getPO = PurchaseOrder::find($id);
      return view('purchaseOrders/edit_purchase', ['purchaseOrders' => $getPO->toArray()]);

    }

    public function getlatestpo(){

      $po_curr_id = PurchaseOrder::select('purchase_orders')->max('id');
      $getCurrPo = PurchaseOrder::find($po_curr_id);

      return view('purchaseOrders/purchase_order_for_printing', ['purchaseOrder' => $getCurrPo->toArray()]);
      
    }

    public function getpoCurrID(){

      $po_curr_id = PurchaseOrder::select('purchase_orders')->max('id');
      //$po_curr_id = PurchaseOrder::all();
    
      return json_encode( array( 'notify' => $po_curr_id ) );

    }

    public function updateTable(Request $request){

       $po_update = PurchaseOrder::where('id', $request['purchase_order_ids'][0])
                                 ->update(['add_toInventory_status' => 1]);

        return json_encode(array('notify' => "Success"));

    }


    

}
