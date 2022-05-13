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
                            <h3>CLASS RECORDS<!--  -<a href="#">
                            <i style="vertical-align:middle;" class="bi bi-info-circle"></i></a> --></h3>
                            <p class="text-subtitle text-muted">For Admin/Teacher to view classes</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Class Record</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                         
                <section class="section brand">
                    <div class="card">
                        <div class="card-header">
                              <div class="col-12 d-flex justify-content-end reset-btn">                      
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal" data-bs-whatever="@getbootstrap" <?php echo($_SESSION['role']=='Admin')?'': 'hidden'?>>Add New Class</button>                                                                                                      
                                  </div>
                                  <HR></HR> 
                        </div>
                                  <div class="card-body">                                        
                                    <div class="table-responsive">                   
                                            <table class="text-center table table-bordered table-striped" id="table1" style="width:100%">  
                                                          <thead style="background-color: #435ebe; color: white;">
                                                              <tr>
                                                                  <th style="Display:none">ID</th>
                                                                  <th style="">#</th>
                                                                  <th style="text-align: center;">Level</th>
                                                                  <th style="text-align: center;">Section</th>
                                                                  <th style="text-align: center;">Advisor</th>
                                                                  <th style="display:none;">Students</th>
                                                                  <th style="display:none;">id</th>
                                                                  <th style="text-align: center;">Boys</th>
                                                                  <th style="text-align: center;">Girls</th>
                                                                  <th style="text-align: center;">Total</th>
                                                                  <th style="text-align: center;">Action</th>                                                          
                                                              </tr>
                                                          </thead>
                                                          <tbody>

                                                          <?php
                                            
                                                    $name = $_SESSION['name'];
                                                    $userid = $_SESSION['userid'];
                                                    if($_SESSION['role']=='Teacher')
                                                    {
                                                    $query = "SELECT s.id AS `ClassID`, g.grade AS `Grade`, s.sectionname AS `Section`, t.name AS `Advisor`, 
                                                    COUNT(IF(e.status = 'enrolled', e.section_id, NULL)) AS students, g.id,
                                                    COUNT(IF(ss.sex = 'Male',ss.id, NULL)) AS `boys`, 
						                                        COUNT(IF(ss.sex = 'female',ss.id, NULL)) AS `girls`, COUNT(ss.id) AS `total`
                                                    FROM section_tbl s
                                                    INNER JOIN gradelevel_tbl g
                                                    ON g.id = s.gradelevel_id
                                                    INNER JOIN teacher t
                                                    ON t.id = s.teacher_id
                                                    LEFT JOIN enrollment_tbl e
                                                    ON e.section_id = s.id
                                                    LEFT JOIN student_tbl ss
                                                    ON e.student_id = ss.id
                                                    where t.id = ".$userid."
                                                    GROUP BY s.id
                                                    ORDER BY g.id";
                                                    }
                                                    else
                                                    {
                                                    $query = "SELECT s.id AS `ClassID`, g.grade AS `Grade`, s.sectionname AS `Section`, t.name AS `Advisor`, 
                                                    COUNT(IF(e.status = 'enrolled', e.section_id, NULL)) AS students, g.id,
                                                    COUNT(IF(ss.sex = 'Male',ss.id, NULL)) AS `boys`, 
                                                    COUNT(IF(ss.sex = 'female',ss.id, NULL)) AS `girls`, COUNT(ss.id) AS `total`
                                                    FROM section_tbl s
                                                    INNER JOIN gradelevel_tbl g
                                                    ON g.id = s.gradelevel_id
                                                    INNER JOIN teacher t
                                                    ON t.id = s.teacher_id
                                                    LEFT JOIN enrollment_tbl e
                                                    ON e.section_id = s.id
                                                    LEFT JOIN student_tbl ss
                                                    ON e.student_id = ss.id
                                                    GROUP BY s.id
                                                    ORDER BY g.id";
                                                    }   
                                                    $query_run = mysqli_query($connection, $query);
                                                    $i=1;
                                                    while($row=$query_run->fetch_assoc()){                    
                                                    ?>
                                                      <tr>
                                                        <td style="Display:none"><?php echo $row['ClassID'];?></td>
                                                        <td style="font-size:13px; font-weight: 600"><?php echo $i?></td>
                                                        <td style="font-size:13px; font-weight: 600"><?php echo $row['Grade'];?></td>
                                                        <td style="font-size:13px; font-weight: 600"><?php echo $row['Section'];?></td>
                                                        <td style="font-size:13px; font-weight: 600"><?php echo $row['Advisor'];?></td>
                                                        <td style="display:none;"><?php echo $row['students'];?></td>
                                                        <td style="display:none;"><?php echo $row['id'];?></td>
                                                        <td style="text-align: center;"><?php echo $row['boys'];?></td>
                                                        <td style="text-align: center;"><?php echo $row['girls'];?></td>
                                                        <td style="text-align: center;"><?php echo $row['total'];?></td>
                                                        <td>                               
                                                          <button type="button" class="badge btn btn-success editLevel" data-bs-toggle="modal" 
                                                          data-bs-target="#editmodallevel" data-bs-whatever="@getbootstrap" <?php echo($_SESSION['role']=='Admin')?'': 'hidden'?>>Edit</button>  
                                                         <!--  <button type="button" class="badge btn btn-danger removeLevel" data-bs-toggle="modal" 
                                                          data-bs-target="#removemodallevel" data-bs-whatever="@getbootstrap" <?php echo($_SESSION['role']=='Admin')?'': 'hidden'?>>Remove</button>   -->                                                        
                                                         <!--  <button type="button"  id="<?php echo $row['ClassID'];?>" class="badge btn btn-info tableModal"
                                                          data-bs-toggle="modal" data-bs-target="#tableModal" >View Class</button>   -->                                                                                                                                                                                                                                                    
                                                          <a href="/spes/index.php?page=section&classid=<?php echo $row['ClassID'];?>"><button type="button"  id="<?php echo $row['ClassID'];?>" class="badge btn btn-info seeClass">View Class</button>  </a>                                                                                                                                                                                                                                              
                                                        </td>                        
                                                      </tr>
                                                      <?php 
                                                    $i++;
                                                    } ?>      
                                                    </tbody>
                                             </table>
                                            </div>
                                        </div>
                     </div>
                </section>        
