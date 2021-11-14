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
                                    <li class="breadcrumb-item active" aria-current="page">DataTable</li>
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
                                    class="btn btn-primary me-1 mb-1" id="myBtn">Add New Student</button></a>     
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
                                        <th>Student ID</th>
                                        <th>LRN</th>
                                        <th>Name</th>
                                        <th>Level & Section</th>
                                        <th>Adviser</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $connection = mysqli_connect("localhost","root","");
                                $db = mysqli_select_db($connection,'spes_db');

                                $query = "SELECT t1.stud_id,t1.lrn,CONCAT(t1.firstname,' ',t1.lastname) AS `Full Name`,
                                CONCAT(t2.level,' ',t2.section) AS `Level & Section`, t3.name
                                FROM student_tbl t1
                                INNER JOIN levelsection t2
                                ON t2.id=t1.level_section_id
                                INNER JOIN teacher t3
                                ON t3.level_section_id=t1.level_section_id
                                WHERE `status`='enrolled'";
                                $query_run = mysqli_query($connection, $query);
                                while($row=$query_run->fetch_assoc()){
                                ?>                    
                                <tr>
                                        <td><?php echo $row['stud_id'];?></td>
                                        <td><?php echo $row['lrn'];?></td>
                                        <td><?php echo $row['Full Name'];?></td>
                                        <td><?php echo $row['Level & Section'];?></td>
                                        <td><?php echo $row['name'];?></td>
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

        <form action="MyCrud.php" method="POST">    
              <div class="mb-3">
                <label for="editlrn" class="col-form-label">LRN</label>
                <input type="text" readonly name="editlrn" class="form-control" id="editlrn">
              </div>

              <div class="mb-3">
                <label for="editname" class="col-form-label">Name</label>
                <input type="text" readonly name="editname"  class="form-control" id="editname"></textarea>
              </div>

              <div class="mb-3">
              <label for="editlevelsectionid1">Level (Choose from below)</label>
              <select class="form-control" name="editlevelsectionid1" id="editlevelsectionid1" required>
              <option value="" disabled selected>Select</option> 
              <?php 
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection,'spes_db');
                $query = "SELECT id,CONCAT(t1.level,' - ',t1.section) AS `Advisory Class`
                FROM levelsection t1";
                $query_run = mysqli_query($connection, $query);
                while($row=$query_run->fetch_assoc()){  
                ?>
                <option value="<?php echo $row['id']?>"><?php echo $row['Advisory Class']; ?></option>
                <?php  
                }
                ?>           
              </select>
              </div>

              <input type="hidden" name="editstud_id"  class="form-control" id="editstud_id"></textarea>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="updatestudent" class="btn btn-success">Save</button>
             </div>
        </form>
      </div>
     
    </div>
  </div>
</div>



<!-- SELECT t2.name, CONCAT(t3.level,t3.section) AS `Grade - Section` FROM student_tbl t1
INNER JOIN teacher t2
ON t2.level_section_id=t1.level_section_id
INNER JOIN levelsection t3
ON t3.id=t2.level_section_id

WHERE `status`='enrolled' -->