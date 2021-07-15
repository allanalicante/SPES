            <div class="page-heading"> <!-- HEADING -->
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-8 order-md-1 order-last">
                            <h3>BASIC EDUCATION ENROLLMENT FORM</h3>
                            <p class="text-subtitle text-muted"><strong>INSTRUCTIONS: </strong> Print legibly all information in CAPITAL letters. Submit 
                                accomplished form to the Person-in-Charge / Registrar / Class Adviser.
                            </p>
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
                            <h4 class="card-title">Student Details</h4>
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
                                <div class="col-2">    
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
                                        <label for="helpInputTop">LRN</label>
                                        <small class="text-muted">(<i>Learners Reference No.</i>)</small>
                                        <input type="text" class="form-control" id="helpInputTop">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end reset-btn">
                    <button type="reset"
                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    <button type="submit" onclick="myAdd()"
                        class="btn btn-primary me-1 mb-1" style="background-color: #009933; border-color: #009933;" id="myBtn">Add</button>                        
                </div>  


                            
                        </div>
                    </div>
                </section>

            </div>