


<div class="page-heading"> <!-- HEADING -->
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-8 order-md-1 order-last">
                            <h3>USER PROFILE</h3>
                        </div>
                        <div class="col-12 col-md-4 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="?page=records&data=admission-list">Admission</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">New</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">USER INFORMATION</h4>
                            <HR></HR>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="basicInput">PSA Birth Certificate No.</label>
                                        <input type="text" class="form-control" id="basicInput">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="helpInputTop">LRN</label>
                                        <small class="text-muted">(<i>Learners Reference No.</i>)</small>
                                        <input type="text" class="form-control" id="helpInputTop">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                        <label for="photo">Student Photo</label>
                                        <input name="photo" type="file" class="form-control" id="photo" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label for="helpInputTop">Name</label>
                                <div class="col-3">                                    
                                    <input type="text" class="form-control" id="basicInput" placeholder="Last Name">  
                                </div>
                                <div class="col-3">    
                                    <input type="text" class="form-control" id="basicInput" placeholder="First Name">                                        
                                </div>
                                <div class="col-3">    
                                    <input type="text" class="form-control" id="basicInput" placeholder="Middle Name">                                        
                                </div>
                                <div class="col-1">    
                                    <input type="text" class="form-control" id="basicInput" placeholder="Jr., II">                                        
                                </div>
                            </div>
                            
                            <br/>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="basicInput">Birthday</label>
                                        <input type="date"  id="birth-date" class="form-control" name="birthday" placeholder="">
                                    </div>
                                </div>
                       

                                <div class="col-md-1">
                                    <div class="form-group ">
                                        <label for="basicInput">Age</label>
                                        <input type="text" id="age-count" class="form-control" name="age" placeholder="0">
                                    </div>
                                </div>

                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="basicInput">Gender</label>
                                        <select class="form-control" name="gender" id="gender">   
                                            <option value="" disabled selected>Select</option>                                         
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>                                           
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="basicInput">Mother Tongue</label>
                                        <input type="text" id="" class="form-control" name="" placeholder="" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="helpInputTop">Learning Modality</label>
                                        <select class="form-control" name="Modality" id="Modality">   
                                            <option value="" disabled selected>Select</option>                                         
                                            <option value="Male">Online Class</option>
                                            <option value="Female">Modular</option>  
                                            <option value="Female">Blended</option>                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                    <label for="helpInputTop">IP</label>
                                        <small class="text-muted">(<i>Ethnic Group</i>)</small>
                                        <input type="text" class="form-control" id="ethnicity">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="helpInputTop">Religion</label>
                                        <input type="text" class="form-control" id="religion">
                                    </div>
                                </div>
                            </div>
                            


                            
                        </div>
                    </div>

                </section>

                 <!-- Basic Vertical form layout section start -->
                 <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-5 col-12">
                            <div class="card"><!----------------- ADDRESS CARD --------------------------->
                                <div class="card-header">
                                    <h4 class="card-title">ADDRESS</h4>
                                    <HR></HR>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="house-number-vertical">House Number and Street</label>
                                                            <input type="text" id="house-info-vertical"
                                                                class="form-control" name="house-number-street"
                                                                placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="barangay-info-vertical">Barangay</label>
                                                            <input type="text" id="barangay-info-vertical"
                                                                class="form-control" name="barangay"
                                                                placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="city-info-vertical">City / Municipality</label>
                                                            <input type="text" id="city-info-vertical"
                                                                class="form-control" name="city-municipality"
                                                                placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="province-info-vertical">Province</label>
                                                            <input type="text" id="province-info-vertical"
                                                                class="form-control" name="province-municipality"
                                                                placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="zipcode-info-vertical">ZIP Code</label>
                                                            <input type="number" id="zipcode-info-vertical"
                                                                class="form-control" name="zipcode"
                                                                placeholder="">
                                                        </div>
                                                    </div>
                                                   
                                                   
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-12">
                            <div class="card"><!-- ----------------PARENT'S / GUARDIAN INFORMATION--------------------- -->
                                <div class="card-header">
                                    <h4 class="card-title">PARENT'S / GUARDIAN INFORMATION</h4>
                                    <HR></HR>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="father-name-vertical">Father's Name (Last Name, First Name, Middle Name)</label>
                                                            <input type="text" id="father-id-vertical"
                                                                class="form-control" name="fname"
                                                                placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="mother-name-vertical">Mother's Name (Last Name, First Name, Middle Name)</label>
                                                            <input type="text" id="mother-id-vertical"
                                                                class="form-control" name="mname"
                                                                placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="row">                                           
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="Tel-info-vertical">Telephone No.</label>
                                                                <input type="text" id="Tel-id-vertical"
                                                                    class="form-control" name="telephone"
                                                                    placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                                <label for="cellphone-info-vertical">Cellphone No.</label>
                                                                <input type="text" id="cellphone-id-vertical"
                                                                    class="form-control" name="cellphone"
                                                                    placeholder="">
                                                                    <br>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                   
                                                    <h4 class="card-title">GUARDIAN (if not parent)</h4>
                                                    <HR></HR>        
                                                    <div class="row">                                           
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="guardian-info-vertical">Guardian</label>
                                                                <input type="text" id="guardian-id-vertical"
                                                                    class="form-control" name="guardian"
                                                                    placeholder="Last Name, First Name, Middle Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                        <div class="form-group">
                                                                <label for="Relationship-info-vertical">Relationship</label>
                                                                <input type="text" id="Relationship-id-vertical"
                                                                    class="form-control" name="Relationship"
                                                                    placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>                            
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic Vertical form layout section end -->


               
     </div> 


        <!----------------------------------------------- FOR MODAL --------------------------------------------------------------------->
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to pull a request and enroll this student?
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Request has been sent to the School Admin.
      </div>
      <div class="modal-footer">
        <a href="?page=records&data=admission-list"><button class="btn btn-primary">Done</button></a>
      </div>
    </div>
  </div>
</div>

       