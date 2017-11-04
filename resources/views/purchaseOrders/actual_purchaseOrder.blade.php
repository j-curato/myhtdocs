 @include('partials.meta_title')
 @include('partials.external_stylesheets')
 @include('partials.alert_notice')


<?php $po_unserialize = unserialize($purchaseOrders['purchase_orders']); ?>
<div class="container">
<a href="{{ url('purchaseorders') }}" class="btn btn-info  active"> Back to Purchase Order List</a>

  <h2>Purchases</h2>
  <p></p>      

<div id="loading">
  <img id="purchasesLoading-image" style="display:none;" src="{{ asset('promed_admin/assets/img/loading2.gif') }}" alt="Loading..." />
</div>

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

      <input type="hidden" id="purchase_order_id" value="<?php echo $purchaseOrders['id'] ?>" />
      <input type="hidden" id="numberOfItemsPos" value="<?php echo sizeof($po_unserialize) ?>" />

        <?php for($i=0; $i < sizeof($po_unserialize); $i++){ ?>   

        <tr class="tr-purchase">
          <td style="display:none;" class="prod-id">{{ $po_unserialize[$i]['id'] }}</td>
          <td class="po-pharma">{{ $po_unserialize[$i]['pharma'] }}</td>
          <td class="po-pharmaDesc">{{ $po_unserialize[$i]['pharmaDesc'] }}</td>
          <td>{{ $po_unserialize[$i]['unit'] }}</td>
          <td><input type="text" class="form-control purchase-packaging" name="packaging" id="inputPackaging" placeholder="Packaging" value="{{ $po_unserialize[$i]['packaging'] }}" style="width:150px;height:40px;"/></td>
          <td><input type="text" class="form-control purchase-lot" name="lot" id="inputLot" placeholder="Lot" value="" style="width:150px;height:40px;"/></td>
          <td><input type="date" class="form-control  purchase-xpiryDate" name="expiry_date_month" id="inputExpiry" placeholder="Month" value="" style="width:200px;height:40px;" /></td>
          <td><input type="text" class="form-control po-price" name="price" value="{{ $po_unserialize[$i]['price'] }}" style="width:150px;height:40px;"/></td>
          <td class="po-qty">{{ $po_unserialize[$i]['qty'] }}</td>
          <td><input type="text" class="form-control purchase-addon-qty" name="add_on_quantity" value="0" style="width:70px;height:40px;"/></td>
          <td><input type="number" class="form-control purchase-qty" style="width:100%;height:35px;" value="" /></td>
          <!--<td class="po-price">{{ $po_unserialize[$i]['price'] }}</td>-->
          <td class="po-total">{{ $po_unserialize[$i]['total'] }}</td>
          <td><input type="text" class="form-control purchase-total" value="0" disabled=disabled /></td>
        </tr>

        <?php } ?>

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
          <td><input type="text" class="form-control purchase-freight-charge" id="purchase-freight-charge" value="{{ $purchaseOrders['freight_charge'] }}"  /></td>
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
          <td style="font-weight: bold;"><input type='text' name='overall-totalPurchases' class='form-control' id="overall-totalPurchases" style='width:100px;'  value='0' disabled=disabled /></td>
        </tr>


      </tbody>
    </table>
    <button id="save-purchases-button" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Save Purchase</button>
</div>

 @include('partials.jscripts')
