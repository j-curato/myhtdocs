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
                <h2 style="color:#000;">Sales View Page</h2>      
             </div>
         </div>

<?php $totalSales = 0; ?>
       <!-- /. ROW  -->
        <hr>
               <div class="prod_crud_menu">
 
                <a style="font-weight:normal;" href="{{ url('products') }}"  class="btn btn-default btn-load_updates active"><i class="glyphicon glyphicon-eye-open"></i> View product</a>
                <a style="font-weight:normal;" href="{{ url('inventory') }}"  class="btn btn-default btn-load_updates active"><i class="glyphicon glyphicon-eye-open"></i> View Inventory</a>
                <a style="font-weight:normal;" href="{{ url('invoices') }}"  class="btn btn-default btn-view_po active"><i class="glyphicon glyphicon-eye-open"></i> View Invoices</a>
                <a style="" href="{{ url('exportSales') }}" id="export-sales-id" class="btn btn-success btn-export-prod active"><i class="glyphicon glyphicon-download"></i> Download Sales Report</a>
          
               </div>              

 <hr>
     @foreach($sales as $val)
      <?php $totalSales+=$val->amount; ?>
     @endforeach
               <div class="alert alert-info" role="alert">
                  <a style="font-size: 30px; color:#000;" href="#" class="alert-link">Total Sales: <span style="font-weight:bold;">Php <?php echo number_format( $totalSales, 2 ); ?></span></a>
               </div>
   
 <table id="table-sales-contents" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th style="display:none;"></th>
                <th>Date of Purchase</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Lot #</th>
                <th>Brand</th>
                <th>Unit</th>
                <th>Expiry Date</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Amount</th>
                <th style="display:none;"></th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($sales as $val)
            <?php $cLients = App\Client\Client::find($val->client_id); ?>
           <tr class="tbl-sales-row">
             <td style="display:none;">{{ $val->id }}</td>
             <td>{{ date("F j, Y", strtotime($val->created_at)) }}</td>
             <td>{{ $cLients['client_name'] }}</td>
             <td>{{ $val->articles }}</td>
             <td>{{ $val->lot_num }}</td>
             <td>{{ $val->brand }}</td>
             <td>{{ $val->unit }}</td>
             <td style="text-align:center;">{{ $val->expiry_date_month }}</td>
             <td style="text-align:center;">{{ $val->quantity }}</td>
             <td style="text-align:center;">{{ $val->unit_price }}</td>
             
             <td style="color:#fff; text-align:center;<?php echo (( $val->sales_status ) ? "background-color:#25A602": "background-color:#C00" ); ?>"> {{ number_format($val->amount, 2) }}</td>
             <td style="display:none;">{{ $val->created_at }}</td>
           </tr>
        @endforeach
            
            
        </tbody>

    </table>

    </div>            <!-- /. PAGE INNER  -->
</div>
        
@endsection