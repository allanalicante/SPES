<script src="asset/vendors/apexcharts/apexcharts.js"></script>
<?php
    if(!isset($_SESSION['role']))
    {
    header('location:login.php');
    exit();
    } 
?>
<?php 

//Condition queries if Admin or Teacher
if ($_SESSION['role'] == 'Admin'){
  $sqly = "SELECT ( SELECT COUNT(*) FROM student_tbl s INNER JOIN enrollment_tbl e ON s.id = e.student_id WHERE e.`status` = 'enrolled' ) AS `TotalPupils`,
  ( SELECT COUNT(*) FROM teacher t INNER JOIN users u ON t.id = u.id WHERE u.`status` = 'Active' ) AS `TotalTeachers`,
  ( SELECT COUNT(*) FROM section_tbl ) AS `TotalClass`,
  ( SELECT COUNT(*) FROM enrollment_tbl WHERE STATUS = 'pending') AS `TotalPending`";
  $result = mysqli_query($connection,$sqly);
  }
elseif ($_SESSION['role'] == 'Teacher'){
  $id = $_SESSION['gradeid'];
  $userid = $_SESSION['userid'];

  $sqlz = "SELECT ( SELECT COUNT(*) AS `TotalPupils`
                    FROM student_tbl s 
                    INNER JOIN enrollment_tbl e 
                    ON s.id = e.student_id
                    INNER JOIN section_tbl se
                    ON e.`section_id` = se.`id` 
                    INNER JOIN teacher t
                    ON se.`teacher_id` = t.`id`
                    WHERE e.`status` = 'enrolled'
                    AND t.id = '$userid') AS `TotalPupils`,
              ( SELECT COUNT(*) FROM teacher t INNER JOIN users u ON t.id = u.id WHERE u.`status` = 'Active' ) AS `TotalTeachers`,
              ( SELECT COUNT(*) FROM section_tbl  WHERE teacher_id = '$userid') AS `TotalClass`,
              ( SELECT COUNT(e.id)
                    FROM enrollment_tbl e
                    LEFT JOIN section_tbl s
                    ON e.section_id = s.id
                    LEFT JOIN gradelevel_tbl g
                    ON s.gradelevel_id = g.id
                    LEFT JOIN teacher t
                    ON s.gradelevel_id = t.gradetohandle
                    LEFT JOIN student_tbl st
                    ON e.student_id = st.id
                    WHERE e.status ='pending'
                    AND st.gradetoenroll = '$id') AS `TotalPending`";
                    $result = mysqli_query($connection,$sqlz);
  }             
      while ($row = mysqli_fetch_array($result)) { 
            $totalstudents = $row['TotalPupils'];
            $totalteachers = $row['TotalTeachers'];
            $totalpending = $row['TotalPending'];
            $totalclass = $row['TotalClass'];
          }
          
 //Query for counting total male enrolled for gender statistic per role


 $userid = $_SESSION['userid'];
if ($_SESSION['role'] == 'Admin'){
  $sql10 = "SELECT COUNT(s.id) AS totalmale FROM student_tbl s
              INNER JOIN enrollment_tbl e
              ON e.student_id = s.id
              WHERE STATUS='enrolled' AND sex = 'Male'";
               $result = mysqli_query($connection,$sql10);
  }
elseif ($_SESSION['role'] == 'Teacher') {
  $sql100 = "SELECT COUNT(*) AS `totalmale`
            FROM student_tbl s 
            INNER JOIN enrollment_tbl e 
            ON s.id = e.student_id
            INNER JOIN section_tbl se
            ON e.`section_id` = se.`id` 
            INNER JOIN teacher t
            ON se.`teacher_id` = t.`id`
            WHERE e.`status` = 'enrolled'
            AND s.`sex` = 'Male'
            AND t.id = ".$userid."";
            $result = mysqli_query($connection,$sql100);
  }
               while ($row = mysqli_fetch_array($result)) { 
                    $male = $row['totalmale'];
               }
          
