

<?php
/* include('asset/database/MysqliDB.php');
if(isset($_POST['insertdata'])){
  $db = new MysqliDb ('localhost', 'root', '', 'spes_db');
  //$users = $db->get('users');
  
  $level = $_POST['level'];
  $section = $_POST['section'];
  $advisory = $_POST['advisory']; 

    $data = Array ("level" => "$level",
                "section" => "$section",
                "advisory" => "$advisory"
  );
  $id = $db->insert ('levelsection', $data);
  if($id)
      echo 'user was created. Id=' . $id;
} */
?>

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
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal" data-bs-whatever="@getbootstrap">Add Level/Section</button>                                                       
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
                                ?>
                                  <HR></HR> 
                        </div>
                            <div class="card-body">                                        
                                                      <table class="table" id="table1">
                                                          <thead style="background-color: #435ebe; color: white;">
                                                              <tr>
                                                                  <th>ID</th>
                                                                  <th>Level</th>
                                                                  <th>Section</th>
                                                                  <th>No. of Students</th>
                                                                  <th>Advisor</th>
                                                                  <th>Action</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>

                                                          <?php
                                                    $connection = mysqli_connect("localhost","root","");
                                                    $db = mysqli_select_db($connection,'spes_db');

                                                    $query = "SELECT * FROM levelsection";
                                                    $query_run = mysqli_query($connection, $query);
                                                    while($row=$query_run->fetch_assoc()){
                                                    ?>
                                                            <tr>
                                                              <td><?php echo $row['id'];?></td>
                                                              <td><?php echo $row['level'];?></td>
                                                              <td><?php echo $row['section'];?></td>
                                                              <td><?php echo $row['quantity'];?></td>
                                                              <td><?php echo $row['advisory'];?></td>
                                                              <td>                               
                                                              <button type="button" class="badge btn btn-success editBtn" data-bs-toggle="modal" 
                                                               data-bs-target="#editmodal" data-bs-whatever="@getbootstrap">Edit</button>                                 
                                                              </td>                    
                                                            </tr>
                                                            <?php } ?>
        
                                                          </tbody>
                                             </table>
                             </div>
                     </div>
                </section>        
        </div>

<!----------------------------------------------- FOR ADDING LEVEL AND SECTION MODAL --------------------------------------------------------------------->
  <div class="modal fade" id="addModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 style="color:white" class="modal-title" id="exampleModalLabel">ADD LEVEL AND SECTION</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                                                 
        <form form action="MyCrud.php" method="POST" >
          <div class="mb-3">
          <label for="level">Level</label>
          <select class="form-control" name="level" id="level">
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
            <label for="section" class="col-form-label">Section</label>
            <input type="text" name="section" class="form-control" id="section"></textarea>
          </div>
          <div class="mb-3">
            <label for="advisory" class="col-form-label">Advisory</label>
            <input type="text" name="advisory" class="form-control" id="advisory"></textarea>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="insertdata" class="btn btn-primary">Save</button>
      </div>
        </form>
        
      </div>
      
    </div>
  </div>
</div>



<!----------------------------------------------- FOR EDITING LEVEL AND SECTION MODAL --------------------------------------------------------------------->
<div class="modal fade" id="editmodal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">EDIT LEVEL AND SECTION</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="MyCrud.php" method="POST" >

          <div class="mb-3">
            <label for="id" class="col-form-label">Id</label>
            <input type="text" readonly class="form-control" name="update_id" id="update_id"></textarea>
          </div>

          <div class="level-3">
          <label for="level">Level</label>
          <select class="form-control" name="editlevel" id="editlevel">
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
            <label for="section" class="col-form-label">Section</label>
            <input type="text" class="form-control" name="editsection" id="editsection"></textarea>
          </div>

          <div class="mb-3">
            <label for="advisory" class="col-form-label">Advisory</label>
            <input type="text" class="form-control" name="editadvisory" id="editadvisory"></textarea>
          </div>

          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="updatedata" class="btn btn-primary ">Update Data</button>
      </div>

        </form>
      </div>
      
      
    </div>
  </div>
</div>


 