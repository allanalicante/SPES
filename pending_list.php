<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>PENDING STUDENT RECORDS</h3>
                            <p class="text-subtitle text-muted">For user to check pending student list</p>
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
                        
                        <div class="card-header"></div> 
                        
                        <?php
                                  if(isset($_SESSION['enrolled'])){ 
                                ?>
                                <div class="alert alert-success alert-dismissible show fade" role="alert">
                                <?php echo $_SESSION['enrolled']?>  
                                  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">  
                                  </button>
                                </div>
                                <?php     
                                unset($_SESSION['enrolled']); 
                                }
                                ?>
                       
                        <div class="card-body">
                           
                            <table class="table table-bordered table-striped" id="table1">   
                                <thead style="background-color: #435ebe; color: white;">
                                    <tr>
                                        <th>Pending ID</th>
                                        <th>LRN</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Sex</th>
                                        <th>Grade</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $connection = mysqli_connect("localhost","root","");
                                $db = mysqli_select_db($connection,'spes_db');

                                $query = "SELECT s.stud_id, s.lrn, s.firstname, s.lastname, s.age, s.sex, si.gradetoenroll as 'level'
                                FROM student_tbl s
                                INNER JOIN school_info si
                                ON s.stud_id = si.stud_id  
                                WHERE `status`='pending'";
                                $query_run = mysqli_query($connection, $query);
                                while($row=$query_run->fetch_assoc()){
                                ?>                    
                                <tr>
                                        <td><?php echo $row['stud_id'];?></td>
                                        <td><?php echo $row['lrn'];?></td>
                                        <td><?php echo $row['firstname'] ." ".$row['lastname'];?></td>
                                        <td><?php echo $row['age'];?></td>
                                        <td><?php echo $row['sex'];?></td>
                                        <td><?php echo $row['level'];?></td>
                                        <td>                               
                                        <button type="button" class="badge btn btn-success assignGradeLevel" data-bs-toggle="modal" 
                                        data-bs-target="#assignGradeLevel" data-bs-whatever="@getbootstrap">Add this Student</button>                                 
                                        </td>  
                                        
                                    </tr>
                                    <?php } ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>


                  <!----------------------------------------------- FOR MODAL --------------------------------------------------------------------->
 <div class="modal fade" id="assignGradeLevel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 style="color:white" class="modal-title" id="exampleModalLabel">ASSIGN GRADE AND SECTION TO STUDENT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <form action="MyCrud.php" method="POST">
          
          <div class="mb-3">
            <label for="pendinglrn" class="col-form-label">LRN</label>
            <input type="text" readonly name="pendinglrn" class="form-control" id="pendinglrn">
          </div>

          <div class="mb-3">
            <label for="pendingname" class="col-form-label">Name</label>
            <input type="text" readonly name="pendingname"  class="form-control" id="pendingname"></textarea>
          </div>

           <div class="mb-3">
              <label for="editlevelsectionid">Level</label>
              <select class="form-control" name="editlevelsectionid" id="editlevelsectionid" required>
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
         
            <div class="modal-footer">          
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="updatepending" class="btn btn-success">Enroll Now</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
</div>