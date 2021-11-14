<div class="page-heading">
                <div class="page-title">
                      <div class="row">
                          <div class="col-12 col-md-6 order-md-1 order-last">
                              <h3>TEACHER RECORDS</h3>
                              <p class="text-subtitle text-muted">For user to check Teacher list</p>
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
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Add Teacher</button>                                                       
                                  </div>    
                                   
                                     <HR></HR> 
                              </div>
                                      <div class="card-body">
                                                <table class="table table-bordered table-striped" id="table1">
                                                    <thead style="background-color: #435ebe; color: white;">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Advisory Class</th>
                                                            <th>Contact</th>                                     
                                                            <th style="display:none;">Address</th>
                                                            <th>Position</th>
                                                            <th>Level ID</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $connection = mysqli_connect("localhost","root","");
                                                    $db = mysqli_select_db($connection,'spes_db');

                                                    $query = "SELECT `teacher_id`,`name`,`contactno`,`address`,`position`,`id`,
                                                    CONCAT(l.level,' - ',l.section)
                                                     AS `Advisory Class` 
                                                    FROM levelsection l
                                                    INNER JOIN teacher t
                                                    ON l.id=t.level_section_id";
                                                    $query_run = mysqli_query($connection, $query);
                                                    while($row=$query_run->fetch_assoc()){
                                                    ?>
                                                      
                                                        <tr>
                                                        <td><?php echo $row['teacher_id'];?></td>
                                                        <td><?php echo $row['name'];?></td>                                                
                                                        <td><?php echo $row['Advisory Class'];?></td>
                                                        <td><?php echo $row['contactno'];?></td>                                                                                                  
                                                        <td style="display:none;"><?php echo $row['address'];?></td>                                                     
                                                        <td><?php echo $row['position'];?></td>    
                                                        <td><?php echo $row['id'];?></td>                                                   
                                                        <td>                          
                                                            <button type="button" class="badge btn btn-success ManageTeacher" 
                                                            data-bs-toggle="modal" data-bs-target="#editTeacherModal" data-bs-whatever="@getbootstrap">Edit</button>                                 
                                                        </td>
                                                        </tr>  
                                                        <?php } ?>  
                                                    </tbody>
                                                </table>
                                      </div>
                          </div>
                      </section>
</div>


   <!----------------------------------------------- FOR ADD MODAL --------------------------------------------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 style="color:white" class="modal-title" id="exampleModalLabel">MANAGE TEACHER</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

            <form action="MyCrud.php" method="POST">
             <div class="row">
                    <div class="col-md-6">
                      <label for="lrn-name" class="col-form-label">Name</label>
                      <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="col-md-6">
                      <label for="name-text" class="col-form-label">Position</label>
                      <input type="text" class="form-control" name="position" id="position" required></textarea>
                    </div> 
             </div> 
     
                <div class="row">
                    <div class="col-md-6">
                      <label for="name-text" class="col-form-label">Address</label>
                      <input type="text" class="form-control" name="address" id="address" required></textarea>
                    </div> 

                    <div class="col-md-6">
                      <label for="name-text" class="col-form-label">Contact No.</label>
                      <input type="text" class="form-control" name="contactno" id="contactno" required></textarea>
                    </div>      
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label style="padding-bottom: 5px; padding-top:8.5px" for="level_section_id">Level</label>
                        <select class="form-control" name="level_section_id" id="level_section_id" required>
                        <option value="" disabled selected>Select</option> 
                        <?php 
                        $connection = mysqli_connect("localhost","root","");
                        $db = mysqli_select_db($connection,'spes_db');
                        $query = "SELECT id,CONCAT(t1.level,' - ',t1.section) AS `Advisory Class`
                        FROM levelsection t1
                        LEFT JOIN teacher t2 ON t2.level_section_id = t1.id
                        WHERE t2.level_section_id IS NULL";
                        $query_run = mysqli_query($connection, $query);
                        while($row=$query_run->fetch_assoc()){  
                        ?>
                        <option value="<?php echo $row['id']?>"><?php echo $row['Advisory Class'];?></option>
                        <?php  
                        }
                        ?>                           
                        </select>
                   </div>                   
               </div> 
              
                    <label for="id" style="visibility: hidden" class="col-form-label">Id</label>
                    <input type="hidden" readonly class="form-control" name="id" id="id"></textarea>
 
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="insertteacher" class="btn btn-primary">Save</button>
                </div>
             </form>
      </div>
      
    </div>
  </div>
</div>


<!----------------------------------------------- FOR EDIT MODAL --------------------------------------------------------------------->
<div class="modal fade" id="editTeacherModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 style="color:white" class="modal-title" id="exampleModalLabel">MANAGE TEACHER</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="MyCrud.php" method="POST">
             
                <div class="row">
                    <div class="col-md-6">
                      <label for="name" class="col-form-label">Name</label>
                      <input type="text" class="form-control" name="updatename" id="updatename" required>
                    </div>

                    <div class="col-md-6">
                      <label for="position" class="col-form-label">Position</label>
                      <input type="text" class="form-control" name="updateposition" id="updateposition" required></textarea>
                    </div> 
             </div> 
     
                <div class="row">
                    <div class="col-md-6">
                      <label for="address" class="col-form-label">Address</label>
                      <input type="text" class="form-control" name="updateaddress" id="updateaddress" required></textarea>
                    </div> 

                    <div class="col-md-6">
                      <label for="contactno" class="col-form-label">Contact No.</label>
                      <input type="text" class="form-control" name="updatecontactno" id="updatecontactno" required></textarea>
                    </div>      
                </div>

                <div class="row">

                  <div class="col-md-6">
                        <label for="currentlevelsectionid" class="col-form-label">Current Level</label>
                        <input type="text"  readonly class="form-control" name="currentlevelsectionid" id="currentlevelsectionid" required></textarea>
                  </div>  
                
                    <div class="col-md-6">
                    <label style="padding-bottom: 5px; padding-top:8.5px" for="updatelevel_section_id">Level</label>
                        <select class="form-control" name="updatelevel_section_id" id="updatelevel_section_id" required>
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
                </div> 
                
                    <label   for="currentid" class="col-form-label">Id</label>
                    <input   readonly class="form-control" name="currentid" id="currentid"></textarea>

                    <label style="visibility:hidden" for="id" class="col-form-label">Id</label>
                    <input type="hidden" readonly class="form-control" name="updateid" id="updateid"></textarea>
  

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="updateteacher" class="btn btn-success">Update</button>
                </div>
             </form>
      </div>
     
    </div>
  </div>
</div>