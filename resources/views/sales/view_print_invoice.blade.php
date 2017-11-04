@include('partials.external_stylesheets')
@include('partials.instyles')
<!-- Modal Creating Purchase Order-->
<div>
  <div>
    <div>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #fff;">&times;</span></button>
        <form class="form-horizontal prod-form" id="prod-form" method="POST" style="background-color: #e2e2e2;" >
          <fieldset>     
<!-- Start 2 Columns DIV --> 
<div style="margin:auto;" id="wrapper_po">
    <h3 style="line-height:0.2em;text-align:center;font-weight:bold;">PRO MEDICAL SOLUTION</h3>
    <p class="promed-address">Door 4 Catubag Apt Golden Ribbon, Butuan City</p>
    <p class="promed-address"><strong>NECOTRES J.LORA</strong> - Proprietor</p>
    <p class="promed-address">VAT Reg. TIN 420-314-421-000</p>
    <h4 style="width:120px; height:40px; float:right;">NO. {{ $invoice[0]->sales_number }}</h4>

</div> 
<!-- End 2 Columns DIV -->

<div class="table-responsive" style="padding:10px;">
    
    <h4><strong>SALES INVOICE</strong></h4>
<?php $clients = App\Client\Client::find($invoice[0]->client_id); ?>
     <table class="table table-bordered tbl-sales-details">
          <tr class="info">
            <td>Sold to:</td>
            <td>{{ $clients->client_name }}</td>
            <td>Date:</td>
            <td>{{ $clients->created_at }}</td>
          </tr>
          <tr class="info">
            <td>TIN:</td>
            <td>{{ $clients->TIN }}</td>
            <td>Terms/P.O. :</td>
            <td>{{ $clients->terms }}</td>
          </tr>
          <tr class="info">
            <td>Address:</td>
            <td>{{ $clients->client_address }}</td>
            <td>OSCA/PWD ID No. :</td>
            <td>{{ $clients->osca_pwd_id }}</td>
          </tr>
          <tr class="info">
            <td>Busn. Style</td>
            <td>{{ $clients->business_style }}</td>
            <td>Cardholder's Signature:</td>
            <td></td>
          </tr>
      </table>

    <address></address>
    <table class="table table-bordered" id="tbl-sales-list">
      <thead>
        <tr class="">
          <th style="display:none;">Inventory ID</th>
          <th style="display:none;">Product ID</th>
          <th style="display:none;">Purchase Order ID</th>
          <th style="display:none;">Purchases ID</th>
          <th>Lot #</th>
          <th>Expiry Date</th>
          <th>Brand</th>
          <th>Articles</th>
          <th>Qty</th>
          <th>Unit</th>
          <th>Unit Price</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>
      <?php $total_amount = 0;  ?>
      	@foreach($invoice as $val) 
      <?php $total_amount+=$val->amount; ?> 
      	<tr class="info">
      		<td>{{ $val->lot_num }}</td>
      		<td>{{ $val->expiry_date_month }}</td>
      		<td>{{ $val->brand }}</td>
      		<td>{{ $val->articles }}</td>
      		<td>{{ $val->quantity }}</td>
      		<td>{{ $val->unit }}</td>
      		<td>{{ $val->unit_price }}</td>
      		<td>{{ number_format($val->amount, 2) }}</td>
      	</tr>
      	@endforeach
     
      <tr class="info">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align:center;font-weight:bold;">Total Sales (VAT Inclusive)</td>
          <td><input type='text' name='freight_charge' class='form-control freight-charge' id="freight-charge-id" style='width:100px;'  value='0' disabled=disabled /></td>
        </tr>

        <tr class="info">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align:center;font-weight:bold;">Less: VAT</td>
          <td><input type='text' name='sales-tax' class='form-control' id="sales-tax" style='width:100px;'  value='0' disabled=disabled /></td>
        </tr>

        <tr class="info">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align:center;font-weight:bold;">Amount Net of VAT</td>
          <td><input type='text' name='sales-tax' class='form-control' id="sales-tax" style='width:100px;'  value='0' disabled=disabled /></td>
        </tr>

        <tr class="info">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align:center;font-weight:bold;">Less: SC/PWD Discount</td>
          <td><input type='text' name='sales-tax' class='form-control' id="sales-tax" style='width:100px;'  value='0' disabled=disabled /></td>
        </tr>

        <tr class="info">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align:center;font-weight:bold;">Amount Due</td>
          <td><input type='text' name='sales-tax' class='form-control' id="sales-tax" style='width:100px;'  value='0' disabled=disabled /></td>
        </tr>

        <tr class="info">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align:center;font-weight:bold;">Total Amount Due</td>
          <td>Php {{ number_format($total_amount, 2) }}</td>
        </tr>
      </tbody>
    </table>
  </div>
 <fieldset>
</form>
</div>
</div>
</div>
<!-- End of Modal PO-->