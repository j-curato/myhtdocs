<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

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
 </body>
</html>