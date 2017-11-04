<div class="modal fade bs-example-modal-lg edit-prod-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color: #343D46;">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #fff;">&times;</span></button>
            <h2 style="padding:10px; color: #fff;">Product Edit Form</h2>
            <address></address>
            <form class="form-horizontal edit-prod-form" id="edit-prod-form" method="POST" style="background-color: #e2e2e2;" >
               <input type="hidden" name="_token"  value="{{ csrf_token() }}">
              <fieldset>

                <address></address>
                @include('partials.alert_notice_updated')
                <input style='width:100px; height:50px;' type="hidden" class="form-control" id="edit-prodID" name="ID" value=""/>
    
                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Product Name</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="pharmaceutical" id="editPharmaceutical" placeholder="Product name" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Description</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="description" id="editDescription" placeholder="Description" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputType" class="col-lg-2 control-label">Category</label>
                  <div class="col-lg-10">
                  <select class="form-control" name="category" id="editCategory" style="width:260px;height:40px;">
                    <option>Select category</option>
                    <option>Pharma</option>
                    <option>Medical and Lab Supplies</option>
                  </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputType" class="col-lg-2 control-label">Type</label>
                  <div class="col-lg-10">
                  <select class="form-control" name="type" id="editType" style="width:260px;height:40px;">
                    <option>None</option>
                  </select>
                  </div>
                </div>

                 <div id="loading">
                  <img id="update-loading-image" style="display:none;" src="{{ asset('promed_admin/assets/img/loading2.gif') }}" alt="Loading..." />
                 </div>

                <div class="form-group">
                  <label for="inputUnit" class="col-lg-2 control-label">Unit</label>
                  <div class="col-lg-10">
                  <select class="form-control" name="unit" id="editUnit" style="width:260px;height:40px;">
                    <option>Select unit</option>
                    <option>Pcs</option>
                    <option>Boxes</option>
                    <option>Tubes</option>
                    <option>Rolls</option>
                    <option>Trays</option>
                    <option>Vials</option>
                    <option>Btls</option>
                    <option>Tablet</option>
                    <option>Capsule</option>
                    <option>Amps</option>
                    <option>Set</option>
                  </select>
                  </div>
                </div>
 
                <div class="form-group">
                  <label for="inputVenue" class="col-lg-2 control-label">Price</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="price" id="editPrice" placeholder="Price" value="" style="width:260px;height:40px;" required>
                  </div>
                </div> 

                 <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-primary" id="update-prod">Update</button>
                    <button class="btn btn-default">Cancel</button>
                  </div>
                </div>
               
              </fieldset>
            </form>
    </div>
  </div>
</div>
<!-- End Modal prod Adding modal form -->