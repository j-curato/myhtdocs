<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php $maxSalesID = App\Sale\Sale::max('sales_number'); ?>
<!-- Modal prod Adding Form -->

 <?php $totalInventory = 0; ?>

 @foreach($inventory as $val)
    <?php $totalInventory += $val->unit_price * $val->total_qty; ?>
 @endforeach

 <table>
     <tbody>
         <tr>
             <td style="font-weight:bold;">Total Inventory</td>
             <td style="color:#fff; text-align:center;background-color:#25A602;">Php <?php echo number_format( $totalInventory, 2 ); ?></td>
         </tr>
     </tbody>
 </table>
   
      
 <table id="table-inv-contents" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>Unit</th>
                <th>Lot number</th>
                <th>Price</th>
                <th>Date Added</th>
                <th>Quantity</th>
                <th>Expiry Date</th>
                <th>Total Amount (Php)</th>
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
             <td>{{ $val->products->pharmaceutical }}</td>
             <td>{{ $val->products->description }}</td>
             <td>{{ $val->products->type }}</td>
             <td>{{ $val->products->unit }}</td>
             <td>{{ $val->purchases->lot }}</td>
             <td>{{ $val->unit_price }}</td>
             <td>{{ $val->created_at }}</td>
            
             <td class="inv-quantity" style="color:#fff; text-align:center;border-right: 1px solid #fff; <?php echo (( $val->total_qty <= 50 ) ? "background-color:#C00" : "background-color:#25A602" ); ?>">
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
           </tr>

        @endforeach
            
        </tbody>

      </table>

    </div>            <!-- /. PAGE INNER  -->
   </div>
  </body>
 </html>