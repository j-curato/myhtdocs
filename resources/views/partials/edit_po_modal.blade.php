<!-- Modal Creating Purchase Order-->
<div class="modal fade bs-example-modal-lg edit-po-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color:#fff;">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #fff;">&times;</span></button>
        <form class="form-horizontal prod-form" id="prod-form" method="POST" style="background-color: #e2e2e2;" >
          <fieldset>
<?php $supplier = App\Supplier\Supplier::select('id','name')->get(); ?>        
<!-- Start 2 Columns DIV --> 
<div id="wrapper_po">
  <div id="content_po">
    <h3 style="padding:10px;"><strong>PRO MEDICAL SOLUTION</strong></h3>
    <p style="padding: 10px;">The following number must appear on all related </br>correspondence, shipping papers, and invoices:</p>
    <h5 style="padding: 10px;"><span style="font-weight:bold;">SHIP FROM:</br>
    <?php //echo Form::select('supplier', $items, '',array('class' => 'form-control','id' => 'supplierID', 'style' => 'width:300px;')); ?>
    <select class="form-control" id="supplierID" style="width:400px;">
     <option value="0">Select a supplier</option>
     <?php for($i=0;$i<count($supplier);$i++){ ?>
     <option value="<?php echo $supplier[$i]['id']; ?>"><?php echo $supplier[$i]['name']; ?></option>
     <?php } ?>
    </select> 
             
    </h5>
  </div>
  <div id="sidebar_po">
    <address></address>
    <p style="padding: 10px;font-weight:bold;">P.O.# - <span class="po-code">PMS{{ date('Y') }}</span></p>
    </br>
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
          <th>Terms</th>
        </tr>
      </thead>
      <tbody>
        <tr class="info">
          <td><?php date_default_timezone_set('Asia/Manila'); echo date("F j, Y"); ?></td>
          <td></td>
          <td>
              <select class="form-control" name="shipped_via" id="po-shipped-via" style="width:100px;height:40px;">
                    <option>Select</option>
                    <option>AP</option>
                    <option>CAPEX</option>
                    <option>LBC</option>
              </select>
          </td>
          <td></td>
          <td><input type='text' name='terms' class='form-control' id="po-terms" style='width:150px;'  value='' /></td>
        </tr>
      </tbody>
    </table>

    <?php $products = App\Product\Product::all(); ?>

    <address></address>
    <table class="table table-bordered" id="tbl-po-list">
      <thead>
        <tr class="">
          <th>PACKAGING</th>
          <th>UNIT</th>
          <th>Brand Name</th>
          <th>DESCRIPTION</th>
          <th>QTY</th>
          <th>UNIT PRICE</th>
          <th>TOTAL</th>
        </tr>
      </thead>
      <tbody id="po-create">
      </tbody>
      <tbody>

      <tr class="info">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align:center;font-weight:bold;">Freight Charge</td>
          <td><input type='text' name='freight_charge' class='form-control freight-charge' id="freight-charge-id" style='width:100px;'  value='0' /></td>
        </tr>

        <tr class="info">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align:center;font-weight:bold;">Sales Tax</td>
          <td><input type='text' name='sales-tax' class='form-control' id="sales-tax" style='width:100px;'  value='0' disabled=disabled /></td>
        </tr>


        <tr class="info">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="text-align:center;font-weight:bold;">Overall Total</td>
          <td><input type='text' name='overall-total' class='form-control' id="overall-total" style='width:100px;'  value='0' disabled=disabled /></td>
        </tr>


      </tbody>
    </table>
    <address></address>
            <div class="alert alert-dismissable alert-success alert-addpo-success">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <center><h4><strong>Success:</strong> Purchase Order successfully created.</h4></center>
            </div>
    <button id="save-po-button" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Save Purchase Order</button>
    <!--<button id="print-po-button" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Print Purchase Order</button>-->
    <!--<a href="{{ url('getlatestpo') }}" target="_blank" class="btn btn-primary print-po-button"><i class="glyphicon glyphicon-print"></i> Print Purchase Order</a>-->
  </div>
 <fieldset>
</form>
</div>
</div>
</div>
<!-- End of Modal PO-->