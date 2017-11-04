<div class="modal fade bs-example-modal-lg add-prod-pharma-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color: #343D46;">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #fff;">&times;</span></button>
            <h2 style="padding:10px; color: #fff;">Product Adding Form</h2>
            <address></address>
            <form class="form-horizontal prod-form" id="prod-form" method="POST" style="background-color: #e2e2e2;" >
               <input type="hidden" name="_token"  value="{{ csrf_token() }}">
              <fieldset>

                <div class="alert alert-dismissable alert-success alert-addprod-success">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <center><h4><strong>Success:</strong> Product successfully added.</h4></center>
                </div>

                <address></address>
    
                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Product Name</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="pharmaceutical" id="inputPharmaceutical" placeholder="Product name" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Description</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="description" id="inputDescription" placeholder="Description" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputType" class="col-lg-2 control-label">Category</label>
                  <div class="col-lg-10">
                  <select class="form-control" name="category" id="inputCategory" style="width:260px;height:40px;">
                    <!--<option>Select category</option>-->
                    <option>Pharma</option>
                    <!--<option>Medical and Lab Supplies</option>-->
                  </select>
                  </div>
                </div>

                <div id="loading">
                  <img id="loading-image" style="display:none;" src="{{ asset('promed_admin/assets/img/loading2.gif') }}" alt="Loading..." />
                </div>

                <div class="form-group">
                  <label for="inputType" class="col-lg-2 control-label">Type</label>
                  <div class="col-lg-10">
                  <select class="form-control" name="type" id="inputType" style="width:260px;height:40px;">
                    <option>Select Type</option>
                    <option>Branded</option>
                    <option>Generics</option>
                  </select>
                  </div>
                </div>

              
                <div class="form-group">
                  <label for="inputUnit" class="col-lg-2 control-label">Unit</label>
                  <div class="col-lg-10">
                  <select class="form-control" name="unit" id="inputUnit" style="width:260px;height:40px;">
                    <option>Select unit</option>
                    <option>Tablet</option>
                    <option>Capsule</option>
                    <option>Boxes</option>
                    <option>Btls</option>
                    <option>Vials</option>
                    <option>Amps</option>
                    <option>Pcs</option>
                    <option>Set</option>
                  </select>
                  </div>
                </div>
   
                <div class="form-group">
                  <label for="inputVenue" class="col-lg-2 control-label">Price</label>
                  <div class="col-lg-10">
                    <input type="number" class="form-control" name="price" id="inputPrice" placeholder="Price" value="" style="width:260px;height:40px;" required>
                  </div>
                </div> 
               
                 <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-primary submit-prod" id="submit-prod">Submit</button>
                    <button class="btn btn-default">Cancel</button>
                  </div>
                </div>
               
              </fieldset>
            </form>
    </div>
  </div>
</div>
<!-- End Modal prod Adding modal form -->