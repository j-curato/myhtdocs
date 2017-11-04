<?php

namespace App\Http\Controllers\Purchase;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Purchase\Purchase as Purchase;
use DB;

class PurchaseController extends Controller{
    
    public function __construct(){
    	$this->middleware('auth');
    } 

    public function index(){

            $purchases = Purchase::select('purchase_order_id', DB::raw('SUM(po_total)'))
                                 ->groupBy('purchase_order_id')
                                 ->get();
            return view('purchases/purchases_crud', ['allPurchases' => $purchases]);
    }

    public function store( Request $request ){

        $datapurchases = $request['purchases_data'];

        for($i = 0; $i < count($datapurchases); $i++){

        	Purchase::create([
                                    'purchase_order_id' => $datapurchases[$i]['po_id'],
                                    'product_id' => $datapurchases[$i]['prod_id'],
                                    'po_quantity' => $datapurchases[$i]['po_qty'],
                                    'actual_purchase_quantity' => $datapurchases[$i]['purchase_qty'], 
                                    'packaging' => $datapurchases[$i]['purchase_packaging'], 
                                    'lot' => $datapurchases[$i]['purchase_lot'], 
                                    'expiry_date_month' => $datapurchases[$i]['purchase_xpiryDate'], 
                                    'unit_price' => $datapurchases[$i]['po_price'], 
                                    'po_total' => $datapurchases[$i]['po_total'],
                                    'purchase_total_amount' => $datapurchases[$i]['purchase_total'],
                                    'freight_charge' => $request['freight_charge'],
                                    'add_toInventory_status' => 0,
                                    'add_on_quantity' => $datapurchases[$i]['addon_qty']
                             ]);

        }
    	
        return json_encode(array('notify' => "Success"));
    }


    public function getValidatedPurchase($id){
        $purchase = Purchase::where('purchases.purchase_order_id', $id)
                            ->join('products', 'purchases.product_id', '=', 'products.id')
                            ->select('purchases.*', 'products.*')
                            ->get();
        //$purchase = Purchase::where('purchase_order_id', $id)->get();
        return view('purchases/validated_purchase', ['purchases' => $purchase]);
    }


    public function editPurchase($id){

        $purchase = Purchase::where('purchases.purchase_order_id', $id)
                            ->join('products', 'purchases.product_id', '=', 'products.id')
                            ->select('purchases.*','purchases.id as purchase_id', 'products.*', 'products.id as product_id')
                            ->get();
        //$purchase = Purchase::where('purchase_order_id', $id)->get();
        return view('purchases/edit_purchase', ['purchases' => $purchase]);

    }


    public function updatepurchases(Request $request)
    {

        $datapurchases = $request['purchases_data'];

        for($i = 0; $i < count($datapurchases); $i++){

            Purchase::where( 'id', $datapurchases[$i]['purchasesID'] )
                    ->update([
                                    'po_quantity' => $datapurchases[$i]['po_qty'],
                                    'actual_purchase_quantity' => $datapurchases[$i]['purchase_qty'], 
                                    'packaging' => $datapurchases[$i]['purchase_packaging'], 
                                    'lot' => $datapurchases[$i]['purchase_lot'], 
                                    'expiry_date_month' => $datapurchases[$i]['purchase_xpiryDate'], 
                                    'unit_price' => $datapurchases[$i]['po_price'], 
                                    'po_total' => $datapurchases[$i]['po_total'],
                                    'purchase_total_amount' => $datapurchases[$i]['purchase_total'],
                                    'freight_charge' => $request['freight_charge'],
                                    'add_toInventory_status' => 0,
                                    'add_on_quantity' => $datapurchases[$i]['addon_qty']
                             ]);

        }
        
        return json_encode(array('notify' => "Success"));
        
    }


    public function addpurchaseToInventoryView($id){

         $purchase = Purchase::where('purchases.purchase_order_id', $id)
                             ->join('products', 'purchases.product_id', '=', 'products.id')
                             ->select('purchases.*', 
                                     'products.pharmaceutical',
                                     'products.description',
                                     'products.type',
                                     'products.unit',
                                     'products.price',
                                     'products.quantity')
                            ->get();
        return view('purchases/addpurchaseToInventory', ['purchases' => $purchase]);

    }


}
