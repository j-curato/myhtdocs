<?php 
$po_unserialize = unserialize($purchaseOrder['purchase_orders']);
?>

@include('partials.external_stylesheets')
@include('partials.instyles')

<form class="form-horizontal prod-form" id="prod-form" method="POST" style="background-color: #e2e2e2;" >
 <fieldset>
<?php  
  $supplier = App\Supplier\Supplier::find($purchaseOrder['supplier_id']);
?>            
<!-- Start 2 Columns DIV --> 
<div id="wrapper_po">
  <div id="content_po">
    <h3 style="padding:10px;"><strong>PRO MEDICAL SOLUTION</strong></h3>
    <p style="padding: 5px;">The following number must appear on all related </br>correspondence, shipping papers, and invoices:</p>
    <h5 style="padding: 10px;"><span style="font-weight:bold;">SHIP FROM:</br>
              {{ $supplier['name'] }}</span></br>
              {{ $supplier['address'] }}</br>
              {{ $supplier['contact_number'] }}
    </h5>
  </div>
  <div id="sidebar_po">
    <address></address>
    <p style="padding: 10px;font-weight:bold;">P.O.# - <span class="po-code">{{ $purchaseOrder['po_code'] }}</span></p>
    </br>
    </br>
    
    <h5 style="padding: 10px;"><span style="font-weight:bold;">SHIP TO:</br>
            PRO MEDICAL SOLUTION</span></br>
            C/O NECOTRES J. LORA</br>
            DOOR 4, CATUBAG APARTMENT</br>
            BRGY.2 - GOLDEN RIBBON</br>
            BUTUAN CITY, PHILIPPINES</br>
            TEL: (085) 225 0313</br>
            MOBILE #: 09255016094
    </h5>
  </div>
  <div id="cleared_po"></div>
</div>
<!-- End 2 Columns DIV -->
<div class="table-responsive" style="padding:10px;">
   <table class="table table-bordered">
      <thead>
        <tr class="info">
          <th>P.O DATE</th>
          <th>REQUESTIONER</th>
          <th>SHIPPED VIA</th>
          <th>F.O.B POINT</th>
          <th>TERMS</th>
        </tr>
      </thead>
      <tbody>
        <tr class="info">
          <td>{{ date("F j, Y", strtotime($purchaseOrder['created_at'])) }}</td>
          <td></td>
          <td>{{ $purchaseOrder['shipped_via'] }}</td>
          <td></td>
          <td>{{ $purchaseOrder['terms'] }}</td>
        </tr>
      </tbody>
    </table>

    <address></address>
    <table class="table table-bordered" id="tbl-po-list">
      <thead>
        <tr class="">
          <th>QTY</th>
          <th>UNIT</th>
          <th>BRAND NAME</th>
          <th>DESCRIPTION</th>
          <th>PACKAGING</th>
          <th>UNIT PRICE</th>
          <th>TOTAL</th>
        </tr>
      </thead>
      <tbody id="po-print-list">
        <?php
          //var_dump(sizeof($po_unserialize));
          for($i=0; $i < sizeof($po_unserialize); $i++){
        ?>   

        <tr class="info">
          <td>{{ $po_unserialize[$i]['qty'] }}</td>
          <td>{{ $po_unserialize[$i]['unit'] }}</td>
          <td>{{ $po_unserialize[$i]['pharma'] }}</td>
          <td>{{ $po_unserialize[$i]['pharmaDesc'] }}</td>
          <td>{{ $po_unserialize[$i]['packaging'] }}</td>
          <td>{{ $po_unserialize[$i]['price'] }}</td>
          <td>{{ $po_unserialize[$i]['total'] }}</td>
        </tr>

        <?php } ?>
         
      </tbody>
      <tbody>

      <tr class="info">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align:center;font-weight:bold;">Freight Charge</td>
          <td>{{ $purchaseOrder['freight_charge'] }}</td>
        </tr>

        <tr class="info">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align:center;font-weight:bold;">Sales Tax</td>
          <td>0</td>
        </tr>


        <tr class="info">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align:center;font-weight:bold;">Overall Total</td>
          <td style="font-weight: bold;"><?php echo 'Php '.number_format($purchaseOrder['overall_total'], 2); ?></td>
        </tr>


      </tbody>
    </table>
  </div>

            <address></address>
          <fieldset>
        </form>
   <!-- </div>
  </div>
</div>-->

