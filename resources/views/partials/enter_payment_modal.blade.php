<div class="modal fade bs-example-modal-lg enter-payment-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color: #343D46;">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #fff;">&times;</span></button>
            <h2 style="padding:10px; color: #fff;">Payment Form</h2>
            <address></address>
            <form class="form-horizontal enter-payment-form" id="enter-payment-form" method="POST" style="background-color: #e2e2e2;" >
               <input type="hidden" name="_token"  value="{{ csrf_token() }}">
              <fieldset>

              @include('partials.alert_payment_saved')

                <address></address>

               <input type="hidden" name="sales_number" id="salesNumID" value=""/>
               <input type="hidden" name="client_id" id="client_id" value=""/>

               <div class="form-group">
                  <label for="inputORNumber" class="col-lg-2 control-label">OR #</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="orNumber" id="orNumberID" placeholder="Official Receipt Number" value="" style="width:260px;height:40px;"/>
                  </div>
                </div>

               <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Customer Name:</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="customerName" id="customerNameID" value="" style="width:260px;height:40px;"/>
                  </div>
                </div>

                <div id="loading">
                  <img id="paymentLoading-image" style="display:none;" src="promed_admin\assets\img\loading2.gif" alt="Loading..." />
                </div>

                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Total Balance:</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="customerBalancePayment" id="customerBalanceID" value="" style="width:260px;height:40px;"/>
                  </div>
                </div>
    
                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Enter Payment</label>
                  <div class="col-lg-10">
                    <input type="number" class="form-control" name="amount_paid" id="payment-value-id" placeholder="0.00" value="" style="width:260px;height:40px;" required>
                  </div>
                </div>

               
                 <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-primary submit-payment" id="submit-payment">Submit Payment</button>
                    <button class="btn btn-default">Cancel</button>
                  </div>
                </div>
               
              </fieldset>
            </form>
    </div>
  </div>
</div>
<!-- End Modal prod Adding modal form -->