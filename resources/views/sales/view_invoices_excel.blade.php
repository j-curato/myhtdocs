<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
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
        $paymentTotal = array();
        $fullyPaidHolder = array();
        $paymentDetails = App\Payment\Payment::select('*')->orderBy('sales_number', 'desc')->get(); 
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

 <table id="table-invoices-contents" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Sale Number</th>
                <th>Date of Purchase</th>
                <th>Customer Name</th>
                <th>Agent Name</th>
                <th>Total Amount Payables</th>
                <th>Total Amount Paid</th>
                <th>Total Balance</th>
                <th>Status</th>
                <th style="text-align:center;">Action</th>
            </tr>
        </thead>
        
        <tbody>
            
            @foreach($invoices as $key => $val)
          
            <?php $clients = App\Client\Client::find($val->client_id); ?>

               <tr class="tbl-invoices-row">
                 <td style="text-align:center;">{{ $val->sales_number }}</td>
                 <td style="text-align:center;">{{ date("F j, Y", strtotime($val->created_at)) }}</td>
                 <td style="text-align:center;">{{ $clients['client_name'] }}</td>
                 <td style="text-align:center;">{{ $val->agents['fname'].' '.$val->agents['lname'] }}</td>
                 <td style="text-align:center;">{{ number_format( $salesTotal[$val->sales_number], 2 ) }}</td>
                 <td style="text-align:center;">{{ (isset($paymentTotal[$val->sales_number]) ? number_format( $paymentTotal[$val->sales_number], 2 ) : "0") }}</td>
                 <td style="text-align:center;">{{ (isset($paymentTotal[$val->sales_number]) ? number_format( $salesTotal[$val->sales_number] - $paymentTotal[$val->sales_number], 2 ) : number_format( $salesTotal[$val->sales_number], 2 ) ) }}</td>
                 <td style="text-align:center;color:#fff;<?php echo (isset( $fullyPaidHolder[$val->sales_number] ) ? "background-color:#25A602": "background-color:#C00" ); ?>"><?php echo (isset( $fullyPaidHolder[$val->sales_number] ) ? "Fully Paid": "Collectible" ); ?></td>
               </tr>
            @endforeach
        </tbody>
       </table>
      </div>            <!-- /. PAGE INNER  -->
     </div>   
    </body>
   </html>
