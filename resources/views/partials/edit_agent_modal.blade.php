<div class="modal fade bs-example-modal-lg edit-agent-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color: #343D46;">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #fff;">&times;</span></button>
            <h2 style="padding:10px; color: #fff;">Agents Adding Form</h2>
            <address></address>
            <form class="form-horizontal update-agent-form" id="update-agent-form" method="POST" style="background-color: #e2e2e2;" >
              <fieldset>

                <div class="alert alert-dismissable alert-success alert-notice-success-update">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <center><h4><strong>Success:</strong> Agent successfully updated.</h4></center>
                </div>

                <address></address>
                <input style='width:100px; height:50px;' type="hidden" class="form-control" id="agentID" name="id" value=""/>
                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">First Name</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="fname" id="updateFname" placeholder="Agent First Name" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Last Name</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="lname" id="updateLname" placeholder="Agent Last Name" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                <div class="form-group">
                <label for="inputSponsors" class="col-lg-2 control-label">Sex</label>
                <div class="col-lg-10">
                <select class="form-control" style="width:150px;height:40px;" name="sex" id="updateSex"> 
                   <option value="0">Select sex</option>
                   <option value="Male">Male</option>
                   <option value="Female">Female</option>
                  </select>
                </div>
              </div>

               <div class="form-group">
                <label for="inputSponsors" class="col-lg-2 control-label">Age</label>
                <div class="col-lg-10">
                <select class="form-control" style="width:150px;height:40px;" name="age" id="updateAge">
                   <option value="0">Select age</option>
                  <?php for($i=18; $i<=60; $i++){ ?>
                   <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>

                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Address</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="address" id="updateAddress" placeholder="Agent Address" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Contact Number</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="contact_num" id="updateContactNum" placeholder="Contact #" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                
                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Date of Birth</label>
                  <div class="col-lg-10">
                    <input type="date" class="form-control" name="date_of_birth" id="updateDateofBirth"  value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

               
                 <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-primary update-agent">Submit</button>
                    <button class="btn btn-default">Cancel</button>
                  </div>
                </div>
               
              </fieldset>
            </form>
    </div>
  </div>
</div>
<!-- End Modal prod Adding modal form -->