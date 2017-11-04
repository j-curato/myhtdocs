 @include('partials.meta_title')
 @include('partials.external_stylesheets')

<?php //$po_unserialize = unserialize($purchaseOrders['purchase_orders']); ?>
<div class="container">
<a href="{{ url('purchaseorders') }}" class="btn btn-info  active"> Back to Purchase Order List</a>

  <h2>Purchases</h2>
   
  <address></address>

  <table class="table table-bordered" id="tbl-purchase-list">

      <thead>
      
        <tr>
          <th style="visibility:hidden"></th>
          <th>PO QTY</th>
          <th>Actual Purchase QTY</th>
          <th>Add-on QTY</th>
          <th>UNIT</th>
          <th>BRAND NAME</th>
          <th>DESCRIPTION</th>
          <th>PACKAGING</th>
          <th>Lot</th>
          <th>Expiry Date</th>
          <th>UNIT PRICE</th>
          <th>PO TOTAL</th>
          <th>Actual Purchase TOTAL</th>
        </tr>

      </thead>

      <tbody>

        <?php
          $total_purchase = 0;
          $array_Purchase = array();
          for($i = 0; $i < count($purchases); $i++){
        ?>   

        <tr class="tr-purchase">
          <td style="visibility:hidden;" class="prod-id">{{ $purchases[$i]['product_id'] }}</td>
          <td class="po-qty">{{ $purchases[$i]['po_quantity'] }}</td>
          <td>{{ $purchases[$i]['actual_purchase_quantity'] }}</td>
          <td>{{ $purchases[$i]['add_on_quantity'] }}</td>
          <td>{{ $purchases[$i]['unit'] }}</td>
          <td>{{ $purchases[$i]['pharmaceutical'] }}</td>
          <td>{{ $purchases[$i]['description'] }}</td>
          <td>{{ $purchases[$i]['packaging'] }}</td>
          <td>{{ $purchases[$i]['lot'] }}</td>
          <td>{{ $purchases[$i]['expiry_date_month'] }}</td>
          <td class="po-price">{{ $purchases[$i]['unit_price'] }}</td>
          <td class="po-total">{{ $purchases[$i]['po_total'] }}</td>
          <td>{{ $purchases[$i]['purchase_total_amount'] }}</td>
        </tr>

        <?php $total_purchase += $purchases[$i]['purchase_total_amount']; } ?>

      </tbody>

      <tbody>

      <tr>
          <td style="visibility:hidden;"></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align:center;font-weight:bold;">Freight Charge</td>
          <td><?php echo $purchases[0]->purchase_orders->freight_charge; ?></td>
          <td><?php echo $purchases[0]->freight_charge; ?></td>
        </tr>

        <tr>
          <td style="visibility:hidden;"></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align:center;font-weight:bold;">Sales Tax</td>
          <td>0</td>
          <td>0</td>
        </tr>


        <tr>
          <td style="visibility:hidden;"></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align:center;font-weight:bold;">Overall Total</td>
          <td style="font-weight: bold;"><?php echo number_format($purchases[0]->purchase_orders->overall_total, 2); ?></td>
          <td style="font-weight: bold;"><?php echo number_format($total_purchase + $purchases[0]->freight_charge, 2); ?></td>
        </tr>


      </tbody>
    </table>
    
</div>

 @include('partials.jscripts')



