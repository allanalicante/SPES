<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>LEVEL & SECTION RECORDS</h3>
                            <p class="text-subtitle text-muted">For user to check Section list</p>
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
                
          
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                              <div class="col-12 d-flex justify-content-end reset-btn">                      
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Add Level/Section</button>                                                       
                                  </div> 
                                  <HR></HR> 
                        </div>
                            <div class="card-body">
                     
                                <?php
                                  $connection = mysqli_connect("localhost","root","");
                                  $db = mysqli_select_db($connection,'spes_db');

                                  $query = "SELECT * FROM levelsection";
                                  $query_run = mysqli_query($connection, $query);
                                ?>

                                                      <table class="table table-bordered table-striped" id="table1">
                                                          <thead style="background-color: #435ebe; color: white;">
                                                              <tr>
                                                                  <th>Level</th>
                                                                  <th>Section</th>
                                                                  <th>No. of Students</th>
                                                                  <th>Advisor</th>
                                                                  <th>Action</th>
                                                              </tr>
                                                          </thead>

                                                                <?php
                                                          if($query_run)
                                                          {
                                                            foreach($query_run as $row)
                                                            {
                                                        ?>
                                                          <tbody>
                                                            <tr>
                                                              <td><?php echo $row['level'];?></td>
                                                              <td><?php echo $row['section'];?></td>
                                                              <td><?php echo $row['quantity'];?></td>
                                                              <td><?php echo $row['advisory'];?></td>
                                                              <td>                               
                                                              <button type="button" class="badge btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@getbootstrap">Edit</button>                                 
                                                              </td>                    
                                                            </tr>
                                                              
                                                          </tbody>

                                                          <?php
                                                      }
                                                    }
                                                    else
                                                    {
                                                      echo "No record found!";
                                                    }
                                                    ?>
                                              </table>
                             </div>
                     </div>
                </section>        
        </div>

<!----------------------------------------------- FOR ADDING LEVEL AND SECTION MODAL --------------------------------------------------------------------->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 style="color:white" class="modal-title" id="exampleModalLabel">ADD LEVEL AND SECTION</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="MyCrud.php" method="POST" >
          <div class="mb-3">
          <label for="cars">Level</label>
          <select class="form-control" name="level" id="Level">
          <option value="" disabled selected>Select</option> 
            <option value="Grade1">Grade 1</option>
            <option value="Grade2">Grade 2</option>
            <option value="Grade3">Grade 3</option>
            <option value="Grade4">Grade 4</option>
            <option value="Grade5">Grade 5</option>        
            <option value="Grade6">Grade 6</option>        
          </select>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Section</label>
            <input type="text" name="section" class="form-control" id="section-text"></textarea>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Advisory</label>
            <input type="text" name="advisory" class="form-control" id="advisory-text"></textarea>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="insertdata" data-bs-toggle="sweet-alert" data-sweet-alert="confirm" class="btn btn-primary">Save</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>



<!----------------------------------------------- FOR EDITING LEVEL AND SECTION MODAL --------------------------------------------------------------------->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT LEVEL AND SECTION</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
          <label for="cars">Level</label>
          <select class="form-control" name="Level" id="Level">
          <option value="" disabled selected>Select</option> 
            <option value="Grade1">Grade 1</option>
            <option value="Grade2">Grade 2</option>
            <option value="Grade3">Grade 3</option>
            <option value="Grade4">Grade 4</option>
            <option value="Grade5">Grade 5</option>        
            <option value="Grade6">Grade 6</option>        
          </select>
          </div>
          <div class="mb-3">
            <label for="section-text" class="col-form-label">Section</label>
            <input type="text" class="form-control" id="section-text"></textarea>
          </div>
          <div class="mb-3">
            <label for="no-students-text" class="col-form-label">No. of Students</label>
            <input type="text" class="form-control" id="no-students-text"></textarea>
          </div>
          <div class="mb-3">
            <label for="advisory-text" class="col-form-label">Advisory</label>
            <input type="text" class="form-control" id="advisory-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>