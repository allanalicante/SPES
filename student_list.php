
<script src="asset/js/pdfexport/jquery-3.5.1.js"></script>

<?php
if (!isset($_SESSION["role"])){
  header('location: login.php');
  exit();
}
$sessionrole = $_SESSION['role'];
?>
<div class="page-heading" id="mainbody">
          <div class="page-title">
              <div class="row">
                  <div class="col-12 col-md-6 order-md-1 order-last">
                      <h3>STUDENT RECORDS <!-- <a href="#">
                      <i style="vertical-align:middle;" class="bi bi-info-circle"></i></a> --></h3>
                      <p class="text-subtitle text-muted">For user to view student list</p>
                  </div>
                  <div class="col-12 col-md-6 order-md-2 order-first">
                      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Student List</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
        <section class="section brand">
            <div class="card">                   
                <div class="card-header">
                  <input type="hidden" id="role" name="role" value="<?php echo $sessionrole;?>">
                      <div class="row" id="filter1">
                                <div class="col-lg-6 col-md-3">
                                    <div class="input-group mr-2">
                                        <label class="input-group-text">Filter By</label>                         

                                        <select id="secondfilter" name="secondfilter" class="form-control">
                                            <option value="">Gender</option>
                                            <option value="Male">Male </option>
                                            <option value="Female">Female</option>
                                        </select>

                                        <select id="thirdfilter" name="thirdfilter" class="form-control">
                                            <option value="">Barangay</option>
                                            <?php    
                                                $query = "SELECT s.barangay FROM student_tbl s
                                                LEFT JOIN enrollment_tbl e
                                                ON s.`id` = e.`student_id`
                                                WHERE e.`status` = 'enrolled'
                                                GROUP BY s.`barangay`";
                                                $query_run = mysqli_query($connection, $query);
                                                while($row=$query_run->fetch_assoc()){  
                                                ?>   
                                                     
                                                <option value="<?php echo $row['barangay']?>"> <?php echo $row['barangay']; ?></option>
                                                <?php  
                                                }
                                                ?>                                             
                                        </select>

                                        <select id="fourthfilter" name="fourthfilter" class="form-control">
                                            <option value="">Modality</option>
                                            <option value="Modular">Modular</option>
                                            <option value="Online Class">Online Class</option>
                                            <option value="Flexible">Flexible</option>
                                            <option value="F2F">Face To Face</option>
                                        </select>

                                        <select id="fifthfilter" name="fifthfilter" class="form-control" <?php echo($_SESSION['role']=='Admin')?'': 'hidden'?>>
                                            <option value="">Grade</option>
                                            <option value="Kinder">Kinder</option>
                                            <option value="Grade 1">Grade 1</option>
                                            <option value="Grade 2">Grade 2</option>
                                            <option value="Grade 3">Grade 3</option>
                                            <option value="Grade 4">Grade 4</option>
                                            <option value="Grade 5">Grade 5</option>
                                            <option value="Grade 6">Grade 6</option>
                                        </select>
                                    </div>  
                                </div>  
                                                         
                                <hr class="mt-3">                       
                      </div> 
                </div>                                                   
                <div class="card-body"> 
                  <div class="table-responsive container">                   
                    <table class="text-center table table-bordered table-striped" id="table1" style="width:100%">   
                        <thead style="background-color: #435ebe; color: white; ">
                            <tr>
                                <th style="display: none">ID</th>
                                <th style="">#</th>
                                <th hidden >Photo</th>     
                                <th style="text-align:center;">LRN</th>
                                <th >Name</th>                                 
                                <th hidden>First name</th>
                                <th hidden>Middle name</th>
                                <th hidden>Last name</th>                              
                                <th style="text-align:center;">Gender</th>
                                <th style="text-align: center;">Grade</th>
                                <th style="text-align: center;">Section</th>
                                <th style="text-align: center;">Adviser</th>
                                <th style="text-align: center;">Modality</th>
                                <th style="text-align: center;">Action</th>                                  
                            </tr>
                        </thead>
                        <tbody>
                        <?php
    
                        $name = $_SESSION['name'];
                        if($_SESSION['role']=='Teacher')
                        {
                        $query = "SELECT DISTINCT (s.id) AS `studentID`, s.lrn, s.sex, concat(s.firstname,' ',s.middlename,' ',s.lastname,' ',s.extension) as `Name`,
                        s.firstname,s.middlename,s.lastname,g.grade, ss.sectionname, t.name AS `Advisor`, s.modality   
                        FROM student_tbl s
                        INNER JOIN enrollment_tbl e
                        ON e.student_id = s.id
                        INNER JOIN section_tbl ss
                        ON ss.id = e.section_id
                        INNER JOIN gradelevel_tbl g
                        ON g.id = ss.gradelevel_id
                        INNER JOIN teacher t
                        ON t.id = ss.teacher_id
                        WHERE e.status = 'enrolled' AND t.name = '$name'
                        GROUP BY studentID
                        ORDER BY s.lastname ASC";
                        }
                        else {
                        $query = "SELECT DISTINCT (s.id) AS `studentID`, s.lrn, s.sex, concat(s.firstname,' ',s.middlename,' ',s.lastname,' ',s.extension) as `Name`,
                        s.firstname,s.middlename,s.lastname,g.grade, ss.sectionname, t.name AS `Advisor`, s.modality   
                        FROM student_tbl s
                        INNER JOIN enrollment_tbl e
                        ON e.student_id = s.id
                        INNER JOIN section_tbl ss
                        ON ss.id = e.section_id
                        INNER JOIN gradelevel_tbl g
                        ON g.id = ss.gradelevel_id
                        INNER JOIN teacher t
                        ON t.id = ss.teacher_id
                        WHERE e.status = 'enrolled'
                        GROUP BY studentID
                        ORDER BY s.lastname ASC";
                        }
                        $query_run = mysqli_query($connection, $query);
                        $i=1;
                        while($row=$query_run->fetch_assoc()){
                        ?>                    
                            <tr>
                                <td style="font-size:13px; font-weight: 600;display: none"><?php echo $row['studentID'];?></td>
                                <td style="font-size:13px; font-weight: 600"><?php echo $i?></td>
                                <td style="display: none"><img style="width: 40px;height:40px;object-fit: cover; border-radius: 50%" src="uploads/<?=$row['photo']?>"></td>
                                <td style="font-size:13px; font-weight: 600"><?php echo $row['lrn'];?></td>
                                <td style="font-size:13px; font-weight: 600; text-align:left"><?php echo $row['Name'];?></td>
                                <td hidden><?php echo $row['firstname'];?></td>
                                <td hidden><?php echo $row['middlename'];?></td>
                                <td hidden><?php echo $row['lastname'];?></td>                              
                                <td style="font-size:13px; font-weight: 600"><?php echo $row['sex'];?></td>
                                <td style="font-size:13px; font-weight: 600"><?php echo $row['grade'];?></td>
                                <td style="font-size:13px; font-weight: 600"><?php echo $row['sectionname'];?></td>
                                <td style="font-size:13px; font-weight: 600"><?php echo $row['Advisor'];?></td>
                                <td style="font-size:13px; font-weight: 600"><?php echo $row['modality'];?></td>    
                                <td style="">                               
                                  <button type="button" class="badge btn btn-success btn-sm editStudentSection forLRN" data-bs-toggle="modal" 
                                  data-bs-target="#editStudentSection" id="<?php echo $row['grade'];?>" title="Edit" data-bs-whatever="@getbootstrap" <?php echo($_SESSION['role']=='Teacher')?'': 'hidden'?>>
                                  <i class="bi bi-pencil-square"></i></button><!-- Edit student -->    
                                  
                                  <button type="button" name="viewstudent" id="<?php echo $row['studentID'];?>" data-bs-target="#viewStudentProfile" 
                                  data-bs-toggle="modal" class="badge btn btn-primary btn-sm viewStudentProfile" title="Review">
                                  <i class="bi bi-eye"></i></button><!-- Review Button -->
                                  
                                  <button type="button" class="badge btn btn-danger btn-sm admineditStudentSection" data-bs-toggle="modal" 
                                  data-bs-target="#admineditStudentSection" title="Status" data-bs-whatever="@getbootstrap" <?php echo($_SESSION['role']=='Admin')?'': 'hidden'?>>
                                  <i class="bi bi-pencil-square"></i></button><!-- Edit Status -->                                                             
                                </td>                                         
                            </tr>
                            <?php $i++;} ?>                        
                        </tbody>
                    </table>
                    </div>  
                </div>
            </div>
        </section>
