<?php 
     $poArray = array();
     $po_size = sizeof($purchaseOrders);

     for($i=0; $i < $po_size; $i++){
     	$poArray[$i] = unserialize($purchaseOrders[$i]['purchase_orders']);
     }
?>

@extends('layouts.admin_template')

@section('content')

@include('partials.edit_po_modal')

<!-- Modal prod Adding Form -->
        
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
             <div class="col-md-12">
                <h2 style="color:#000;">Purchase Order Page</h2>
             </div>
         </div>
         <hr/>
         <div class="po-menu">
          <a style="font-weight:normal;" href="{{ url('products') }}"  class="btn btn-default btn-load_updates active"><i class="glyphicon glyphicon-eye-open"></i> View product</a>
          <a style="font-weight:normal;" href="{{ url('purchases') }}"  class="btn btn-default btn-view_po active"><i class="glyphicon glyphicon-eye-open"></i> View Purchases</a>
          <a style="font-weight:normal;" href="{{ url('inventory') }}"  class="btn btn-default btn-load_updates active"><i class="glyphicon glyphicon-eye-open"></i> View Inventory</a>
          <a style="font-weight:normal; pointer-events: none; cursor: default;" class="btn btn-default btn-edit-po active"><i class="glyphicon glyphicon-edit"></i> Edit Purchases</a>
         </div>
                 <!-- /. ROW  -->
        <hr />
                      
 <table id="table-po-contents" class="display" cellspacing="0" width="100%">

        <thead>
            <tr>
                <th></th>
                <th>P.O. #</th>
                <th>Date Created</th>
                <th style="text-align:center;">Total Price</th>
                <th></th>
                <th>Purchases Validation Status</th>
                <th>Purchased Product to Inventory Status</th>
            </tr>
        </thead>
       
        <tbody>

        @foreach($purchaseOrders as $val)

            <?php
                $po = App\PurchaseOrder\PurchaseOrder::find($val['id']);
                $purchases = $po->purchases;  
            ?>
          
           <tr class="tbl-po-row">
             <td><input type='checkbox'<?php //echo (($user_level == $admin_text) ? "" : 'disabled=disabled'); ?> style='width:30px; height:20px;' class='radio_check_all po-id-checkbox' id='radio_check_all po-id-checkbox' value="{{ $val['id'] }}"></td>
             <td>{{ $val['po_code'] }}</td>
             <td>{{ date("F j, Y h:i:s A", strtotime( $val['created_at'] ) ) }}</td>
             <td style="text-align:center; font-weight:bold;">{{ number_format($val['overall_total'], 2) }}</td>
             <td style="background-color:#3276b1;text-align:center;"><a href="{{ url('purchaseOrderforPrinting').'/'.$val['id'] }}" target="_blank" style="color:#fff;" >{{ "View and Print" }}</a></td>
             
                 <?php if(count($purchases)==0){ ?>
                   <td style="background-color:#C00; text-align:center;">
                        <a href="{{ url('actualpurchases').'/'.$val['id'] }}" style="color:#fff;"> 
                          Add and Validate Purchase
                        </a>
                   </td>
                 <?php }else{ ?>
                 <td style="background-color:#25A602;text-align:center; color:#fff;">      
                     <a href="{{ url('validatedpurchase').'/'.$val['id'] }}" style="color:#fff;">      
                     Validated
                     </a>
                 </td>
                <?php } ?>

                 <?php if($val["add_toInventory_status"]){ ?>

                     <td style="background-color:#25A602;text-align:center; color:#fff; border-left: 1px solid #fff;">         
                                      Successfully added               
                     </td>

                 <?php } else{ ?>

                      <td style="background-color:#C00; text-align:center;">
                             <a href="{{ url('addpurchaseToInventoryView').'/'.$val['id'] }}" style="color:#fff;"> 
                                          Add product to Inventory               
                             </a>
                         </td>

                 <?php } ?>

              
           </tr>

        @endforeach
            
        </tbody>

    </table>

    </div>            <!-- /. PAGE INNER  -->
</div>
        
@endsection