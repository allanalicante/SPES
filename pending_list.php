<?php
if (!isset($_SESSION["role"])){
  header('location: login.php');
  exit();
}
?>
<div class="page-heading" id="mainbody">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>PENDING REGISTRATION RECORDS <!-- - <a>
                            <i style="vertical-align:middle;" class="bi bi-info-circle"></i></a> --></h3>
                            <p class="text-subtitle text-muted">For Admin/Teacher to view pending registration list.</p>
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
                                    class="btn btn-primary me-1 mb-1" id="myBtn" <?php echo($_SESSION['role']=='Teacher')?'': 'hidden'?>>Add Student Manually</button></a>                                            
                            </div>                      
                                <hr>
                       </div> 
                        <div class="card-body">                          
                        <div class="table-responsive">                   
                            <table class="text-center table table-bordered table-striped" id="table1" style="width:100%">   
                                <thead style="background-color: #435ebe; color: white;">
                                    <tr>
                                        <th style="text-align: center; display:none">ID</th>
                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center; display:none">Photo</th>
                                        <th style="display:none; text-align: center;">LRN</th>
                                        <th style="text-align: center;">Name</th>
                                        <th style="text-align: center;">Age</th>
                                        <th style="text-align: center;">Sex</th>
                                        <th style="text-align: center;">Grade</th>
                                        <th style="text-align: center;">Type</th>
                                        <th style="display:none">Guardian Contact Number</th>
                                        <th style="text-align: center;">Action</th>                               
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                          

                                $grade = $_SESSION['gradetohandle'];
                               /*  echo 'console.log('.$grade.')';   */                               
                                if($_SESSION['role']=='Teacher')
                                {
                                $query = "SELECT s.id, s.photo, s.lrn, CONCAT(s.firstname,' ',s.middlename,' ',s.lastname) AS `Name`, 
                                s.age, s.sex, g.grade, s.studenttype, s.gcontactno
                                FROM student_tbl s
                                INNER JOIN enrollment_tbl e
                                ON s.id = e.student_id
                                INNER JOIN gradelevel_tbl g
                                ON s.gradetoenroll =  g.id  
                                WHERE e.status='pending' AND g.grade = '$grade'";
                                }
                                else
                                {
                                $query = "SELECT s.id, s.photo, s.lrn, CONCAT(s.firstname,' ',s.middlename,' ',s.lastname) AS `Name`, 
                                s.age, s.sex, g.grade, s.studenttype, s.gcontactno
                                FROM student_tbl s
                                INNER JOIN enrollment_tbl e
                                ON s.id = e.student_id
                                INNER JOIN gradelevel_tbl g
                                ON s.gradetoenroll =  g.id  
                                WHERE `status`='pending'";
                                }
                                $query_run = mysqli_query($connection, $query);
                                $i=1;
                                while($row=$query_run->fetch_assoc()){
                                  $_SESSION["Grade"] = $row['grade'];
                                ?>                    
                                <tr>
                                        <td style="display:none"><?php echo $row['id'];?></td>
                                        <td style="text-align: center; font-size:13px; font-weight: 600"><?php echo $i?></td>
                                        <td style="text-align: center;display:none"><img style="width: 40px;height:40px;object-fit: cover; border-radius: 50%" 
                                        src="uploads/<?=$row['photo']?>"></td>
                                        <td style=" display:none; text-align: center;"><?php echo $row['lrn'];?></td>
                                        <td style="text-align: center; font-size:13px; font-weight: 600"><?php echo $row['Name'];?></td>
                                        <td style="text-align: center; font-size:13px; font-weight: 600"><?php echo $row['age'];?></td>
                                        <td style="text-align: center; font-size:13px; font-weight: 600"><?php echo $row['sex'];?></td>
                                        <td style="text-align: center; font-size:13px; font-weight: 600"><?php echo $row['grade'];?></td>
                                        <td style="text-align: center; font-size:13px; font-weight: 600"><?php echo $row['studenttype'];?></td>
                                        <td style="display:none"><?php echo $row['gcontactno'];?></td>
                                        <td style="text-align: center;">                               
                                        <button type="button" id="<?php echo $row['id'];?>" class="badge btn btn-primary verifyModal" data-bs-toggle="modal" 
                                        data-bs-target="#verifyModal" data-bs-whatever="@getbootstrap">Review</button>                                 
                                        <button type="button" class="badge btn btn-success assignGradeLevel" data-bs-toggle="modal" 
                                        data-bs-target="#assignGradeLevel" data-bs-whatever="@getbootstrap" <?php echo($_SESSION['role']=='Teacher')?'': 'hidden'?>>Assign Class</button>                                 
                                        <button type="button" class="badge btn btn-danger removeStudent" data-bs-toggle="modal" 
                                        data-bs-target="#removeStudent" data-bs-whatever="@getbootstrap"<?php echo($_SESSION['role']=='Admin')?'': 'hidden'?>>Remove</button>                                 
                                        </td>  
                                        
                                    </tr>
                                    <?php  $i++;
                                    }
                                    ?>
                                   
                                </tbody>
                            </table>
                                  </div>
                        </div>
                    </div>

                </section>
            </div>


                  <!----------------------------------------------- FOR MODAL --------------------------------------------------------------------->
 <div class="modal fade" id="assignGradeLevel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div style="height: 40px" class="modal-header bg-success">
        <h5 style="color:white" class="modal-title" id="exampleModalLabel">ASSIGN STUDENT TO CLASS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <form action="MyCrud.php" method="POST" enctype="multipart/form-data">
          
            <label hidden for="pendinglrn" class="col-form-label">Pending ID</label>
            <input type="hidden" readonly name="pendingId" class="form-control" id="pendingId">

          <div class="mb-3">
            <label for="pendingname" class="col-form-label">Name</label>
            <input type="text" readonly name="pendingname"  class="form-control" id="pendingname"></textarea>
          </div>

          <div class="mb-3">
            <label for="grade" class="col-form-label">Grade</label>
            <input type="text" readonly name="level" class="form-control" id="level"></textarea>
          </div>

           <div class="mb-3">
              <label for="levelsectionid">Level</label>
              <select class="form-control" name="GradeSection" id="GradeSection" required>
                <option value="" disabled selected>Select</option> 
                    
              </select>
            </div>
           <div class="mb-3">
              <input type="hidden" readonly name="contact" class="form-control" id="contact"></textarea>
            </div>

            <div style="height: 35px; margin: 1px; padding:1px;" class="modal-footer">          
          <button type="submit" name="updatepending" class="btn btn-success">Enroll Now</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
