<div class="modal fade bs-example-modal-lg add-supp-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color: #343D46;">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #fff;">&times;</span></button>
            <h2 style="padding:10px; color: #fff;">Supplier Adding Form</h2>
            <address></address>
            <form class="form-horizontal supp-form" id="supp-form" method="POST" style="background-color: #e2e2e2;" >
               <input type="hidden" name="_token"  value="{{ csrf_token() }}">
              <fieldset>

                <div class="alert alert-dismissable alert-success alert-addsupp-success">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <center><h4><strong>Success:</strong> Supplier successfully added.</h4></center>
                </div>

                <address></address>
                
                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Supplier Name</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="name" id="inputName" placeholder="Supplier name" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Supplier Address</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Address" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                <div id="loading">
                  <img id="supplierLoading-image" style="display:none;" src="promed_admin\assets\img\loading2.gif" alt="Loading..." />
                </div>

                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Contact Number</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="contact_number" id="inputContact" placeholder="Contact Number" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">TIN</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="TIN" id="inputTIN" placeholder="TIN" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

               
                 <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-primary submit-supp" id="submit-supp">Submit</button>
                    <button class="btn btn-default">Cancel</button>
                  </div>
                </div>
               
              </fieldset>
            </form>
    </div>
  </div>
</div>
<!-- End Modal prod Adding modal form -->