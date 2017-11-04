<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php $totalSales = 0; ?>
@foreach($sales as $val)
    <?php $totalSales+=$val->amount; ?>
@endforeach

<table>
     <tbody>
         <tr>
             <td style="font-weight:bold;">Total Sales</td>
             <td style="color:#fff; text-align:center;background-color:#25A602;">Php <?php echo number_format( $totalSales, 2 ); ?></td>
         </tr>
     </tbody>
 </table>

 <table>
  <tbody>
   <thead>
    <tr>
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
    </tr>
  </thead>
  @foreach($sales as $val)
  <?php $clients = App\Client\Client::find($val->client_id); ?>
  <tr class="tbl-sales-row">
             <td>{{ date("F j, Y", strtotime($val->created_at)) }}</td>
             <td>{{ $clients['client_name'] }}</td>
             <td>{{ $val->articles }}</td>
             <td>{{ $val->lot_num }}</td>
             <td>{{ $val->brand }}</td>
             <td>{{ $val->unit }}</td>
             <td style="text-align:center;">{{ $val->expiry_date_month }}</td>
             <td style="text-align:center;">{{ $val->quantity }}</td>
             <td style="text-align:center;">{{ $val->unit_price }}</td>  
             <td style="color:#fff; text-align:center;<?php echo (( $val->sales_status ) ? "background-color:#25A602": "background-color:#C00" ); ?>"> {{ number_format($val->amount, 2) }}</td>
    </tr>
  @endforeach
 </tbody>
</table>
</body>
</html>