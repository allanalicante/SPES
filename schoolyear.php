<?php
    if(!isset($_SESSION['role']))
{
    header('location:login.php');
    exit();
} 
?>

<div class="page-heading"> <!--------------------------------- Profile Statistic Heading -------------------------->
            <h3>MANAGE SCHOOL YEAR</h3>   
            <hr>
        </div>

     <section class="section row">
        <div class="col-12 col-lg-12"> <!--------------------  -------------------------------->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card logbrand">
                        <div class="card-header">
                              <div class="col-12 d-flex justify-content-end">                      
                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmodalschoolyear" data-bs-whatever="@getbootstrap"><i class="bi bi-plus-circle"></i> School Year</button>                                                                                                      
                                  </div>
                                  <HR></HR> 
                        </div>

                             <div class="card-body">                                        
                             <div class="table-responsive">                                 
                                      <table class="table table-bordered table-striped text-center" id="table1" style="width: 100%">
                                                <thead  style="background-color: #435ebe; color: white;">
                                                    <tr>
                                                        <th style="Display:none;">ID</th>
                                                        <th style="text-align: center;">School Year</th>
                                                        <th style="text-align: center;">School Head</th>                 
                                                        <th style="text-align: center; display:none">Status</th>                 
                                                        <th style="text-align: center;">Enrollment Status</th>
                                                        <th style="text-align: center;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php
   

                                        $query = "SELECT * FROM schoolyear_tbl";
                                        $query_run = mysqli_query($connection, $query);
                                        while($row=$query_run->fetch_assoc()){
                                        ?>
                                                <tr>
                                                    <td style="Display:none"><?php echo $row['id'];?></td>
                                                    <td style="font-size:13px; font-weight: 600"><?php echo $row['SchoolYear'];?></td>
                                                    <td style="font-size:13px; font-weight: 600"><?php echo $row['SchoolHead'];?></td>
                                                    <td style="font-size:13px; font-weight: 600; display:none"><?php echo $row['Active'];?></td>                                            
                                                    <td style="font-size:13px; font-weight: 600"><?php echo $row['EnrollmentStatus'];?></td>
                                                    <td>                               
                                                    <button type="button" class="badge btn btn-sm btn-success EditSchoolYear"  title="Edit" data-bs-toggle="modal" 
                                                    data-bs-target="#editmodalschoolyear" data-bs-whatever="@getbootstrap"><i class="bi bi-pencil-square"></i></button> 
                                                   <!--  <button type="button" class="badge btn btn-danger DeleteSchoolYear" data-bs-toggle="modal" 
                                                    data-bs-target="#deletemodalschoolyear" data-bs-whatever="@getbootstrap">Remove</button>     -->                             
                                                    </td>                    
                                                </tr>
                                                <?php } ?>
                                                </tbody>
                                    </table>
                                </div>
                                
                             </div>
                            
                     </div>               
               </div>
            </div>
        </div>
     </section>  
                                     

      <!----------------------------------------------- FOR ADD MODAL --------------------------------------------------------------------->
      <div class="modal fade" id="addmodalschoolyear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 style="color:white" class="modal-title" id="exampleModalLabel">ADD SCHOOL YEAR</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
               <div class="modal-body">

                 <form action="MyCrud.php" method="POST" enctype="multipart/form-data">   

                    <div class="col-md-12">
                      <label for="" class="col-form-label">School-Year</label>
                      <input type="text" name="SchoolYear" class="form-control" id="SchoolYear">
                   </div>
                    <div class="col-md-12">
                      <label for="" class="col-form-label">School Head</label>
                      <input type="text" name="SchoolHead" class="form-control" id="SchoolHead">
                   </div>
                         <br>
                  
                    <div style="height: 35px; margin: 1px; padding:1px;" class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="addschoolyear" class="btn btn-primary">Save</button>
                   </div>
                 </form>
               </div>  
           </div>
         </div>
      </div>

      <!----------------------------------------------- FOR EDIT SCHOOLYEAR MODAL --------------------------------------------------------------------->
    <div class="modal fade" id="editmodalschoolyear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header bg-success">
            <h5 style="color:white" class="modal-title" id="exampleModalLabel">EDIT SCHOOL YEAR</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
              <div class="modal-body">                                       
                 <form action="MyCrud.php" method="POST" enctype="multipart/form-data">   
                     
                        <label class="col-form-label">School Year</label>
                        <input type="text" name="editSchoolYear" class="form-control" id="editSchoolYear" required>

                        <label class="col-form-label">School Head</label>
                        <input type="text" name="editSchoolHead" class="form-control" id="editSchoolHead" required>

                        <label for="editlrn" class="col-form-label">Status</label>
                        <select class="form-control" name="editStatus" id="editStatus" required>
                        <option value="" disabled selected>Select</option> 
                        <option value="Yes">Yes</option> 
                        <option value="No">No</option> 
                        </select>

                        <label class="col-form-label">Process</label>
                        <select class="form-control" name="editprocess" id="editprocess" required>
                        <option value="" disabled selected>Select</option> 
                        <option value="Ongoing">Ongoing</option> 
                        <option value="Ended">Ended</option> 
                        </select>
                            
                        <input type="hidden" name="editschoolyearid" class="form-control col-md-12" id="editschoolyearid"></textarea>
                        <br>
            
                        <div style="height: 35px; margin: 1px; padding:1px;" class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="editschoolyear" class="btn btn-success">Save</button>
                        </div>
                  </form>
               </div>  
         </div>
        </div>
    </div>

      <!----------------------------------------------- FOR DELETE MODAL --------------------------------------------------------------------->

      <div class="modal fade" id="deletemodalschoolyear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header bg-danger">
            <h5 style="color:white" class="modal-title" id="exampleModalLabel">DELETE SCHOOL YEAR</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
              <div class="modal-body">                                       
                 <form action="MyCrud.php" method="POST" enctype="multipart/form-data">   
                     
                        <p>Are you sure you want to remove this record?</p>
                        <input type="hidden" name="deleteschoolyearid" id="deleteschoolyearid">
            
                        <div class="modal-footer ">
                          <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" name="deleteschoolyear" class="btn btn-danger">Yes</button>
                        </div>
                  </form>
               </div>  
         </div>
        </div>
      </div>


        <!----------------------------------------------- FOR EDIT ADMIN MODAL --------------------------------------------------------------------->
    <div class="modal fade" id="EditAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header bg-success">
            <h5 style="color:white" class="modal-title" id="exampleModalLabel">EDIT ADMINISTRATOR</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
              <div class="modal-body">                                       
                 <form action="MyCrud.php" method="POST" enctype="multipart/form-data">   

                        <input type="hidden" name="editID" class="form-control" id="editID" required>
                     
                        <label for="editlrn" class="col-form-label">Name</label>
                        <input type="text" name="editname" class="form-control" id="editname" required>

                        <label for="editlrn" class="col-form-label">Contact No</label>
                        <input type="text" name="editcontact" class="form-control" id="editcontact" required>

                        <label for="editlrn" class="col-form-label">Address</label>
                        <input type="text" name="editaddress" class="form-control" id="editaddress" required>

                        <label for="editlrn" class="col-form-label">Username</label>
                        <input type="text" name="editusername" class="form-control" id="editusername" required>

                        <label for="editlrn" class="col-form-label">Username</label>
                        <input type="text" name="editpassword" class="form-control" id="editpassword" required>



                        <!-- <label for="editlrn" class="col-form-label">Status</label>
                        <select class="form-control" name="editStatus" id="editStatus" required>
                        <option value="" disabled selected>Select</option> 
                        <option value="Yes">Yes</option> 
                        <option value="No">No</option> 
                        </select> -->

                        <label for="editlrn" class="col-form-label">Photo</label>
                        <label for="name-text" class="col-form-label">Select Image File</label>
                      <input type="file" class="form-control" name="editimage" id="editimage" required></textarea>
                            
                        
                        <br>
            
                        <div class="modal-footer ">
                          <button type="submit" name="editadmin" class="btn btn-success">Save</button>
                        </div>
                  </form>
               </div>  
         </div>
        </div>
    </div>



       <!----------------------------------------------- FOR ADDING ADMIN MODAL --------------------------------------------------------------------->
       <div class="modal fade" id="addadmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header bg-success">
            <h5 style="color:white" class="modal-title" id="exampleModalLabel">NEW ADMINISTRATOR</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
              <div class="modal-body">                                       
                 <form action="MyCrud.php" method="POST" enctype="multipart/form-data">   

                        <input type="hidden" name="ID" class="form-control" id="ID" required>
                     
                        <label for="editlrn" class="col-form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>

                        <label for="editlrn" class="col-form-label">Contact No</label>
                        <input type="text" name="contact" class="form-control" id="contact" required>

                        <label for="editlrn" class="col-form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="address" required>

                        <label for="editlrn" class="col-form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" required>

                        <label for="editlrn" class="col-form-label">Username</label>
                        <input type="text" name="password" class="form-control" id="password" required>



                        <!-- <label for="editlrn" class="col-form-label">Status</label>
                        <select class="form-control" name="editStatus" id="editStatus" required>
                        <option value="" disabled selected>Select</option> 
                        <option value="Yes">Yes</option> 
                        <option value="No">No</option> 
                        </select> -->

                        <label for="editlrn" class="col-form-label">Photo</label>
                        <label for="name-text" class="col-form-label">Select Image File</label>
                      <input type="file" class="form-control" name="addimage" id="addimage" required></textarea>
                            
                        
                        <br>
            
                        <div class="modal-footer ">
                          <button type="submit" name="addadmin" class="btn btn-success">Save</button>
                        </div>
                  </form>
               </div>  
         </div>
        </div>
    </div>