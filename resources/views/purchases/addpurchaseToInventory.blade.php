 @include('partials.meta_title')
 @include('partials.external_stylesheets')
 @include('partials.alert_notice')


<?php //$po_unserialize = unserialize($purchaseOrders['purchase_orders']); ?>
<div class="container">
  <a href="{{ url('purchaseorders') }}" class="btn btn-info  active"> Back to Purchase Order List</a>
<?php if( sizeof($purchases) == 0 ){ ?>
  <h1>Validate your purchase first. Thank you.</h1>
<?php }else{ ?>
  <h2>Purchases</h2>  
  <address></address>

  <div id="loading">
    <img id="purchasesToInventoryLoading-image" style="display:none;" src="{{ asset('promed_admin/assets/img/loading2.gif') }}" alt="Loading..." />
  </div>

  <table class="table table-bordered" id="tbl-purchaseInventory-list">
      <thead>
        <tr>
          <th style="visibility:hidden;"></th>
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

          for($i = 0; $i < count($purchases); $i++){
            $array_prodID[$i] =  $purchases[$i]['product_id'];
            $array_poID[$i] =  $purchases[$i]['purchase_order_id'];
            $array_purchaseID[$i] =  $purchases[$i]['id'];
            $array_purchasePrice[$i] =  $purchases[$i]['unit_price'];
            $array_purchaseQuantity[$i] =  $purchases[$i]['actual_purchase_quantity'];
            $array_purchaseAddOnQty[$i] =  $purchases[$i]['add_on_quantity'];
            $array_purchaseExpiryDate[$i] =  $purchases[$i]['expiry_date_month'];

        ?>   

        <tr class="tr-purchaseInventory">
          <td class="purchase_prod_id" style="visibility:hidden;">{{ $purchases[$i]['product_id'] }}</td>
          <td class="po-qty">{{ $purchases[$i]['po_quantity'] }}</td>
          <td class="purchase_actual_quantity">{{ $purchases[$i]['actual_purchase_quantity'] }}</td>
          <td class="purchase_add_on_qty">{{ $purchases[$i]['add_on_quantity'] }}</td>
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
  <button id="purchase_toInventoryID" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Save purchases to Inventory</button>
 <?php } ?>
</div>
 @include('partials.jscripts')



