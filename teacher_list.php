<script src="asset/js/pdfexport/jquery-3.5.1.js"></script>
<?php
if (!isset($_SESSION["role"])){
  header('location: login.php');
  exit();
}
?>
<div class="page-heading">
                <div class="page-title">
                      <div class="row">
                          <div class="col-12 col-md-6 order-md-1 order-last">
                              <h3>TEACHER RECORDS  <!-- <a href="#">
                            <i style="vertical-align:middle;" class="bi bi-info-circle"></i></a> --></h3>
                              <p class="text-subtitle text-muted">For user to check Teacher list</p>
                          </div>
                          <div class="col-12 col-md-6 order-md-2 order-first">
                              <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                  <ol class="breadcrumb">
                                      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                      <li class="breadcrumb-item active" aria-current="page">Teacher List</li>
                                  </ol>
                              </nav>
                          </div>
                      </div>
                </div>
                      <section class="section brand">
                          <div class="card">
                              <div class="card-header">                    
                                    <div class="col-12 d-flex justify-content-end reset-btn">                      
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap" <?php echo($_SESSION['role']=='Admin')?'': 'hidden'?>>Add Teacher</button>                                                       
                                  </div>    
                                   
                                     <HR></HR> 
                              </div>
                                      <div class="card-body"> 
                                        <div class="table-responsive">                                 
                                                <table class="table table-bordered table-striped" id="table1" style="width: 100%">
                                                    <thead style="background-color: #435ebe; color: white;">
                                                        <tr>
                                                            <th style="display:none;">ID</th>
                                                            <th style="text-align: center;">#</th>
                                                            <th style="text-align: center;">Photo</th>
                                                            <th style="text-align: center;">Name</th>
                                                            <th style="text-align: center;">Contact</th>                                     
                                                            <th style="display:none;">Address</th>
                                                            <th style="text-align: center;">Grade to Handle</th>
                                                            <th style="text-align: center;">Status</th>
                                                            <th style="display:none;">Username</th>
                                                            <th style="display:none;">Password</th>
                                                            <th style="text-align: center;" <?php echo($_SESSION['role']=='Admin')?'': 'hidden'?>>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php

                                                    $query = "SELECT t.id, u.image, t.name, t.contactno,t.address,t.gradetohandle,u.username, u.password, u.role ,u.status
                                                    FROM teacher t
                                                    INNER JOIN users u
                                                    ON u.id = t.id
                                                    where u.role != 'Admin'";
                                                    $query_run = mysqli_query($connection, $query);
                                                    $i=1;
                                                    while($row=$query_run->fetch_assoc()){
                                                    ?>
                                                      
                                                        <tr>
                                                        <td style="display:none;"><?php echo $row['id'];?></td>
                                                        <td style="text-align: center;font-size:13px; font-weight: 600"><?php echo $i?></td>
                                                        <td style="text-align: center;"><img style="width: 40px;height:40px;object-fit: cover; border-radius: 50%" src="uploads/<?=$row['image']?>"></td>
                                                        <td style="text-align: center;font-size:13px;font-weight: 600"><?php echo $row['name'];?></td>                                                
                                                        <td style="text-align: center;font-size:13px;font-weight: 600"><?php echo $row['contactno'];?></td>                                                                                                  
                                                        <td style="display:none; text-align: center;"><?php echo $row['address'];?></td>                                                     
                                                        <td style="text-align: center;font-size:13px;font-weight: 600"><?php echo $row['gradetohandle'];?></td>   
                                                        <td style="text-align: center;font-size:13px;font-weight: 600"><span style="padding: 4px; border-radius: 4px; background-color:<?php echo $row['status']=='Active'?'#435ebe': '#d9534f' ?>; color:white; font-size:13px; font-weight: 600"><?php echo $row['status'];?></span></td>    
                                                        <td style="display:none; text-align: center;"><?php echo $row['username'];?></td>    
                                                        <td style="display:none; text-align: center;"><?php echo $row['password'];?></td>                                                
                                                        <td style="text-align: center;" <?php echo($_SESSION['role']=='Admin')?'': 'hidden'?>>                          
                                                            <button type="button" class="badge btn btn-success ManageTeacher" 
                                                            data-bs-toggle="modal" data-bs-target="#editTeacherModal" data-bs-whatever="@getbootstrap" id="<?php echo $row['id'];?>">Edit</button>    
                                                            <button type="button" hidden class="badge btn btn-danger removeteacher" 
                                                            data-bs-toggle="modal" data-bs-target="#deletemodalteacher" data-bs-whatever="@getbootstrap" <?php echo($_SESSION['role']=='Admin')?'': 'hidden'?>>Remove</button>                               
                                                        </td>
                                                        </tr>  
                                                        <?php $i++;
                                                        }
                                                         ?>  
                                                    </tbody>
                                                </table>
                                            </div>   
                                      </div>
                          </div>
                      </section>