</div>

                <!----------------------------------------------- FOR EDIT MODAL --------------------------------------------------------------------->
<div class="modal fade" id="editStudentSection" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div style="height: 40px" class="modal-header bg-success">
        <h5 style="color:white" class="modal-title" id="exampleModalLabel">EDIT STUDENT INFO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="MyCrud.php" method="POST">   
          <div class="row">
              <div class="col-md-6 col-sm-3">
                <label class="col-form-label">LRN</label>
                <input type="text" name="editlrn" class="form-control check_email" id="editlrn">
                <p class="feedback" style="font-size: .875em; color: #dc3545; margin-top: .25rem"></p>
              </div>
                                
              <div class="col-md-6 col-sm-3">
                <label class="col-form-label">First name</label>
                <input type="text"  name="editfirstname"  class="form-control" id="editfirstname"></textarea>
              </div>
          </div>

          <div class="row">
              <div class="col-md-6 col-sm-3">
                <label class="col-form-label">Middle name</label>
                <input type="text"  name="editmiddlename"  class="form-control" id="editmiddlename"></textarea>
              </div>
              <div class="col-md-6 col-sm-3">
                <label class="col-form-label">Last name</label>
                <input type="text"  name="editlastname"  class="form-control" id="editlastname"></textarea>
              </div>
          </div>
              
          <div class="row">
            <div class="col-md-6 col-sm-3">
              <label class="col-form-label">Grade</label>
              <input type="text" readonly name="editlevelsectionid1" class="form-control" id="editlevelsectionid1"></textarea>
            </div>

            <div class="col-md-6 col-sm-3">
                <label  class="col-form-label">Section</label>
                <select class="form-control" name="editGradeSection" id="editGradeSection" required>
                <option value="" disabled selected>Select</option>          
                </select>
            </div>  
          </div>  
      
            <div class="col-md-6 col-sm-3">
                        <label  class="col-form-label">Modality</label>
                        <select class="form-control" name="editmodality" id="editmodality" required>
                        <option value="" disabled selected>Select</option> 
                        <option value="Modular">Modular</option> 
                        <option value="Online Class">Online Class</option> 
                        <option value="Flexible">Flexible</option> 
                        <option value="F2F">Face to Face</option> 
                        </select>
            </div>  
             
           
        </div>
          <input type="hidden" class="form-control col-md-6" name="editstud_id" id="editstud_id"></textarea>
             

              <div style="height: 48px; margin: 1px; padding:1px;" class="modal-footer">
          
                <button type="submit" name="updatestudent" class="btn btn-success">Save</button>
             </div>
        </form>
      </div>  
    </div>
