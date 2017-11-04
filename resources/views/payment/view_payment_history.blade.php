@extends('layouts.admin_template')
@section('content')
        
<div id="page-wrapper" >

    <div id="page-inner">

    @if(session()->has('message'))
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4 style="color:#000;"><span style="font-weight:bold;">Message: </span>{{ session()->get('message') }}</h4>
        </div>
    @endif

        <div class="row">
             <div class="col-md-12">
                <h2 style="color:#000;">Payment History Page</h2>      
             </div>
         </div>

       <!-- /. ROW  -->
        <hr>
               <div class="prod_crud_menu">
 
                <a style="font-weight:normal;" href="{{ url('products') }}"  class="btn btn-default btn-load_updates active"><i class="glyphicon glyphicon-eye-open"></i> View product</a>
                <a style="font-weight:normal;" href="{{ url('inventory') }}"  class="btn btn-default btn-load_updates active"><i class="glyphicon glyphicon-eye-open"></i> View Inventory</a>
                <a style="font-weight:normal;" href="{{ url('invoices') }}"  class="btn btn-default btn-view_po active"><i class="glyphicon glyphicon-eye-open"></i> View Invoices</a>
                <!--<a style="font-weight:normal;" href="{{ url('#') }}"  class="btn btn-default btn-edit-payment active"><i class="glyphicon glyphicon-edit"></i> Edit Payment</a>-->
                <a style="" href="{{ (isset($payments[0]) ? url('exportPaymentHistory/'.$payments[0]['sales_number']): '#' ) }}" id="export-payment-history" class="btn btn-success export-payment-history active"><i class="glyphicon glyphicon-download"></i> Download Payment Report</a>
          
               </div>              

 <hr>

 <?php $totalPayments = 0; ?>
     @foreach( $payments as $val )
      <?php $totalPayments+=$val->amount_paid; ?>
     @endforeach
               <div class="alert alert-info" role="alert">
                  <a style="font-size: 30px; color:#000;" href="#" class="alert-link">Total Payments: <span style="font-weight:bold;">Php <?php echo number_format( $totalPayments, 2 ); ?></span></a>
               </div>
   
 <table id="table-payments-contents" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                
                <th></th>
                <th>OR #</th>
                <th>Customer Name</th>
                <th>Date of Payment</th>
                <th>Amount Paid</th>
                <th style="display:none;">Created_at</th>

            </tr>
        </thead>
        
        <tbody>
        
            @foreach( $payments as $val )
            <?php $clients = App\Client\Client::find($val->client_id); ?>
           <tr class="tbl-payments-row">
             <td><input type='checkbox' style='width:30px; height:20px;' class='radio_check_all prod-id-checkbox' id='prod-id-checkbox' value="{{ $val->id }}"></td>
             <td>{{ $val->orNumber }}</td>
             <td>{{ $clients['client_name'] }}</td>
             <td>{{ date("F j,Y h:i:s A",strtotime($val->created_at)) }}</td>
             <td>{{ number_format( $val->amount_paid, 2 ) }}</td>
             <td style="display:none;">{{ $val->created_at }}</td>
           </tr>
        @endforeach
            
            
        </tbody>

    </table>

    </div>            <!-- /. PAGE INNER  -->
</div>
        
@endsection