</div>


   <!----------------------------------------------- FOR ADD TEACHER MODAL --------------------------------------------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div style="height: 40px" class="modal-header bg-primary">
        <h5 style="color:white" class="modal-title" id="exampleModalLabel">ADD TEACHER</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

            <form action="MyCrud.php" method="POST" enctype="multipart/form-data">
             <div class="row">
                    
                    <div class="row">
                    <div class="col-md-6">
                      <label for="name-text" class="col-form-label">Role Type</label>
                        <select class="form-control" name="roletype" id="roletype" onchange="verifyrole()" required>
                        <option value="Teacher">Teacher</option>
                        <option value="Admin">Admin</option>                        
                        </select>
                    </div> 
                    <div class="col-md-6">
                      <label for="name-text" class="col-form-label">Status</label>
                        <select class="form-control" name="status" id="status" required>
                        <option value="Active">Active</option> 
                        <option value="Inactive">Inactive</option> 
                        </select>
                    </div> 
                    </div>
                                        
                    <div class="col-md-12">
                      <label for="lrn-name" class="col-form-label">Name</label>
                      <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                  
                  <div class="row">
                  <div class="col-md-6">
                      <label for="name-text" class="col-form-label">Grade to Handle</label>
                        <select class="form-control" name="gradetohandle" id="gradetohandle" required>
                        <option value="" disabled selected>Select</option> 
                        <?php 

                      $query = "SELECT * FROM `gradelevel_tbl`";
                      $query_run = mysqli_query($connection, $query);
                      while($row=$query_run->fetch_assoc()){  
                      ?>     
                      <option value="<?php echo $row['grade']?>"> <?php echo $row['grade']; ?></option>
                      <?php  
                      }
                      ?>  
                        </select>
                    </div> 
                    <div class="col-md-6">
                      <label for="name-text" class="col-form-label">Contact No.</label>
                      <input type="text" class="form-control" name="contactno" id="contactno" required></textarea>
                    </div>   
                  </div>
                  
                    <div class="col-md-12">
                      <label for="name-text" class="col-form-label">Address</label>
                      <input type="text" class="form-control" name="address" id="address" required></textarea>
                    </div> 

                       
                    <div class="col-md-12">
                      <label for="name-text" class="col-form-label">Username</label>
                      <input type="text" class="form-control checkusername" name="username" id="username" required></textarea>
                      <p class="feedback" style="font-size: .875em; color: #dc3545; margin-top: .25rem"></p>
                    </div> 

                    <div class="col-md-12">
                      <label for="name-text" class="col-form-label">Password</label>
                      <input type="password" class="form-control" name="password" id="password" required></textarea>
                    </div>      
               
                                  
               </div> 
                                      
                    <label for="id" style="visibility: hidden" class="col-form-label">Id</label>
                    <input type="hidden" readonly class="form-control" name="id" id="id"></textarea>
 
                  <div style="height: 35px; margin: 1px; padding:1px;" class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="insertteacher" class="btn btn-primary">Save</button>
                </div>
             </form>
      </div>
      
    </div>
  </div>
</div>


<!-- Script to disable/enable role type -->
<script>
   function verifyrole(){
    var selectrole = document.getElementById("roletype").value;
    console.log(selectrole);

        if(selectrole == "Admin"){             
          document.getElementById("gradetohandle").disabled = true;
        }
        else if(selectrole == "Teacher"){
          document.getElementById("gradetohandle").disabled = false;
        }
}
</script>

<!-- Script for checking lrn if already existing -->
<script>
    $(document).ready(function(){
        $('.checkusername').focusout(function (e){
            var username = $('.checkusername').val();
            $.ajax({
                type:"POST",
                url: "getlevel.php",
                data: {checkusername:username},
                success: function (response){
              
                    if (response.indexOf("Sorry, Username is already in used.") > -1) 
                    {
                       $('.feedback').text(response);
                       $('.checkusername').val('');
                    }
                    else
                    {
                        $('.feedback').text(response);
                    }
                }
            })
        })
    })
</script>