</div>

<!----------------------------------------------- FOR ADDING LEVEL AND SECTION MODAL --------------------------------------------------------------------->
  
<div class="modal fade" id="addModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="height: 40px" class="modal-header bg-primary">
        <h5 style="color:white" class="modal-title" id="exampleModalLabel">ADD CLASS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                                                 
        <form action="MyCrud.php" method="POST" >
            <div class="mb-3">
                <label for="level">Level</label>
                <select class="form-control" name="level" id="level" onchange="selectTeacher()" required>
                <option value="" disabled selected>Select</option> 
                <?php      
                  $query = "SELECT * FROM `gradelevel_tbl`";
                  $query_run = mysqli_query($connection, $query);
                  while($row=$query_run->fetch_assoc()){  
                  ?>     
                  <option value="<?php echo $row['id']?>"><?php echo $row['grade'];?></option>
                  <?php  
                  }
                  ?>  
                </select>
            </div>

            <div class="mb-3">
                <label for="section" class="col-form-label">Section</label>
                <input type="text" name="section" class="form-control checksection" id="section" required></textarea>
                <p class="feedback" style="font-size: .875em; color: #dc3545; margin-top: .25rem"></p>
            </div>

            <div class="mb-3">
              <label for="advisory" class="col-form-label">Assigned Teacher</label>            
              <select class="form-control" name="advisor" id="advisor" required>
              <option value="" disabled selected>Select Advisor</option> 
         
              </select>
          </div>

              <div style="height: 35px; margin: 1px; padding:1px;" class="modal-footer">
                    <button type="submit" name="insertsection" class="btn btn-primary">Save</button>
            </div>
        </form>     
      </div>   
    </div>
  </div>
</div>

