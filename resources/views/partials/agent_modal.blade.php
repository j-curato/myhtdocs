<div class="modal fade bs-example-modal-lg add-agent-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color: #343D46;">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #fff;">&times;</span></button>
            <h2 style="padding:10px; color: #fff;">Agents Adding Form</h2>
            <address></address>
            <form class="form-horizontal agent-form" id="agent-form" method="POST" style="background-color: #e2e2e2;" >
               <input type="hidden" name="_token"  value="{{ csrf_token() }}">
              <fieldset>

                <div class="alert alert-dismissable alert-success alert-addagent-success">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <center><h4><strong>Success:</strong> Agent successfully added.</h4></center>
                </div>

                <address></address>
    
                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">First Name</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="fname" id="inputFname" placeholder="Agent First Name" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Last Name</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="lname" id="inputLname" placeholder="Agent Last Name" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                <div class="form-group">
                <label for="inputSponsors" class="col-lg-2 control-label">Sex</label>
                <div class="col-lg-10">
                <select class="form-control" style="width:150px;height:40px;" name="sex"> 
                   <option value="0">Select sex</option>
                   <option value="Male">Male</option>
                   <option value="Female">Female</option>
                  </select>
                </div>
              </div>

               <div id="loading">
                  <img id="agentsLoading-image" style="display:none;" src="promed_admin\assets\img\loading2.gif" alt="Loading..." />
                </div>

               <div class="form-group">
                <label for="inputSponsors" class="col-lg-2 control-label">Age</label>
                <div class="col-lg-10">
                <select class="form-control" style="width:150px;height:40px;" name="age">
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
                    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Agent Address" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Contact Number</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="contact_num" id="inputContactNum" placeholder="Contact #" value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

                
                <div class="form-group">
                  <label for="inputActivity" class="col-lg-2 control-label">Date of Birth</label>
                  <div class="col-lg-10">
                    <input type="date" class="form-control" name="date_of_birth" id="inputDateofBirth"  value="" style="width:260px;height:40px;" onchange="" required>
                  </div>
                </div>

               
                 <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-primary submit-agent" id="submit-agent">Submit</button>
                    <button class="btn btn-default">Cancel</button>
                  </div>
                </div>
               
              </fieldset>
            </form>
    </div>
  </div>
</div>
<!-- End Modal prod Adding modal form -->