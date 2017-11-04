<!-- Modal Creating Purchase Order-->
<div class="modal fade bs-example-modal-lg create-salesInvoice-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color:#fff;">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #fff;">&times;</span></button>

     <input type="hidden" id="numberOfSalesItem" value="" />

        <form class="form-horizontal prod-form" id="prod-form" method="POST" style="background-color: #e2e2e2;" >
          <fieldset>
<!-- Start 2 Columns DIV --> 
            <div style="margin:auto;" id="wrapper_po">
                <h3 style="line-height:0.2em;text-align:center;font-weight:bold;">PRO MEDICAL SOLUTION</h3>
                <p class="promed-address">Door 4 Catubag Apt Golden Ribbon, Butuan City</p>
                <p class="promed-address"><strong>NECOTRES J.LORA</strong> - Proprietor</p>
                <p class="promed-address">VAT Reg. TIN 420-314-421-000</p>
                <input type="text" style="width:120px; height:40px; float:right;" name="sales_number" class="form-control sales_number" placeholder="Sales # here" value="<?php echo ++$maxSalesID; ?>" disabled=disabled>
            </div> 
            <!-- End 2 Columns DIV -->
            <?php
              $clientList = App\Client\Client::select('id', 'client_name')->get();
              $agentItems = App\Agent\Agent::select(DB::raw("concat (fname, ' ', lname) as full_name,id"))->get();
            ?>

            <div class="table-responsive" style="padding:10px;">

                <h4><strong>SALES INVOICE</strong></h4>

            <form method="post" id="sales-details">
                 <table class="table table-bordered tbl-sales-details">

                      <tr class="info">
                        <td>Agent Name:</td>
                        <td>
                          <select name="agents"  class="form-control" id="agentsID" style="width:400px;">
                                 <option value="0">Select an agent</option>
                                 <?php for($i=0;$i<count($agentItems);$i++){ ?>
                                 <option value="<?php echo $agentItems[$i]['id']; ?>"><?php echo $agentItems[$i]['full_name']; ?></option>
                                 <?php } ?>
                          </select>
                        </td>
                      </tr>

                      <tr class="info">
                        <td>Sold to:</td>
                        <td>
                          <select name="clients"  class="form-control" id="clientsID" style="width:400px;">
                               <option value="0">Select a client</option>
                               <?php for($i=0;$i<count($clientList);$i++){ ?>
                               <option value="<?php echo $clientList[$i]['id']; ?>"><?php echo $clientList[$i]['client_name']; ?></option>
                               <?php } ?>
                          </select>
                        </td>
                        <td>Date:</td>
                        <td><input type="text" name="sales_date" class="form-control date-sold" value="" disabled="true"></td>
                      </tr>

                      <tr class="info">
                        <td>TIN:</td>
                        <td><input type="text" name="TIN" class="form-control TIN" value="" disabled="true"></td>
                        <td>Terms/P.O. :</td>
                        <td><input type="text" name="terms_po" class="form-control sales-terms" value="" disabled="true"></td>
                      </tr>

                      <tr class="info">
                        <td>Address:</td>
                        <td><input type="text" name="address" class="form-control company-address" value="" disabled="true"></td>
                        <td>OSCA/PWD ID No. :</td>
                        <td><input type="text" name="osca_pwd_id" class="form-control osca-pwd" value="" disabled="true"></td>
                      </tr>

                      <tr class="info">
                        <td>Busn. Style</td>
                        <td><input type="text" name="business_style" class="form-control busn-style" value="" disabled="true"></td>
                        <td>Cardholder's Signature:</td>
                        <td></td>
                      </tr>

                  </table>
              </form>

              <div id="loading">
                <img id="createInvoiceLoading-image" style="display:none;" src="promed_admin\assets\img\loading2.gif" alt="Loading..." />
              </div>

                <?php $products = App\Product\Product::all(); ?>


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
                      <th>Brand Type</th>
                      <th>Articles</th>
                      <th>Unit</th>
                      <th>Unit Price</th>
                      <th>Qty</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody id="salesInvoice-create">
                  </tbody>
                  <tbody>

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
                      <td><input type='text' name='total-amountDue' class='form-control' id="total-amountDue" style='width:100px;'  value='0' disabled=disabled /></td>
                    </tr>


                  </tbody>
                </table>
                <address></address>
                        <div class="alert alert-dismissable alert-success alert-saveSales-success">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                              <center><h4><strong>Success:</strong> Sales Invoice successfully created.</h4></center>
                        </div>
                <button id="save-sales-button" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Save Sales Invoice</button>
                <!--<button id="print-po-button" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Print Purchase Order</button>-->
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>

<!-- End of Modal PO-->