<!-- Script for checking lrn if already existing -->
<script>
    $(document).ready(function(){
        $('.checksection').focusout(function (e){
            var section = $('.checksection').val();
            $.ajax({
                type:"POST",
                url: "getlevel.php",
                data: {checksection:section},
                success: function (response){
              
                    if (response.indexOf("Sorry, Section is already existing.") > -1) 
                    {
                       $('.feedback').text(response);
                       $('.checksection').val('');
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
<!----------------------------------------------- FOR EDITING LEVEL AND SECTION MODAL --------------------------------------------------------------------->
<div class="modal fade" id="editmodallevel" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="height:40px" class="modal-header bg-success">
        <h5 style="color:white" class="modal-title" id="exampleModalLabel1">EDIT CLASS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="MyCrud.php" method="POST" >

        
          <div class="mb-3">
              <label for="level">Level</label>
              <input type="text" readonly class="form-control" name="editlevel" id="editlevel"  required></textarea>   
              </select>
          </div>

          <div class="mb-3">
            <label for="section" class="col-form-label">Section</label>
            <input type="text" class="form-control checksection1" name="editsection" id="editsection" required></textarea>
            <p class="feedback" style="font-size: .875em; color: #dc3545; margin-top: .25rem"></p>
          </div>

          <div class="mb-3">
              <label for="advisory" class="col-form-label">Assigned Teacher</label>            
              <select class="form-control" name="editadvisor" id="editadvisor">
              <option value="" disabled selected>Select</option> 

              </select>
          </div>
            <input type="hidden"  readonly class="form-control" name="update_id" id="update_id"></textarea>
            <input type="hidden"  readonly class="form-control" name="editgradeid" id="editgradeid"></textarea>

          <div style="height: 35px; margin: 1px; padding:1px;" class="modal-footer">
        <button type="submit" name="updatesection" class="btn btn-success">Update Data</button>
      </div>

        </form>
      </div>      
    </div>
  </div>
</div>

<!-- Script for checking lrn if already existing -->
<script>
    $(document).ready(function(){
        $('.checksection1').focusout(function (e){
            var section = $('.checksection1').val();
            $.ajax({
                type:"POST",
                url: "getlevel.php",
                data: {checksection:section},
                success: function (response){
              
                    if (response.indexOf("Sorry, Section is already existing.") > -1) 
                    {
                       $('.feedback').text(response);
                       $('.checksection1').val('');
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


<!----------------------------------------------- FOR REMOVING LEVEL AND SECTION MODAL --------------------------------------------------------------------->
<div class="modal fade" id="removemodallevel" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="height:40px" class="modal-header bg-danger">
        <h5 style="color:white" class="modal-title" id="exampleModalLabel1">REMOVE CLASS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="MyCrud.php" method="POST" >

           <p>Are you sure you want to remove this record?</p>         
            <input type="hidden" readonly class="form-control" name="removeId" id="removeId"></textarea>

          <div style="height: 35px; margin: 1px; padding:1px;" class="modal-footer">
        <button type="submit" name="deleteSection" class="btn btn-danger">Yes</button>
      </div>

        </form>
      </div>      
    </div>
  </div>
</div>


  <!-----------------------------------------------List of student in table modal -------------------------->
    <div class="modal fade" id="tableModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-xl">
       <div class="modal-content">
            <div style="height:40px" class="modal-header bg-info text-center">
              <h5 style="color:white;" class="modal-title w-100" id="exampleModalLabel1">CLASS RECORD</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action="printpdf.php" method="POST">
              <div class="modal-body" id="sectiondetails">    
             </div>
             <!-- footer -->
            <div style="height: 48px; margin: 1px; padding:1px;" class="modal-footer">
            <?php 
     
              $query = "SELECT SchoolYear,SchoolHead FROM `schoolyear_tbl`";
              $query_run = mysqli_query($connection, $query);
              while($row=$query_run->fetch_assoc()){
              ?>   
              <input type="hidden" readonly class="form-control" 
              name="schoolyear" id="schoolyear" value="<?php echo $row['SchoolYear']?>"></textarea>
              <input type="hidden" readonly class="form-control" 
              name="schoolhead" id="schoolhead" value="<?php echo $row['SchoolHead']?>"></textarea>
              <?php  
              }
              ?> 
            <input type="hidden" readonly class="form-control" name="male" id="male"></textarea>
            <input type="hidden" readonly class="form-control" name="female" id="female"></textarea>
            <input type="hidden" readonly class="form-control" name="total" id="total"></textarea>
            <input type="hidden" readonly class="form-control" name="gradelevel" id="gradelevel"></textarea>
            <input type="hidden" readonly class="form-control" name="gradesection" id="gradesection"></textarea>
            <input type="hidden" readonly class="form-control" name="sectioner" id="sectioner"></textarea>
            <input type="hidden" readonly class="form-control" name="advisorcheck" id="advisorcheck"></textarea>

            <button type="submit" name="viewreport" class="btn btn-info" >Print SF1</button>
          </div>
      </form>
      </div>      
    </div>
  </div>


<script>
function selectTeacher()
  {
                      var gradeadvisor =  $("#level :selected").text();            
                      console.log(gradeadvisor);
                      $.ajax({
                                  data:{gradeadvisor:gradeadvisor},
                                  method: "POST",
                                  url: "getlevel.php",
                                  success: function(data)
                                  {
                                      $('#advisor').html(data)
                                      console.log(data);
                                  }
                              })           
  }
</script>