</div>

<script src="asset/js/pdfexport/jquery-3.5.1.js"></script>
<!-- Script for checking lrn if already existing -->
<script>
    $(document).ready(function(){
        $('.check_email').focusout(function (e){
            var lrn = $('.check_email').val();
            $.ajax({
                type:"POST",
                url: "getlevel.php",
                data: {checklrn:lrn},
                success: function (response){
              
                    if (response.indexOf("Sorry, LRN is already in used.") > -1) 
                    {
                       $('.feedback').text(response);
                       $('.check_email').val('');
                    }
                    else
                    {
                        $('.feedback').text(response);
                    }
                }
            })
        })

                  $(document).on('click','.forLRN', function(){                   
                      var studentgrade = $(this).attr("id");
                      console.log(studentgrade);
                      if (studentgrade !== 'KINDER'){
                      document.getElementById("editlrn").readOnly = true;
                      }
                      else if(studentgrade == "KINDER"){
                        document.getElementById("editlrn").readOnly = false;
                      }
                      $('#editStudentSection').modal('show');
                  });
              });
  </script>

  <!-- ----------------------------------------Admin Manage of Student ---------------------------------------->
<div class="modal fade" id="admineditStudentSection" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div style="height: 40px" class="modal-header bg-success">
        <h5 style="color:white" class="modal-title" id="exampleModalLabel">MANAGE STUDENT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="MyCrud.php" method="POST">   
          <div class="row">                      
              <div class="col-md-6 col-sm-3">
                <label for="editfirstname" class="col-form-label">Name</label>
                <input type="text" readonly name="admineditfirstname"  class="form-control" id="admineditfirstname"></textarea>
              </div>

              <div class="col-md-6 col-sm-3">     
                      <label for="name-text" class="col-form-label">Set status as</label>
                      <select class="form-control" name="adminarchiveas" id="adminarchiveas" required>
                      <option value="" disabled selected>Select</option> 
                      <option value="Graduated">Graduated</option> 
                      <option value="Transferred Out">Transferred Out</option> 
                      <option value="Dropped Out">Dropped Out</option> 
                      </select>
              </div> 
          </div>
              
          <div class="row">
            <div class="col-md-12 col-sm-12">
            <label for="grade" class="col-form-label">Remarks</label>
            <textarea type="text" name="adminremarks" class="form-control" id="adminremarks"></textarea>
             </div>
          </div>  
    </div>
          <input type="text" hidden name="admineditstud_id"  class="form-control col-md-6" id="admineditstud_id"></textarea>
             

              <div style="height: 48px; margin: 1px; padding:1px;" class="modal-footer">
                <button type="submit" name="adminupdatestudent"  class="btn btn-success">Save</button>
             </div>
        </form>
      </div>  
    </div>
</div>

               <!--------------------------------  FOR VIEWING PROFILE MODAL -------------------------->
<div id="modal">
  <div class="modal fade" id="viewStudentProfile" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-md" id="printthismodal">
        <div class="modal-content" style="box-shadow:unset;">
              <div style="height: 40px" class="modal-header text-center">
                <h5 style="color:Black" class="modal-title w-100" id="exampleModalLabel1">STUDENT PROFILE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <form action="printstudentpdf.php" method="POST">
                <div class="modal-body" id="studentDetails">  
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

