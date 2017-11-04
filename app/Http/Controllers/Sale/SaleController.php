<?php

namespace App\Http\Controllers\Sale;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sale\Sale as Sale;
use Excel;

class SaleController extends Controller
{
	public function __construct(){
    	$this->middleware('auth');
    } 

    public function index(){

    	$sales = Sale::all();
      return view('sales/view_sales', [ 'sales' => $sales ]);
    }

    public function showInvoices(){

        $invoices = Sale::select('sales_number','client_id','agent_id','sales_status','created_at')
                      ->groupBy('sales_number','client_id','agent_id','sales_status','created_at')
                      ->orderBy('sales_number','DESC')
                      ->get();

        return view('sales/view_invoices', ['invoices' => $invoices]);
    }

    public function getInvoice($id){

        $invoice = Sale::where('sales_number',$id)->get();
        return view('sales/view_print_invoice', ['invoice' => $invoice]);
    }

    public function store( Request $request ){

    	$dataSales = $request['salesDetails'];
      $salesNumber = $request['salesNumber'];
    	$customerID = $request['customerID'];
      $agentID = $request['agentID'];

        for($i = 0; $i < count($dataSales); $i++){

        	Sale::create([
                            'sales_number' => $salesNumber,
                            'product_id' => $dataSales[$i]['sales_prod_id'],
                            'purchase_order_id' => $dataSales[$i]['sales_po_id'],
                            'purchase_id' => $dataSales[$i]['sales_purchase_id'],
                            'inventory_record_id' => $dataSales[$i]['sales_inv_id'], 
                            'client_id' => $customerID,
                            'agent_id' => $agentID,
                            'lot_num' => $dataSales[$i]['sales_lot'], 
                            'expiry_date_month' => $dataSales[$i]['sales_expiry_date'], 
                            'brand' => $dataSales[$i]['sales_type'], 
                            'articles' => $dataSales[$i]['sales_pharma'], 
                            'quantity' => $dataSales[$i]['sales_qty'], 
                            'unit' => $dataSales[$i]['sales_unit'], 
                            'unit_price' => $dataSales[$i]['sales_unitPrice'], 
                            'amount' => $dataSales[$i]['sales_amount'],
                            'month' => date("F"),                                  
                            'day' => date("j"),                                  
                            'year' => date("Y")                                  
                        ]);

        }
    	
        return json_encode(array('notify' => "Success"));
    }

    function changeSaleStatus( Request $request){

        $saleNum = $request['saleNumber'];

        Sale::where('sales_number', $saleNum)
            ->update(array('sales_status' => 1));

        return json_encode(array('notify' => "Success"));

    }


    public function exportSales( $param = null ){

        ob_end_clean();
        ob_start();

        $arrayMonths = ["January","February","March","April","May","June","July","August","September","October","November","December"];

        if( !$param ){

          Excel::create('SalesReport', function($excel){
          $excel->sheet('sales_sheet', function($sheet){
          $sales = Sale::orderBy('created_at','desc')->get();
          $sheet->loadView('sales/view_sales_excel', [ 'sales' => $sales ]);

          });

         })->download('xls');

        } else if( in_array( ucfirst( $param ), $arrayMonths ) ){

          Excel::create('SalesReport', function($excel) use($param){
          $excel->sheet('sales_sheet', function($sheet) use($param){
          $sales = Sale::orderBy('created_at','desc')
                             ->where('month', 'ILIKE', '%'.$param.'%')
                             ->get();
          $sheet->loadView('sales/view_sales_excel', [ 'sales' => $sales ]);

          });

         })->download('xls');                   

      }else{

        return redirect()->back()->with('message', 'Cannot export with a parameter '.$param.'. Please contact developer for additional functions needed. Thank you.');

      }

    }// end of function


    public function exportInvoices( $param = null ){

        ob_end_clean();
        ob_start();

        if( !$param ){

          Excel::create('InvoicesReport', function($excel){
          $excel->sheet('invoices_sheet', function($sheet){
          $invoices = Sale::select('sales_number','client_id','agent_id','sales_status','created_at')
                      ->groupBy('sales_number','client_id','agent_id','sales_status','created_at')
                      ->orderBy('sales_number','DESC')
                      ->get();

          $sheet->loadView('sales/view_invoices_excel', ['invoices' => $invoices] );

          });

         })->download('xls');

        }else{

        return redirect()->back()->with('message', 'Cannot export with a parameter '.$param.'. Please contact developer for additional functions needed. Thank you.');

      }

    }
    
}// end controller