<!----------------------------------------------- FOR EDIT TEACHER MODAL --------------------------------------------------------------------->
<div class="modal fade" id="editTeacherModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div style="height: 40px" class="modal-header bg-success">
        <h5 style="color:white" class="modal-title" id="exampleModalLabel">MANAGE TEACHER</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="MyCrud.php" method="POST" enctype="multipart/form-data">
             
                <div class="row">

                <div class="col-md-6">
                      <label for="name-text" class="col-form-label">Status</label>
                        <select class="form-control" name="updatestatus" id="updatestatus" required>
                        <option value="" disabled selected>Select Status</option> 
                        <option value="Active">Active</option> 
                        <option value="Inactive">Inactive</option> 
                        </select>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <label for="name" class="col-form-label">Name</label>
                      <input type="text" readonly class="form-control" readonly name="updatename" id="updatename" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                      <label for="position" class="col-form-label">Grade to Handle</label>
                        <select class="form-control"  name="updategradetohandle" id="updategradetohandle" required>
                        <option value="" disabled selected>Select</option> 
                        <?php 

                      $query = "SELECT * FROM `gradelevel_tbl`";
                      $query_run = mysqli_query($connection, $query);
                      while($row=$query_run->fetch_assoc()){  
                      ?>     
                      <option value="<?php echo $row['grade']?>"> <?php echo $row['grade']; ?></option>
                      <?php  
                      }
                      ?>  
                        </select>
                    </div> 
                    <div class="col-md-6">
                      <label for="contactno" class="col-form-label">Contact No.</label>
                      <input type="text" class="form-control" readonly name="updatecontactno" id="updatecontactno" required></textarea>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <label for="address" class="col-form-label">Address</label>
                      <input type="text" class="form-control" readonly name="updateaddress" id="updateaddress" required></textarea>
                    </div> 

    
                <div class="col-md-12">
                      <label for="name-text" class="col-form-label">Username</label>
                      <input type="text" class="form-control checkusername1" name="updateusername" id="updateusername" required></textarea>
                      <p class="feedback" style="font-size: .875em; color: #dc3545; margin-top: .25rem"></p>
                    </div> 

                    <div class="col-md-12">
                      <label for="name-text" class="col-form-label input-field mb-2">Password</label>
                      <input type="password" class="form-control" name="updatepassword" id="updatepassword" required></textarea>
                      <span style="padding-top:4px"><i class="bi bi-eye-slash" id="togglePassword"></i></span>
                    </div>     

                  <!--<div class="col-md-12">
                      <label for="name-text" class="col-form-label">Select Image File</label>
                      <input type="file" class="form-control" name="updateimage" id="updateimage" required></textarea>
                    </div>-->

                </div> 

                    <label style="visibility:hidden" for="id" class="col-form-label">Id</label>
                    <input type="hidden" readonly class="form-control" name="updateid" id="updateid"></textarea>
  

                  <div style="height: 35px; margin: 1px; padding:1px;" class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="updateteacher" class="btn btn-success">Update</button>
                </div>
             </form>
      </div>
     
    </div>
  </div>
</div>
<!-- Script for checking lrn if already existing -->
<script>
    $(document).ready(function(){
        $('.checkusername1').focusout(function (e){
            var username = $('.checkusername1').val();
            $.ajax({
                type:"POST",
                url: "getlevel.php",
                data: {checkusername:username},
                success: function (response){
              
                    if (response.indexOf("Sorry, Username is already in used.") > -1) 
                    {
                       $('.feedback').text(response);
                       $('.checkusername1').val('');
                    }
                    else
                    {
                        $('.feedback').text(response);
                    }
                }
            })
        })
    })
</script>

<!-- Script for toggle show/hide password -->
<script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#updatepassword");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });
</script>



<!----------------------------------------------- FOR DELETE MODAL --------------------------------------------------------------------->
 <div class="modal fade" id="deletemodalteacher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header bg-danger">
            <h5 style="color:white" class="modal-title" id="exampleModalLabel">DELETE TEACHER</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
              <div class="modal-body">                                       
                 <form action="MyCrud.php" method="POST" enctype="multipart/form-data">   
                     
                        <p>Are you sure you want to remove this record?</p>
                        <input type="hidden" name="deleteteacherid" id="deleteteacherid">
            
                        <div class="modal-footer ">
                          <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" name="deleteteacher" class="btn btn-danger">Yes</button>
                        </div>
                  </form>
               </div>  
         </div>
        </div>
      </div>


<!------------------------------------------------FOR REG DETAILS ------------------------------------------------------------------>
<div class="modal fade" id="showInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div style="height:100px" class="modal-dialog modal-md">
        <div class="modal-content">
          <div style="height:10px" class="modal-header bg-primary">
            <h5 style="color:white" class="modal-title" id="exampleModalLabel">TEACHER RECORDS</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
              <div class="modal-body">                                                         
                        <p>- Admins can view, edit all records of teachers</p>
                        <p>- Teachers can only view records.</p>
                        <hr>
               <button type="button" class="btn btn-primary float-end btn-sm" data-bs-dismiss="modal">OK</button>
               </div>  
         </div>
      </div>
</div>