//Query for counting total female enrolled for gender statistic per role
if ($_SESSION['role'] == 'Admin'){
  $sql11 = "SELECT COUNT(s.id) AS totalfemale FROM student_tbl s
              INNER JOIN enrollment_tbl e
              ON e.student_id = s.id
              WHERE STATUS='enrolled' AND sex = 'Female'";
               $result = mysqli_query($connection,$sql11);
  }
elseif ($_SESSION['role'] == 'Teacher') {
  $sql111 = "SELECT COUNT(*) AS `totalfemale`
            FROM student_tbl s 
            INNER JOIN enrollment_tbl e 
            ON s.id = e.student_id
            INNER JOIN section_tbl se
            ON e.`section_id` = se.`id` 
            INNER JOIN teacher t
            ON se.`teacher_id` = t.`id`
            WHERE e.`status` = 'enrolled'
            AND s.`sex` = 'Female'
            AND t.id = ".$userid."";
            $result = mysqli_query($connection,$sql111);
    }
            while ($row = mysqli_fetch_array($result)) { 
              $female = $row['totalfemale'];
            }

    $sql="SELECT g.grade, COUNT(s.id) AS `MaleEnrolled`
    FROM gradelevel_tbl g
    LEFT JOIN section_tbl ss
    ON g.id = ss.gradelevel_id
    LEFT JOIN enrollment_tbl e
    ON ss.id = e.section_id
    LEFT JOIN student_tbl s
    ON e.id = s.id
    AND s.sex = 'male' AND e.dateofenroll = CURDATE()
    GROUP BY g.id";
    $result = mysqli_query($connection,$sql);

    while ($row = mysqli_fetch_array($result)) { 
      
      $Grade[] = $row['grade'];
      $MaleEnrolled[] = $row['MaleEnrolled'];     
    }
    /* ------------------------------------------------- */
    $sql1="SELECT g.grade, COUNT(s.id) AS `FemaleEnrolled`
    FROM gradelevel_tbl g
    LEFT JOIN section_tbl ss
    ON g.id = ss.gradelevel_id
    LEFT JOIN enrollment_tbl e
    ON ss.id = e.section_id
    LEFT JOIN student_tbl s
    ON e.id = s.id
    AND s.sex = 'female' AND e.dateofenroll = CURDATE()
    GROUP BY g.id";
    $result = mysqli_query($connection,$sql1);

    while ($row = mysqli_fetch_array($result)) { 
      $FemaleEnrolled[] = $row['FemaleEnrolled'];     
    }
    /* ------------------------------------------------- */
    $sql2 ="SELECT 'Male' AS Label, COUNT(sex) AS VALUE FROM student_tbl WHERE sex = 'Male'
    UNION (
    SELECT 'Female' AS Label, COUNT(sex) AS VALUE FROM student_tbl WHERE sex= 'Female' )";
    $result = mysqli_query($connection,$sql2);

    while ($row = mysqli_fetch_array($result)) { 
      
      $Label[]  = $row['Label'];
      $Value[] = $row['VALUE'];      
    }
    /* ---------------------------------------------------- */
    $sql3 ="SELECT g.grade, COUNT(s.id) AS `enrolled`
    FROM gradelevel_tbl g
    LEFT JOIN section_tbl ss
    ON g.id = ss.gradelevel_id
    LEFT JOIN enrollment_tbl e
    ON ss.id = e.section_id
    LEFT JOIN student_tbl s
    ON e.id = s.id
    AND e.dateofenroll = CURDATE()
    GROUP BY g.id";
    $result = mysqli_query($connection,$sql3);

    while ($row = mysqli_fetch_array($result)) {           
      $total[]  = $row['enrolled'];
    }
            
    $sql4 = "SELECT EnrollmentStatus FROM schoolyear_tbl WHERE ACTIVE = 'Yes'";
    $result = mysqli_query($connection,$sql4);

    while ($row = mysqli_fetch_array($result)) {           
      $status  = $row['EnrollmentStatus'];
    }


    $sql77 = "SELECT image FROM users WHERE id = '$userid'";
    $result = mysqli_query($connection,$sql77);

    while ($row = mysqli_fetch_array($result)) {           
      $profileimage  = $row['image'];
    }

