<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Payment\Payment as Payment;
use Excel;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $param = null )
    {
        if( !$param ){
            echo $param;
        }else{
            echo $param;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paymentDetails = Payment::create( $request->all() );

        if( $paymentDetails ){

            $notification = "Success";

        }else{

            $notification = "Failed";

        }

        return json_encode( array( 'notify' => $notification ) );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $salesNumber )
    {

        $paymentHistory = Payment::where( 'sales_number', $salesNumber )->get();
        return view('payment/view_payment_history',[ 'payments' => $paymentHistory] );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function exportPaymentHistory( $param ){

        ob_end_clean();
        ob_start();

          Excel::create('PaymentLogReport', function($excel) use($param){

            $excel->sheet('paymentlog_sheet', function($sheet) use($param){

              $paymentHistory = Payment::where( 'sales_number', $param )->orderBy('created_at', 'desc')->get();
              $sheet->loadView('payment/view_paymentHistory_excel', [ 'payments' => $paymentHistory ]);

            });

          })->download('xls');

    }

}//End of Controller
