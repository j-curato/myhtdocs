@extends('layouts.admin_template')

@section('content')


<?php 

$totalInventory = 0;
$totalSales = 0;
$totalpayments = 0;

$iNventory = App\InventoryRecord\InventoryRecord::all();
$sAles = App\Sale\Sale::all();
$pendingpo_counter = App\PurchaseOrder\PurchaseOrder::where('add_toInventory_status', 0)->count();
$payments = App\Payment\Payment::all();

?>

 @foreach($iNventory as $val)
    <?php $totalInventory += $val->unit_price * $val->total_qty; ?>
 @endforeach

 @foreach($sAles as $val)
    <?php $totalSales+=$val->amount; ?>
 @endforeach

 @foreach($payments as $val)
  <?php $totalpayments+=$val->amount_paid; ?>
 @endforeach
       
<div id="page-wrapper" >


            <div id="page-inner">

                <div class="row">
                    <div class="col-md-12">
                     <h1>Pro Medical Solutions Dashboard</h1>   
                        <h5>Welcome {{ Auth::user()->name }} , Love to see you back. </h5>
                    </div>
                </div>
                 <!-- /. ROW  -->
    

                    <hr />
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
      <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-search"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo "Php ".number_format($totalInventory,2); ?></p>
                    <p>Total Inventory Cost</p>
                </div>
             </div>
         </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
      <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-usd"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo "Php ".number_format($totalSales,2); ?></p>
                    <p >Total Sales Cost</p>
                </div>
             </div>
         </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
      <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="glyphicon glyphicon-ok"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo "Php ".number_format($totalpayments,2); ?></p>
                    <p>Total Payments</p>
                </div>
             </div>
         </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
      <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-edit"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo $pendingpo_counter; ?></p>
                    <p>Pending Purchase Orders</p>
                </div>
             </div>
         </div>
      </div>
                 <!-- /. ROW  -->
                <hr />                

             </div> <!-- col-md-3 -->           
    </div> <!-- end page-inner -->
  </div><!-- end page wrapper -->
</div>



@endsection