?>

        <div class="page-heading"> <!--------------------------------- Profile Statistic Heading -------------------------->
          <h3>PROFILE STATISTICS<span style="float:right">ENROLLMENT STATUS: <span style="color:red"><?php echo $status?></span></span></h3>
        </div>

          <div class="page-content">
              <section class="row">
                  <div class="col-12 col-lg-12 ">  <!-------------------- Basic Statistics Row 1 -------------------------->
                          <div class="row">
                              <div class="col-12 col-lg-3 col-md-6">
                                  <a href="?page=records&data=student-list">
                                      <div class="card brand">
                                          <div class="card-body py-4">                                         
                                                  <div class="d-flex align-items-center">
                                                      <div class="stats-icon purple">
                                                          <lord-icon
                                                          src="https://cdn.lordicon.com/vusrdugn.json"
                                                          trigger="hover"
                                                          colors="outline:#121331,primary:#b26836,secondary:#4bb3fd,tertiary:#f9c9c0,quaternary:#ebe6ef"
                                                          style="width:250px;height:250px">
                                                      </lord-icon>
                                                      </div>
                                                  <div class="ms-3 name">
                                                      <h6 class="text-muted font-semibold">Total Pupils</h6>
                                                      <h6 class="font-extrabold mb-0"><?php echo $totalstudents?></h6>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </a>
                              </div>
                              <div class="col-12 col-lg-3 col-md-6">
                                    <div class="card brand">
                                          <div class="card-body py-4">                                           
                                                  <div class="d-flex align-items-center">
                                                      <div class="stats-icon blue">
                                                      <lord-icon
                                                          src="https://cdn.lordicon.com/qemhfpjm.json"
                                                          trigger="hover"
                                                          style="width:250px;height:250px">
                                                      </lord-icon>
                                                      </div>                                             
                                                  <div class="ms-3 name">
                                                      <h6 class="text-muted font-semibold">Total Teachers</h6>
                                                      <h6 class="font-extrabold mb-0"><?php echo $totalteachers ?></h6>
                                                  </div>
                                          </div>                                      
                                      </div>
                                  </div>      
                              </div>
                              <div class="col-12 col-lg-3 col-md-6">
                                  <a href="?page=records&data=section-list">
                                      <div class="card brand">
                                          <div class="card-body py-4">
                                              <div class="d-flex align-items-center">                                               
                                                      <div class="stats-icon green">
                                                          <lord-icon
                                                          src="https://cdn.lordicon.com/ddqkigxl.json"
                                                          trigger="hover"
                                                          style="width:250px;height:250px">
                                                      </lord-icon>
                                                      </div>                                            
                                                  <div class="ms-3 name">
                                                      <h6 class="text-muted font-semibold">Total Classes</h6>
                                                      <h6 class="font-extrabold mb-0"><?php echo $totalclass ?></h6>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </a>
                              </div>
                              <div class="col-12 col-lg-3 col-md-6">
                                <div class="card brand" >
                                  <a href="?page=profile" class="ManageTeacher">
                                    <div class="card-body py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="stats-icon">
                                            <img style="width: 50px;height:50px;object-fit: cover; border-radius: 10%" 
                                            src="uploads/<?php echo $profileimage?>"/>
                                            </div>
                                            <div class="ms-3 name">
                                                <h6 class="text-muted font-semibold"><?php echo $_SESSION['role']; ?></h6>
                                                <h6 class="font-extrabold mb-0"><?php echo $_SESSION['name']; ?></h5>                       
                                            </div>
                                        </div>
                                    </div>   
                                  </a>            
                                </div>
                              </div>
                  </div>
                  <div class="col-12 col-lg-12"> <!-------------------- Advanced Statistic Using Apex Chart JS Row 2 -------------------------------->
                          <div class="row">
                              <div class="col-lg-9 col-md-12"><!-- Today's Enrollees -->
                                          <div class="card">
                                                <div class="card-header">
                                                    <h4>Daily Enrollees</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div id="chart-profile-visit"></div>  
                                                    <script>
                                                    var barOptions = {
                                                      series: [
                                                        {
                                                          name: "Male",
                                                          data: <?php echo json_encode($MaleEnrolled); ?>,
                                                        },
                                                        {
                                                          name: "Total",
                                                          data: <?php echo json_encode($total); ?>,
                                                        },
                                                        {
                                                          name: "Female",
                                                          data: <?php echo json_encode($FemaleEnrolled); ?>,
                                                        },
                                                      ],
                                                      chart: {
                                                        type: "bar",
                                                        height: 350,
                                                      },
                                                      plotOptions: {
                                                        bar: {
                                                          borderRadius: 10,
                                                          horizontal: false,
                                                          columnWidth: "60%",
                                                          endingShape: "rounded",
                                                          dataLabels: {
                                                          position: 'top',
                                                          },
                                                        },
                                                      },
                                                      dataLabels: {
                                                        enabled: true,
                                                      },
                                                      stroke: {
                                                        show: true,
                                                        width: 1,
                                                        colors: ["transparent"],
                                                      },
                                                      xaxis: {
                                                        categories: <?php echo json_encode($Grade); ?>,
                                                      },
                                                      yaxis: {
                                                    /*     labels: {
                                                          formatter: function(val) {
                                                            return val.toFixed(0)
                                                          }
                                                        }, */
                                                        title: {
                                                          text: "",
                                                        },
                                                      },
                                                      fill: {
                                                        opacity: 1,
                                                      },
                                                      
                                                    };
                                                        var chartbarOptions = new ApexCharts(document.querySelector("#chart-profile-visit"), barOptions);
                                                        chartbarOptions.render();
                                                    </script>                                                              
                                                </div>
                                  </div>
                              </div> 
                              <div class="col-lg-3 col-md-4">
                                <div class="row">
                                  <a href="?page=records&data=pending-student">
                                      <div class="card brand">
                                          <div class="card-body py-4">
                                                  <div class="d-flex align-items-center">
                                                      <div class="stats-icon green">
                                                      <lord-icon
                                                          src="https://cdn.lordicon.com/osvvqecf.json"
                                                          trigger="hover"
                                                          
                                                          style="width:250px;height:250px">
                                                      </lord-icon>
                                                      </div>
                                                      <div class="ms-3 name">
                                                          <h6 class="text-muted font-semibold">Pending</h6>
                                                          <h6 class="font-extrabold mb-0"><?php echo $totalpending ?></h6>
                                                      </div>
                                                </div>
                                          </div>
                                      </div>                              
                                  </a>
                                  </div>  

                                
                                    <div class="card brand">
                                      <div class="card-header">
                                        <h4>Gender Statistic</h4>
                                      </div>
                                    <div class="card-body">
                                      <div id="chart-profile"></div>
                                        <script>
                                          var optionsGenderProfile  = {
                                              series: [<?php echo $male ?>,<?php echo $female ?>],
                                              labels: ['Male', 'Female'],
                                              colors: ['#435ebe','#e970ac'],
                                              chart: {
                                                type: 'donut',
                                                width: '100%',
                                                height:'350px'
                                              },
                                              legend: {
                                                position: 'bottom'
                                              },
                                              plotOptions: {
                                                pie: {
                                                  donut: {
                                                    size: '30%'
                                                  }
                                                }
                                              }
                                            };
                                          var genderchart = new ApexCharts(document.querySelector('#chart-profile'), optionsGenderProfile);
                                            genderchart.render();
                                        </script>
                                      </div>
                                    </div>
                                
                                                
                              </div>          
                        </div>
                  </div>
              </section>
          </div>
      





