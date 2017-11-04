@extends('layouts.admin_template')

@section('content')

<?php $maxSalesID = App\Sale\Sale::max('sales_number'); ?>
<!-- Modal prod Adding Form -->
@include('partials.addprod_modal')
@include('partials.salesInvoice_modal')
@include('partials.clients_modal')

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
                <h2 style="color:#000;">Inventory Page</h2>      
             </div>
         </div>

       <!-- /. ROW  -->
        <hr />
               <div class="prod_crud_menu">

               
                <a style="font-weight:normal;" href="{{ url('products') }}"  class="btn btn-default btn-load_updates active"><i class="glyphicon glyphicon-eye-open"></i> View product</a>
                <button style="font-weight:normal;" id="create-sales-invoice" class="btn btn-default active"><i class="glyphicon glyphicon-log-out"></i> Stock out</button>
                <a style="font-weight:normal;" href="{{ url('invoices') }}"  class="btn btn-default active" ><i class="glyphicon glyphicon-eye-open"></i> View Invoices</a>
                <a style="font-weight:normal;" href="{{ url('sales') }}"  class="btn btn-default active" ><i class="glyphicon glyphicon-eye-open"></i> View Sales</a>
                <a style="font-weight:normal;" href="{{ url('exportInventory') }}" id="export-inv-id" class="btn btn-success btn-export-prod active"><i class="glyphicon glyphicon-download"></i> Download Inventory Report</a>
    
               </div>              

 <hr>

 <?php $totalInventory = 0; ?>

 @foreach($inventory as $val)
    <?php $totalInventory += $val->unit_price * $val->total_qty; ?>
 @endforeach

 <div class="alert alert-info" role="alert">
    <a style="font-size: 30px; color:#000;" href="#" class="alert-link">Total Inventory: <span style="font-weight:bold;">Php <?php echo number_format( $totalInventory, 2 ); ?></span></a>
</div>
        
 <table id="table-inv-contents" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th></th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>Unit</th>
                <th>Lot number</th>
                <th>Price</th>
                <th>Date Added</th>
                <th>Quantity</th>
                <th>Expiry Date</th>
                <th>Total Amount</th>
                <th style="display:none;">Purchase ID</th>
            </tr>
        </thead>
       
        <tbody>

    <?php 
        $currDate = date('Y-m-d');
        $salesQtyArrayHldr = array();
    ?>

        @foreach($inventory as $val)

             <?php 
                $date1=date_create($currDate);
                $date2=date_create($val->purchases->expiry_date_month);
                $diff=date_diff($date2,$date1);
                $difference = $diff->format("%a");
             ?>

           <tr class="tbl-inv-row">
             <td><input type='checkbox' style='width:30px; height:20px;' class='radio_check_all prod-id-checkbox' id='radio_check_all prod-id-checkbox' value="{{ $val->product_id }}"></td>
             <td><input type="hidden" class="pharma" value="{{ $val->pharmaceutical }}"/>{{ $val->products->pharmaceutical }}</td>
             <td>{{ $val->products->description }}</td>
             <td>{{ $val->products->type }}</td>
             <td>{{ $val->products->unit }}</td>
             <td>{{ $val->purchases->lot }}</td>
             <td>{{ $val->unit_price }}</td>
             <td>{{ date( "F j, Y h:i:s A", strtotime( $val->created_at ) ) }}</td>
            
             <td title="Original Quantity : {{ $val->quantity }}
Add on Quantity : {{ $val->add_on_qty }}
Number of Sales : {{ ( $val->quantity + $val->add_on_qty ) - $val->total_qty }} " class="inv-quantity" style="color:#fff; text-align:center;border-right: 1px solid #fff; <?php echo (( $val->total_qty <= 50 ) ? "background-color:#C00" : "background-color:#25A602" ); ?>">
             <?php echo $val->total_qty; ?>
             </td>       
             
             <?php if( empty( $val->purchases->expiry_date_month ) ){ ?>
             <td style="color:#000; text-align:center;">{{ "None"  }}</td>
             <?php }elseif($currDate >= $val->purchases->expiry_date_month || $difference <= 248){ ?>
             <td style="color:#fff; text-align:center;background-color:#C00;">{{ date("F j, Y", strtotime($val->purchases->expiry_date_month)) }}</td>
             <?php }elseif($difference > 248 && $difference <= 365){ ?>
             <td style="color:#fff; text-align:center;background-color:#FFA500;">{{ date("F j, Y", strtotime($val->purchases->expiry_date_month)) }}</td>
             <?php }else{ ?>
              <td style="color:#fff; text-align:center;background-color:#25A602;">{{ date("F j, Y", strtotime($val->purchases->expiry_date_month)) }}</td>
             <?php } ?>
             <td style="color:#fff; text-align:center;background-color:#3276b1;">{{ number_format($val->unit_price * $val->total_qty, 2) }}</td>
             <td style="display:none;" class="purchase-id">{{ $val->purchase_id }}</td>
            </tr>

        @endforeach
            
        </tbody>

    </table>

    </div>            <!-- /. PAGE INNER  -->
</div>
        
@endsection