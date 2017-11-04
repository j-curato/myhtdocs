<div class="modal fade bs-example-modal-lg edit-supp-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color: #343D46;">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #fff;">&times;</span></button>
            <h2 style="padding:10px; color: #fff;">Supplier Adding Form</h2>
            <address></address>
            <form class="form-horizontal supp-form" id="update-supp-form" method="POST" style="background-color: #e2e2e2;" >
              
              <fieldset>

                @include('partials.alert_notice_updated')

                <address></address>
                <input style='width:100px; height:50px;' type="hidden" class="form-control" id="supplierID" name="id" value=""/>
                
                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Supplier Name</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="name" id="updateName" placeholder="Supplier name" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Supplier Address</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="address" id="updateAddress" placeholder="Address" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                
                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Contact Number</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="contact_number" id="updateContact" placeholder="Contact Number" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">TIN</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="TIN" id="updateTIN" placeholder="TIN" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

               
                 <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-primary update-supp">Update</button>
                    <button class="btn btn-default">Cancel</button>
                  </div>
                </div>
               
              </fieldset>
            </form>
    </div>
  </div>
</div>
<!-- End Modal prod Adding modal form -->