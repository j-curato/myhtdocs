<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Supplier\Supplier as Supplier;
use Excel;

class SupplierController extends Controller
{
    //

    public function __construct(){

    	$this->middleware('auth');

    }

    public function index(){

    	$suppliers = Supplier::all();
    	return view('suppliers/supplier_crud', ['suppliers' => $suppliers]);

    }

    public function create(){

    }  

    public function store(Request $request){

    	$suppliers = Supplier::create($request->all());

           if($suppliers){

             $notification = "Success";

           } else{

             $notification = "Failed";

           }

           return json_encode(array('notify'=>$notification)); 

    }

    public function updateSupplier( Request $request ){

      $updateSupplier = Supplier::where('id', $request['id'])
                                ->update($request->all());
   
           if($updateSupplier){
             $notification = "Success";
           } else{
             $notification = "Failed";
           }

         return json_encode(array('notify'=>$notification)); 

    }

    public function exportSupplier( $param = null ){

         ob_end_clean();
         ob_start();

         if( !$param ){

          Excel::create('SupplierList', function($excel){

              $excel->sheet('Supplierlist', function($sheet){
              $suppliers = Supplier::orderBy('name', 'asc')->get();
              $sheet->loadView('suppliers/view_supplier_excel', [ 'suppliers' => $suppliers ]);

            });

          })->download('xls');

         }else{

          return redirect()->back()->with( 'message', 'Cannot export with the parameter '.$param.'. Please contact developer for additional functions needed. Thank you.' );                   

        }

    }


}//end of controller
