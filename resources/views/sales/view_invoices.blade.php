@extends('layouts.admin_template')
@section('content')
@include('partials.enter_payment_modal')
       
<div id="page-wrapper" >
@include('partials.alert_notice_collected')
    <div id="page-inner">

    @if(session()->has('message'))
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4 style="color:#000;"><span style="font-weight:bold;">Message: </span>{{ session()->get('message') }}</h4>
        </div>
    @endif

        <div class="row">
             <div class="col-md-12">
                <h2 style="color:#000;">Invoices Page</h2>      
             </div>
         </div>

       <!-- /. ROW  -->
        <hr>
               <div class="prod_crud_menu">

                <a style="font-weight:normal;" href="{{ url('products') }}"  class="btn btn-default btn-load_updates active"><i class="glyphicon glyphicon-eye-open"></i> View product</a>
                <a style="font-weight:normal;" href="{{ url('inventory') }}"  class="btn btn-default btn-load_updates active"><i class="glyphicon glyphicon-eye-open"></i> View Inventory</a>
                <a style="font-weight:normal;" href="{{ url('sales') }}"  class="btn btn-default btn-view_po active"><i class="glyphicon glyphicon-eye-open"></i> View Sales</a>
                <!--<a  href="{{ url('#') }}" id="btn-saleNum-collected" class="btn btn-success btn-saleNum-collected active"><i class="glyphicon glyphicon-check"></i> Mark as collected</a>-->
                <a  href="{{ url('#') }}" id="btn-enter-payment" class="btn btn-default btn-enter-payment active"><i class="glyphicon glyphicon-check"></i> Enter Payment</a>
                <!--<a  href="{{ url('paymentHistory/{param?}') }}" id="btn-payment-history" class="btn btn-default btn-payment-history active"><i class="glyphicon glyphicon-eye-open"></i> View Payment History</a>-->
                <a style="" href="{{ url('exportInvoices') }}" id="export-invoices-id" class="btn btn-success btn-export-prod active"><i class="glyphicon glyphicon-download"></i> Download Invoices Report</a>
                
               </div>              

 <hr>
        
<?php 

    $salesTotal = array();
    $allSales = App\Sale\Sale::orderBy('sales_number','desc')->get(); 
    $salesNumList = App\Sale\Sale::select('sales_number')->groupBy('sales_number')->get();
    $maxSaleNum = App\Sale\Sale::max('sales_number'); ?>

    @foreach( $allSales as $val )
                
    <?php 

        for($i = 1; $i <= $maxSaleNum; $i++){

            if($val->sales_number == $i ){

                if(isset($salesTotal[$val->sales_number])){
                    $salesTotal[$val->sales_number] += $val->amount; 

                }else{

                    $salesTotal[$val->sales_number] = 0; 
                    $salesTotal[$val->sales_number] += $val->amount; 

                }
             }
         } 

    ?>

    @endforeach               
 
    <?php 
        $overallpayments = 0;
        $paymentTotal = array();
        $fullyPaidHolder = array();
        $paymentDetails = App\Payment\Payment::select('*')->orderBy('sales_number', 'desc')->get(); 
        $payments = App\Payment\Payment::all();
    ?>

    @foreach( $salesNumList as $val )

    <?php 

        for($j = 0; $j < count($paymentDetails); $j++ ){ 

            if($val->sales_number == $paymentDetails[$j]['sales_number']){

                if(isset($paymentTotal[$val->sales_number])){
                    $paymentTotal[$val->sales_number] += $paymentDetails[$j]['amount_paid']; 

                }else{

                    $paymentTotal[$val->sales_number] = 0; 
                    $paymentTotal[$val->sales_number] += $paymentDetails[$j]['amount_paid'];

                }
            }
        }

    ?>
        
    @endforeach

    @foreach( $paymentDetails as $val )

       @if($val->status)

        <?php $fullyPaidHolder[$val->sales_number] = $val->status; ?>

       @endif

    @endforeach

    @foreach($payments as $val)
      <?php $overallpayments+=$val->amount_paid; ?>
    @endforeach

    <div class="alert alert-info" role="alert">
        <a style="font-size: 30px; color:#000;" href="#" class="alert-link">Total Payments: <span style="font-weight:bold;">Php <?php echo number_format( $overallpayments, 2 ); ?></span></a>
    </div>

 <table id="table-invoices-contents" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th></th>
                <th>Sale Number</th>
                <th>Date of Purchase</th>
                <th>Customer Name</th>
                <th>Agent Name</th>
                <th>Total Amount Payables</th>
                <th>Total Amount Paid</th>
                <th>Total Balance</th>
                <th>Status</th>
                <th style="text-align:center;">Action</th>
                <th style="display:none;"></th>
                <th style="display:none;"></th>
                <th></th>
            </tr>
        </thead>
        
        <tbody>
            
            @foreach($invoices as $key => $val)
          
            <?php $Clients = App\Client\Client::find($val->client_id); ?>

               <tr class="tbl-invoices-row">
               <td><input type='checkbox' style='width:30px; height:20px;' class='radio_check_all prod-id-checkbox' id='prod-id-checkbox' value="{{ $val->sales_number }}"></td>
                 <td style="text-align:center;">{{ $val->sales_number }}</td>
                 <td style="text-align:center;">{{ date("F j, Y", strtotime($val->created_at)) }}</td>
                 <td style="text-align:center;">{{ $Clients['client_name'] }}</td>
                 <td style="text-align:center;">{{ $val->agents['fname'].' '.$val->agents['lname'] }}</td>
                 <td style="text-align:center;">{{ number_format( $salesTotal[$val->sales_number], 2 ) }}</td>
                 <td style="text-align:center;">{{ (isset($paymentTotal[$val->sales_number]) ? number_format( $paymentTotal[$val->sales_number], 2 ) : "0") }}</td>
                 <td style="text-align:center;">{{ (isset($paymentTotal[$val->sales_number]) ? number_format( $salesTotal[$val->sales_number] - $paymentTotal[$val->sales_number], 2 ) : number_format( $salesTotal[$val->sales_number], 2 ) ) }}</td>
                 <td style="text-align:center;color:#fff;<?php echo (isset( $fullyPaidHolder[$val->sales_number] ) ? "background-color:#25A602": "background-color:#C00" ); ?>"><?php echo (isset( $fullyPaidHolder[$val->sales_number] ) ? "Fully Paid": "Collectible" ); ?></td>
                 <td style="background-color:#3276b1;text-align:center;"><a style="color:#fff;text-align:center;" href="{{ url('viewInvoice').'/'.$val->sales_number }}" target="_blank"><i class="glyphicon glyphicon-print"></i> Print Invoice</a></td>
                 <td style="display:none;">{{ $val->created_at }}</td>
                 <td style="display:none;">{{ $val->client_id }}</td>
                 <td style="border-left: solid 1px #fff;background-color:#3276b1;text-align:center;"><a style="color:#fff;text-align:center;" href="{{ url('paymentHistory').'/'.$val->sales_number }}"><i class="glyphicon glyphicon-eye-open"></i> View Payment History</a></td>
               </tr>
            @endforeach
        </tbody>

    </table>




    </div>            <!-- /. PAGE INNER  -->
</div>   
@endsection