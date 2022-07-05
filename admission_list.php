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
                            <h3>STUDENT ADMISSION</h3>
                            <p class="text-subtitle text-muted">Manage Students</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Admission List</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section brand">
                    <div class="card">
                        
                        <div class="card-header">
                            <div class="col-12 d-flex justify-content-end reset-btn">                      
                                <a href="?page=records&data=admission-new"><button type="submit"
                                    class="btn btn-primary me-1 mb-1" id="myBtn" >Add New Student</button></a>     
                                <a href="?page=records&data=pending-student"><button type="submit"
                                    class="btn btn-primary me-1 mb-1" id="myBtn">Check Pending Enrollees</button></a>     
                                               
                            </div> 

                            <?php
                                  if(isset($_SESSION['addsuccess'])){ 
                                ?>
                                <div class="alert alert-success alert-dismissible show fade" role="alert">
                                <?php echo $_SESSION['addsuccess']?>  
                                  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">  
                                  </button>
                                </div>
                                <?php     
                                unset($_SESSION['addsuccess']); 
                                }
                              
                                
                                  elseif(isset($_SESSION['updatesuccess'])){ 
                                ?>
                                <div class="alert alert-success alert-dismissible show fade" role="alert">
                                <?php echo $_SESSION['updatesuccess']?>  
                                  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">  
                                  </button>
                                </div>
                                <?php     
                                unset($_SESSION['updatesuccess']); 
                                }
                                ?>
                            <HR></HR>                        
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                           <table class="table table-bordered table-striped" id="table1">   
                                <thead style="background-color: #435ebe; color: white;">
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>LRN</th>
                                        <th>Name</th>
                                        <th>Grade</th>
                                        <th>Section</th>
                                        <th>Adviser</th>
                                        <th>Modality</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                             

                                $query = "SELECT t1.modality, t1.stud_id,t1.lrn,CONCAT(t1.firstname,' ',t1.lastname) AS `Full Name`,
                                g.Grade,t2.section AS `Section`, t3.name, t1.photo
                                FROM student_tbl t1
                                INNER JOIN levelsection t2
                                ON t2.id=t1.level_section_id
                                INNER JOIN gradelevel_tbl g
                                ON g.id = t2.level
                                INNER JOIN teacher t3
                                ON t3.level_section_id=t1.level_section_id
                                WHERE `status`='enrolled'";
                                $query_run = mysqli_query($connection, $query);
                                while($row=$query_run->fetch_assoc()){
                                ?>                    
                                <tr>
                                        <td><?php echo $row['stud_id'];?></td>
                                        <td><img alt ="No Photo Saved"style="width: 100px;height:100px;object-fit: cover;" 
                                         class="img-thumbnail" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>"/></td>
                                        <td><?php echo $row['lrn'];?></td>
                                        <td><?php echo $row['Full Name'];?></td>
                                        <td><?php echo $row['Grade'];?></td>
                                        <td><?php echo $row['Section'];?></td>
                                        <td><?php echo $row['name'];?></td>
                                        <td><?php echo $row['modality'];?></td>
                                        <td>                               
                                        <button type="button" class="badge btn btn-success editStudentSection" data-bs-toggle="modal" 
                                          data-bs-target="#editStudentSection" data-bs-whatever="@getbootstrap">Edit</button>                                 
                                        </td>  
                                    </tr>
                                    <?php } ?>
                                   
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>

                </section>
            </div>


            <!----------------------------------------------- FOR EDIT MODAL --------------------------------------------------------------------->
            <div class="modal fade" id="editStudentSection" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 style="color:white" class="modal-title" id="exampleModalLabel">EDIT STUDENT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="MyCrud.php" method="POST" enctype="multipart/form-data">   
          <div class="row">
              <div class="col-md-6">
                <label for="editlrn" class="col-form-label">LRN</label>
                <input type="text" readonly name="editlrn" class="form-control" id="editlrn">
              </div>
               
              <div class="col-md-6">
                <label for="editname" class="col-form-label">Name</label>
                <input type="text" readonly name="editname"  class="form-control" id="editname"></textarea>
              </div>
         </div>

          <div class="row">
              <div class="col-md-6">
            <label for="grade" class="col-form-label">Grade</label>
            <input type="text" readonly name="editlevelsectionid1" class="form-control" id="editlevelsectionid1"></textarea>
             </div>

              <div class="col-md-6">
              <label for="editlevelsectionid1" class="col-form-label">Section</label>
              <select class="form-control" name="editGradeSection" id="editGradeSection" required>
              <option value="" disabled selected>Select</option>          
              </select>
              </div>    
          </div>

          <div class="row">
               <div class="col-md-12">
                      <label for="name-text" class="col-form-label">Modality</label>
                      <select class="form-control" name="editmodality" id="editmodality" required>
                      <option value="" disabled selected>Select</option> 
                      <option value="Modular">Modular</option> 
                      <option value="Online Class">Online Class</option> 
                      </select>
                    </div>                
          </div> 

          <div class="row">
               <div class="col-md-12">
                      <label for="name-text" class="col-form-label">Select Image File</label>
                      <input type="file" class="form-control" name="updateimage" id="updateimage" required></textarea>
                    </div>                
               </div> 
          </div>
          <input type="hidden" name="editstud_id"  class="form-control col-md-6" id="editstud_id"></textarea>
             

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="updatestudent" class="btn btn-success">Save</button>
             </div>
        </form>
      </div>
     
    </div>
  </div>
</div>

