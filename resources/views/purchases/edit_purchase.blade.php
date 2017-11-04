 @include('partials.meta_title')
 @include('partials.external_stylesheets')
 @include('partials.alert_notice_updated')


<?php 

if(isset($purchases[0])){
   $purchaseOrders = App\PurchaseOrder\PurchaseOrder::find($purchases[0]->purchase_order_id); 
 } 
   ?>

<div class="container">
<a href="{{ url('purchaseorders') }}" class="btn btn-info  active"> Back to Purchase Order List</a>

<?php if( sizeof($purchases) == 0 ){ ?>
  <h1>Validate your purchase first. Thank you.</h1>
<?php }elseif($purchaseOrders['add_toInventory_status']){ ?>
  <h1>Cannot Edit. Purchases already added in inventory. Thank you.</h1>
 <?php }else{ ?>

  <h2>Purchases</h2>
  <p></p>            
  <table class="table table-bordered" id="tbl-purchase-list">
      <thead>
        <tr>
          <th style="display:none;"></th>
          <th>BRAND NAME</th>
          <th>DESCRIPTION</th>
          <th>UNIT</th>
          <th>PACKAGING</th>
          <th>Lot</th>
          <th>Expiry Date</th>
          <th>UNIT PRICE</th>
          <th>PO QTY</th>
          <th>Add-on QTY</th>
          <th>Actual Purchase QTY</th>
          <th>PO TOTAL</th>
          <th>Actual Purchase TOTAL</th>
        </tr>

      </thead>

      <tbody>

      <form id="purchases-form">

      <input type="hidden" name="_token"  value="{{ csrf_token() }}">

      <input type="hidden" id="purchase_order_id" value="<?php echo $purchases[0]->purchase_order_id; ?>" />

        <?php 

        var_dump($purchases[0]['purchase_id']);

        $total_purchase = 0;
        $array_Purchase = array();

        for($i=0; $i < sizeof($purchases); $i++){ ?>   

        <tr class="tr-purchase">
          <td style="display:none;" class="prod-id">{{ $purchases[$i]['product_id'] }}</td>
          <td class="po-pharma">{{ $purchases[$i]['pharmaceutical'] }}</td>
          <td class="po-pharmaDesc">{{ $purchases[$i]['description'] }}</td>
          <td>{{ $purchases[$i]['unit'] }}</td>
          <td><input type="text" class="form-control purchase-packaging" name="packaging" id="inputPackaging" placeholder="Packaging" value="{{ $purchases[$i]['packaging'] }}" style="width:150px;height:40px;"/></td>
          <td><input type="text" class="form-control purchase-lot" name="lot" id="inputLot" placeholder="Lot" value="{{ $purchases[$i]['lot'] }}" style="width:150px;height:40px;"/></td>
          <td><input type="date" class="form-control  purchase-xpiryDate" name="expiry_date_month" id="inputExpiry" placeholder="Month" value="{{ $purchases[$i]['expiry_date_month'] }}" style="width:200px;height:40px;" /></td>
          <td><input type="text" class="form-control po-price" name="price" value="{{ $purchases[$i]['unit_price'] }}" style="width:150px;height:40px;"/></td>
          <td class="po-qty">{{ $purchases[$i]['po_quantity'] }}</td>
          <td><input type="text" class="form-control purchase-addon-qty" name="add_on_quantity" value="{{ $purchases[$i]['add_on_quantity'] }}" style="width:70px;height:40px;"/></td>
          <td><input type="number" class="form-control purchase-qty" style="width:100%;height:35px;" value="0" title="{{ $purchases[$i]['actual_purchase_quantity'] }}" /></td>
          <!--<td class="po-price"></td>-->
          <td class="po-total">{{ $purchases[$i]['po_total'] }}</td>
          <td><input type="text" class="form-control purchase-total" value="{{ $purchases[$i]['purchase_total_amount'] }}" disabled=disabled /></td>
          <td style="display:none;" class="purchase-ID">{{ $purchases[$i]['purchase_id'] }}</td>
        </tr>

       <?php $total_purchase += $purchases[$i]['purchase_total_amount']; } ?>

     </form>    

      </tbody>

      <tbody>

      <tr>
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
          <td>{{ $purchaseOrders['freight_charge'] }}</td>
          <td><input type="text" class="form-control purchase-freight-charge" id="purchase-freight-charge" value="<?php echo $purchases[0]->freight_charge; ?>"  /></td>
        </tr>

        <tr>
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
          <td><input type="number" class="form-control purchase-qty" value="0" disabled=disabled /></td>
        </tr>


        <tr>
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
          <td style="font-weight: bold;"><?php echo 'Php '.number_format($purchaseOrders['overall_total'], 2); ?></td>
          <td style="font-weight: bold;"><input type='text' name='overall-totalPurchases' class='form-control' id="overall-totalPurchases" style='width:100px;'  value='<?php echo number_format($total_purchase + $purchases[0]->freight_charge, 2); ?>' disabled=disabled /></td>
        </tr>


      </tbody>
    </table>
    <button id="update-purchases-button" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Update Purchase</button>

    <?php } ?>

</div>

 @include('partials.jscripts')
