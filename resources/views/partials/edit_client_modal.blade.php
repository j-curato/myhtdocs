<div class="modal fade bs-example-modal-lg edit-client-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color: #343D46;">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #fff;">&times;</span></button>
            <h2 style="padding:10px; color: #fff;">Clients Adding Form</h2>
            <address></address>
            <form class="form-horizontal client-form" id="update-client-form" method="POST" style="background-color: #e2e2e2;" >
              
              <fieldset>

                 @include('partials.alert_notice_updated')

                <address></address>
                <input style='width:100px; height:50px;' type="hidden" class="form-control" id="clientID" name="id" value=""/>
                
    
                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Client Name</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="client_name" id="editName" placeholder="Client name" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">TIN</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="TIN" id="editTIN" placeholder="TIN" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Client Address</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="client_address" id="editAddress" placeholder="Client Address" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Business Style</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="business_style" id="editBusinessStyle" placeholder="Business Style" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Terms/P.O</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="terms" id="editTerms" placeholder="Terms/P.O" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                
                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">OSCA/PWD ID No.</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="osca_pwd_id" id="editOsca" placeholder="OSCA/PWD ID No." value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

               
                 <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-primary update-client">Update</button>
                    <button class="btn btn-default">Cancel</button>
                  </div>
                </div>
               
              </fieldset>
            </form>
    </div>
  </div>
</div>
<!-- End Modal prod Adding modal form -->