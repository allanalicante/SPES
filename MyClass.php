<script src="https://cdn.lordicon.com/lusqsztk.js"></script>
<script src="asset/js/pdfexport/jquery-3.5.1.js"></script>


<?php
include('connect.php');

  // for viewing class record
 if(isset($_REQUEST['classid']))
  {
        $thisClass = $_REQUEST['classid'];
        $output = '';
        // Query for selecting list of student per section
        $query = "SELECT DISTINCT (s.id) AS `studentID`, s.lrn, s.photo, s.lastname, s.firstname, s.middlename,
                g.grade, ss.sectionname, t.name AS `Advisor`, s.modality, s.studenttype 
                FROM student_tbl s
                INNER JOIN enrollment_tbl e
                ON e.student_id = s.id
                INNER JOIN section_tbl ss
                ON ss.id = e.section_id
                INNER JOIN gradelevel_tbl g
                ON g.id = ss.gradelevel_id
                INNER JOIN teacher t
                ON t.id = ss.teacher_id
                WHERE ss.id = '".$_REQUEST['classid']."'
                GROUP BY studentID
                ORDER BY s.lastname ASC";        
                $result = mysqli_query($connection, $query);
                $i=1;
        // Query for selecting assigned teacher per section
        $query2 = "SELECT s.teacher_id, CONCAT(g.grade,' - ', s.sectionname) AS `Class`, g.grade, s.sectionname, u.image, t.name
                FROM section_tbl s
                INNER JOIN gradelevel_tbl g
                ON g.id = s.gradelevel_id
                INNER JOIN teacher t
                ON t.id = s.teacher_id
                INNER JOIN users u
                ON u.id = t.id
                WHERE s.id ='".$_REQUEST['classid']."'";
                $result2 = mysqli_query($connection, $query2);
                while ($row = mysqli_fetch_array($result2)) { 
                    $gradelevel = $row['grade'];
                    $section = $row['sectionname'];         
                    $class = $row['Class'];
                    $advisor = $row['name'];
                    $image_name = $row["image"];
                    } 
        // Query for counting total numbers of pupils / boys / girls per section
        $query3 = "SELECT COUNT(IF(s.sex = 'Male',s.id, NULL)) AS `male`, 
                COUNT(IF(s.sex = 'female',s.id, NULL)) AS `female`, COUNT(s.id) AS `total`
                FROM student_tbl s
                INNER JOIN enrollment_tbl e
                ON s.id = e.student_id
                WHERE e.status = 'enrolled'
                AND e.section_id ='".$_REQUEST['classid']."'";
                $result3 = mysqli_query($connection, $query3);
                while ($row = mysqli_fetch_array($result3)) {           
                $male = $row['male'];
                $female = $row['female'];
                $total = $row["total"];
                }
        // Query for selecting the current school year     
        $query4 = "SELECT SchoolYear,SchoolHead FROM `schoolyear_tbl`";
                $result4 = mysqli_query($connection, $query4);
                while($row=$result4->fetch_assoc()){
                $SchoolYear = $row['SchoolYear'];
                $SchoolHead = $row["SchoolHead"];
                }

?>
                    
                    
        
                   
                
        <div class="page-heading" id="mainbody"> <!--------------------------------- Profile Statistic Heading -------------------------->
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3><?php echo $class?></h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Section</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        
            <form action="printpdf.php" method="POST">
                        
                    <input type="hidden" readonly class="form-control" 
                    name="schoolyear" id="schoolyear" value="<?php echo $SchoolYear;?>"></textarea>
                    <input type="hidden" readonly class="form-control" 
                    name="schoolhead" id="schoolhead" value="<?php echo $SchoolHead;?>"></textarea>
                    <input type="hidden" readonly class="form-control" name="male" id="male" value="<?php echo $male;?>"></textarea>
                    <input type="hidden" readonly class="form-control" name="female" id="female" value="<?php echo $female?>"></textarea>
                    <input type="hidden" readonly class="form-control" name="total" id="total" value="<?php echo $total;?>"></textarea>
                    <input type="hidden" readonly class="form-control" name="gradelevel" id="gradelevel" value="<?php echo $gradelevel;?>"></textarea>
                    <input type="hidden" readonly class="form-control" name="gradesection" id="gradesection" value="<?php echo $section;?>"></textarea>
                    <input type="hidden" readonly class="form-control" name="sectioner" id="sectioner" value="<?php echo $thisClass;?>"></textarea>
                    <input type="hidden" readonly class="form-control" name="advisorcheck" id="advisorcheck" value="<?php echo $advisor;?>"></textarea>
           
                <section class="row">
                    <div class="col-12 col-lg-12">  <!------------------- Basic Statistics Row 1 --------------------->
                            <div class="row">
                                <div class="col-12 col-lg-3 col-md-6">
                                    <div class="card mb-1">                               
                                        <div class="card-body py-4">
                                            <div class="d-flex align-items-center">
                                                <div class="stats-icon">
                                                    <img style="width: 50px;height:50px;object-fit: cover; border-radius: 15%" 
                                                    src="uploads/<?php echo $image_name;?>"/>
                                                </div>
                                                <div class="ms-3 name">
                                                    <h6 class="text-muted font-semibold">Advisor</h6>
                                                    <h6 class="font-extrabold mb-0"><?php echo $advisor;?></h5>                       
                                                </div>
                                            </div>  
                                        </div>                                 
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 col-md-6">
                                        <div class="card mb-1">
                                            <div class="card-body py-4">                                         
                                                    <div class="d-flex align-items-center">
                                                        <div class="stats-icon purple">
                                                            <lord-icon
                                                                src="https://cdn.lordicon.com/kjkiqtxg.json"
                                                                trigger="hover"
                                                                colors="outline:#121331,primary:#b26836,,secondary:#4bb3fd,tertiary:#f9c9c0,quaternary:#ebe6ef"
                                                                style="width:250px;height:250px">
                                                            </lord-icon>
                                                        </div>                                                
                                                        <div class="ms-3 name">
                                                            <h6 class="text-muted font-semibold">Total Pupils</h6>
                                                            <h6 class="font-extrabold mb-0"><?php echo $total;?></h6>
                                                        </div>                                            
                                                    </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-12 col-lg-3 col-md-6">
                                        <div class="card mb-1">
                                            <div class="card-body py-4">                                           
                                                    <div class="d-flex align-items-center">
                                                        <div class="stats-icon blue">
                                                            <lord-icon
                                                                src="https://cdn.lordicon.com/vusrdugn.json"
                                                                trigger="hover"
                                                                colors="outline:#121331,primary:#b26836,secondary:#4bb3fd,tertiary:#f9c9c0,quaternary:#ebe6ef"
                                                                style="width:250px;height:250px">
                                                            </lord-icon>                                                  
                                                        </div>                                                                                            
                                                        <div class="ms-3 name">
                                                            <h6 class="text-muted font-semibold">Total Boys</h6>
                                                            <h6 class="font-extrabold mb-0"><?php echo $male;?></h6>
                                                        </div>
                                                    </div>
                                            </div>                                      
                                        </div>     
                                </div>
                                <div class="col-12 col-lg-3 col-md-6">
                                        <div class="card mb-1">
                                            <div class="card-body py-4">
                                                <div class="d-flex align-items-center">                                               
                                                    <div class="stats-icon green">
                                                        <lord-icon
                                                            src="https://cdn.lordicon.com/qemhfpjm.json"
                                                            trigger="hover"
                                                            style="width:250px;height:250px">
                                                        </lord-icon>
                                                    </div>                                            
                                                    <div class="ms-3 name">
                                                        <h6 class="text-muted font-semibold">Total Girls</h6>
                                                        <h6 class="font-extrabold mb-0"><?php echo $female;?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                    </div>

                    <div class="col-12 col-lg-12">  <!-------------------- Student list Row 2 ---------------------->
                        <div class="col-12 d-flex justify-content-end reset-btn">                
                            <button type="submit" name="viewreport" class="btn btn-primary me-1 mt-3 mb-2" id="'.$_REQUEST['classid'].'">
                                <i class="bi bi-printer">
                                </i>Print SF1
                            </button>
                        </div>
                        <div class="card">
                            <div class="card-header mt-0 pt-1">
                        <br>
                        <div class="row" id="filter1">
                                <div class="col-lg-5 col-md-3">
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
                                    </div>  
                                </div>                         
                        </div> 
                             <hr>                                
                             </div>                                                   
                            <div class="card-body">                      
                              <div class="table-responsive container">                                 
                                <table class="display dataTable table table-bordered table-striped text-center" id="table1" style="width: 100%">  
                                    <thead style="background-color: #435ebe; color: white; ">
                                        <tr>       
                                            <th style="text-align: center;">#</th>                                                                                                        
                                            <th style="text-align: center;">First name</th>
                                            <th style="text-align: center;">Last name</th>
                                            <th style="text-align:center;">LRN</th>
                                            <th style="text-align:center;">Age</th>
                                            <th style="text-align: center;">Modality</th>                                                                                                                                                 
                                            <th style="text-align: center;">Action</th>                                                                                                                                                 
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php
            
                                $query = "SELECT DISTINCT (s.id) AS `studentID`, s.lrn, s.photo, s.lastname, s.firstname, s.age,
                                g.grade, ss.sectionname, t.name AS `Advisor`, s.modality, s.studenttype 
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
                                AND ss.id = $thisClass
                                GROUP BY studentID
                                ORDER BY s.lastname ASC";

                                $query_run = mysqli_query($connection, $query);
                                $i=1;
                                while($row=$query_run->fetch_assoc()){
                                ?>                    
                                    <tr>                      
                                        <td style="font-size:13px; font-weight: 600"><?php echo $i?></td>
                                        <td style="font-size:13px; font-weight: 600"><?php echo $row['firstname'];?></td>
                                        <td style="font-size:13px; font-weight: 600"><?php echo $row['lastname'];?></td>
                                        <td style="font-size:13px; font-weight: 600"><?php echo $row['lrn'];?></td>
                                        <td style="font-size:13px; font-weight: 600"><?php echo $row['age'];?></td>
                                        <td style="font-size:13px; font-weight: 600"><?php echo $row['modality'];?></td>
                                        <td>
                                        <button type="button" name="viewstudent" id="<?php echo $row['studentID'];?>" data-bs-target="#viewStudentProfile" data-bs-toggle="modal"  class="badge btn btn-primary viewStudentProfile">Profile</button>  
                                        </td>                                                                         
                                    </tr>
                                    <?php 
                                    $i++;
                                    } 
                                    ?>                        
                                </tbody>
                                </table>
                                </table>
                                                              
                              </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>      
        </div>       
        <?php    
    }                                               
?>
               <!--------------------------------  FOR VIEWING PROFILE MODAL -------------------------->
<div id="modal">
    <div class="modal fade" id="viewStudentProfile" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content" style="box-shadow:unset;">
                    <div style="height: 40px" class="modal-header text-center">
                    <h5 style="color:black" class="modal-title w-100" id="exampleModalLabel1">STUDENT PROFILE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <form action="printstudentpdf.php" method="POST">
                    <div class="modal-body" id="studentDetails">  
                    </div>

                    <div style="height: 48px; margin: 1px; padding:1px;" class="modal-footer">     
                        <input type="hidden" id="printId" name="printId">      
                        <button type="submit" id="thisbutt" name="printstudent" class="btn btn-light-secondary">Print</button>
                    </div>
                </form>
            </div>      
        </div>
    </div>
</div>



