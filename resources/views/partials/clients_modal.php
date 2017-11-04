<div class="modal fade bs-example-modal-lg add-clients-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color: #343D46;">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #fff;">&times;</span></button>
            <h2 style="padding:10px; color: #fff;">Clients Adding Form</h2>
            <address></address>
            <form class="form-horizontal client-form" id="client-form" method="POST" style="background-color: #e2e2e2;" >
               <input type="hidden" name="_token"  value="{{ csrf_token() }}">
              <fieldset>

                <div class="alert alert-dismissable alert-success alert-addclient-success">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <center><h4><strong>Success:</strong> Client successfully added.</h4></center>
                </div>

                <address></address>
    
                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Client Name</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="client_name" id="inputName" placeholder="Client name" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">TIN</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="TIN" id="inputAddress" placeholder="TIN" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Client Address</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="client_address" id="inputAddress" placeholder="Client Address" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                <div id="loading">
                  <img id="clientsLoading-image" style="display:none;" src="promed_admin\assets\img\loading2.gif" alt="Loading..." />
                </div>

                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Business Style</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="business_style" id="inputAddress" placeholder="Business Style" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Terms/P.O</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="terms" id="inputAddress" placeholder="Terms/P.O" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                
                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">OSCA/PWD ID No.</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="osca_pwd_id" id="inputContact" placeholder="OSCA/PWD ID No." value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

               
                 <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-primary submit-client" id="submit-client">Submit</button>
                    <button class="btn btn-default">Cancel</button>
                  </div>
                </div>
               
              </fieldset>
            </form>
    </div>
  </div>
</div>
<!-- End Modal prod Adding modal form -->