</div>


<!----------------------------------------------- FOR DELETE MODAL --------------------------------------------------------------------->
<div class="modal fade" id="removeStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div style="height: 40px" class="modal-header bg-danger">
            <h5 style="color:white" class="modal-title" id="exampleModalLabel">REMOVE DATA</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
              <div class="modal-body text-center">                                       
                 <form action="MyCrud.php" method="POST" enctype="multipart/form-data">   
                     
                        <h6>Are you sure you want to remove this record?</h6>
                        <input type="hidden" name="removeStudentID" id="removeStudentID">
                        <h6>Student Name: </h6>
                        <h5 id="removename"></h5>
            
                        <div style="height: 35px; margin: 1px; padding:1px;" class="modal-footer ">
                          <button type="submit" name="removeStudent" class="btn btn-danger">Yes</button>
                        </div>
                  </form>
               </div>  
         </div>
      </div>
</div>
 
<!----------------------------------------------- FOR VERIFY MODAL --------------------------------------------------------------------->
 <div id="modal">
  <div class="modal fade" id="verifyModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content" style="box-shadow:unset;">
              <div style="height: 40px" class="modal-header  text-center">
                <h5 style="color:Black" class="modal-title w-100" id="exampleModalLabel1">STUDENT INFORMATION</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
          <form action="printstudentpdf.php" method="POST">
                <div class="modal-body" id="verifyStudents">  
                </div>
                <div style="height: 48px; margin: 1px; padding:1px;" class="modal-footer">       
                  <input type="hidden" id="printId" name="printId">  
                      <button type="submit" id="mybuttons" name="printstudent" class="btn btn-light-secondary">Print</button>
                </div>
          </form>
        </div>      
      </div>
  </div>
</div>  

<script>
    function printpage() {
        //Get the print button and put it into a variable
        var app = document.getElementById("app");
        var main = document.getElementById("main");
        var pageheading = document.getElementById("mainbody");
        var printButton = document.getElementById("mybuttons");
        var modal = document.getElementById("modal");
            //Set the print button visibility to 'hidden' 
            printButton.style.visibility = 'hidden';
            pageheading.style.visibility = 'hidden';
            app.style.visibility = 'hidden';
            main.style.visibility = 'visible';
            modal.style.visibility = 'vsible';
            //Print the page content
            window.print()
            printButton.style.visibility = 'visible';
            pageheading.style.visibility = 'visible';
            app.style.visibility = 'visible';
    }
</script>

<style>
  @media print {
    #app * {    
    margin: 0 !important; 
    padding: 3px !important;
    overflow: hidden;
    }
}
</style>

