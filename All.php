<script>
     $(document).ready(function () 
          {
            $('#studlist').hide();             
        });

    function display(){    
        var togglethis = document.getElementById("firsttoggle");
        if (togglethis.checked)
        {
            $('#studlist').show();
        }
        else
        {
            $('#studlist').hide();
        }
    }
</script>

<style>
        /* The switch - the box around the slider */
    .switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 24px;
    }

    /* Hide default HTML checkbox */
    .switch input {
    opacity: 0;
    width: 0;
    height: 0;
    }

    /* The slider */
    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

    input:checked + .slider {
    background-color: #2196F3;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    }
</style>
<?php
session_start();
include_once('connect.php');

if (!isset($_SESSION["role"])){
    header('location: login.php');
    exit();
  }
  $userid = $_SESSION['userid'];
  $role = $_SESSION['role'];

  // Query for counting total numbers of pupils / boys / girls per section
  $gradeselection = "";
  $sql1 = "SELECT g.grade AS `Grade`, 
  COUNT(IF(e.status = 'enrolled', e.section_id, NULL)) AS `total`,
  COUNT(IF(ss.sex = 'Male',ss.id, NULL)) AS `boys`, 
  COUNT(IF(ss.sex = 'female',ss.id, NULL)) AS `girls`
  FROM section_tbl s
  INNER JOIN gradelevel_tbl g
  ON g.id = s.gradelevel_id
  INNER JOIN teacher t
  ON t.id = s.teacher_id
  LEFT JOIN enrollment_tbl e
  ON e.section_id = s.id
  LEFT JOIN student_tbl ss
  ON e.student_id = ss.id";
  if ($role == "Admin")
  {
      $sql1 .= "";
  }
  else 
  {
      $sql1 .= " where s.teacher_id = $userid";
  }
  $result1 = mysqli_query($connection, $sql1);
  while ($row = mysqli_fetch_array($result1)) {           
  $male = $row['boys'];
  $female = $row['girls'];
  $total = $row["total"];
  }

  // Query for selecting student group by age     
  $sql2="SELECT s.age, COUNT(s.age) as `student`
  FROM student_tbl s
  INNER JOIN enrollment_tbl e
  ON s.`id`=e.`student_id`
  INNER JOIN section_tbl ss
  ON e.`section_id` = ss.`id`
  where e.`status` = 'enrolled'";
    if ($role == "Admin")
    {
        $sql2 .= " GROUP BY s.age";
    }
    else 
    {
        $sql2 .= " AND ss.teacher_id = $userid GROUP BY s.age";
    }
  $result2 = mysqli_query($connection,$sql2);
  while ($row = mysqli_fetch_array($result2)) {         
  $age[] = $row['age'];
  $students[] = $row['student'];           
  }


  // Query for selecting student group by ethnicity     
  $sql4="SELECT s.`ethnicgroup`, COUNT(s.`ethnicgroup`) AS `totalethnicgroup`
  FROM student_tbl s
  INNER JOIN enrollment_tbl e
  ON s.`id`= e.`student_id`
  INNER JOIN section_tbl ss
  ON e.`section_id` = ss.`id`
  WHERE e.`status` = 'enrolled'";
    if ($role == "Admin")
    {
        $sql4 .= " ";
    }
    else 
    {
        $sql4 .= " AND ss.teacher_id = $userid GROUP BY s.`ethnicgroup` ASC";
    }
  $result4 = mysqli_query($connection,$sql4);
  while ($row = mysqli_fetch_array($result4)) {         
  $eg[] = $row['ethnicgroup'];
  $students2[] = $row['totalethnicgroup'];           
  }

 
  // Query for selecting student group by modality  
  if ($role == "Admin")
  {   
  $sql5="SELECT ( SELECT COUNT(s.modality)
  FROM student_tbl s 
  INNER JOIN enrollment_tbl e 
  ON s.id = e.student_id
  WHERE e.`status` = 'enrolled'
  AND s.modality = 'Modular') AS `Modular`,
( SELECT COUNT(s.modality)
  FROM student_tbl s 
  INNER JOIN enrollment_tbl e 
  ON s.id = e.student_id
  WHERE e.`status` = 'enrolled'
  AND s.modality = 'Online Class') AS `OnlineClass`,
( SELECT COUNT(s.modality)
  FROM student_tbl s 
  INNER JOIN enrollment_tbl e 
  ON s.id = e.student_id
  WHERE e.`status` = 'enrolled'
  AND s.modality = 'Flexible') AS `Flexible`,
( SELECT COUNT(s.modality)
FROM student_tbl s 
INNER JOIN enrollment_tbl e 
ON s.id = e.student_id
WHERE e.`status` = 'enrolled'
AND s.modality = 'f2f') AS `FaceToFace`";
  }
  else 
  {
      $sql5 = "SELECT ( SELECT COUNT(s.modality)
      FROM student_tbl s 
      INNER JOIN enrollment_tbl e 
      ON s.id = e.student_id
      INNER JOIN section_tbl ss
      ON e.section_id = ss.id
      WHERE e.`status` = 'enrolled'
      AND ss.teacher_id = $userid
      AND s.modality = 'Modular') AS `Modular`,
    ( SELECT COUNT(s.modality)
      FROM student_tbl s 
      INNER JOIN enrollment_tbl e 
      ON s.id = e.student_id
      INNER JOIN section_tbl ss
      ON e.section_id = ss.id
      WHERE e.`status` = 'enrolled'
      AND ss.teacher_id = $userid
      AND s.modality = 'Online Class') AS `OnlineClass`,
    ( SELECT COUNT(s.modality)
      FROM student_tbl s 
      INNER JOIN enrollment_tbl e 
      ON s.id = e.student_id
       INNER JOIN section_tbl ss
      ON e.section_id = ss.id
      WHERE e.`status` = 'enrolled'
      AND ss.teacher_id = $userid
      AND s.modality = 'Flexible') AS `Flexible`,
    ( SELECT COUNT(s.modality)
        FROM student_tbl s 
        INNER JOIN enrollment_tbl e 
        ON s.id = e.student_id
         INNER JOIN section_tbl ss
      ON e.section_id = ss.id
      WHERE e.`status` = 'enrolled'
      AND ss.teacher_id = $userid
        AND s.modality = 'f2f') AS `FaceToFace`";
  }

  $result5 = mysqli_query($connection,$sql5);
  while ($row = mysqli_fetch_array($result5)){         
  $modular = $row['Modular'];          
  $onlineclass = $row['OnlineClass'];          
  $flexible = $row['Flexible'];          
  $f2f = $row['FaceToFace'];          
  }
  

  // Query for selecting student group by 4ps membership
  if ($role == "Admin")
  {
  $sql6="SELECT ( SELECT COUNT(s.4Ps)
  FROM student_tbl s 
  INNER JOIN enrollment_tbl e 
  ON s.id = e.student_id
  WHERE e.`status` = 'enrolled'
  AND s.4Ps = 'Yes') AS `Member`,
( SELECT COUNT(s.4Ps)
  FROM student_tbl s 
  INNER JOIN enrollment_tbl e 
  ON s.id = e.student_id
  WHERE e.`status` = 'enrolled'
  AND s.4Ps = 'No') AS `NotMember`";
  }
  else
  {
      $sql6 = "SELECT ( SELECT COUNT(s.4Ps)
      FROM student_tbl s 
      INNER JOIN enrollment_tbl e 
      ON s.id = e.student_id
      INNER JOIN section_tbl ss
      ON e.section_id = ss.id
      WHERE e.`status` = 'enrolled'
      AND ss.teacher_id = $userid
      AND s.4Ps = 'Yes') AS `Member`,
    ( SELECT COUNT(s.4Ps)
      FROM student_tbl s 
      INNER JOIN enrollment_tbl e 
      ON s.id = e.student_id
      INNER JOIN section_tbl ss
      ON e.section_id = ss.id
      WHERE e.`status` = 'enrolled'
      AND ss.teacher_id = $userid
      AND s.4Ps = 'No') AS `NotMember`";
  }
  $result6 = mysqli_query($connection,$sql6);
  while ($row = mysqli_fetch_array($result6)) {         
  $Member = $row['Member'];          
  $NotMember = $row['NotMember'];                 
  }

  // Query for selecting student group by barangay    
  $sql7="SELECT s.`barangay`, COUNT(s.`id`) AS students
  FROM student_tbl s
  INNER JOIN enrollment_tbl e
  ON e.`student_id` = s.`id`
  INNER JOIN section_tbl ss
  ON e.`section_id` = ss.`id`
  WHERE e.`status` = 'enrolled'";
  if ($role == "Admin")
  {
    $sql7  .= " GROUP BY s.`barangay`";
  }
  else
  {
    $sql7 .= " AND ss.teacher_id = $userid GROUP BY s.`barangay`";
  }
  $result7 = mysqli_query($connection,$sql7);
  while ($row = mysqli_fetch_array($result7)) {         
  $barangay[] = $row['barangay'];
  $students3[] = $row['students'];           
  }

    
  // Query for selecting student group by religion    
    $sql8="SELECT s.`religion`, COUNT(s.`id`) AS students
    FROM student_tbl s
    INNER JOIN enrollment_tbl e
    ON e.`student_id` = s.`id`
    INNER JOIN section_tbl ss
    ON e.`section_id` = ss.`id`
    WHERE e.`status` = 'enrolled'";
    if ($role == "Admin")
    {
        $sql8 .= " GROUP BY s.`religion`";
    }
    else
    {
        $sql8 .= " AND ss.teacher_id = $userid GROUP BY s.`religion`"; 
    }
    $result8 = mysqli_query($connection,$sql8);
    while ($row = mysqli_fetch_array($result8)) {         
    $religion[] = $row['religion'];
    $students4[] = $row['students'];          
    }
?>

        <div>                
            <div class="col-12 col-lg-3 col-sm-3">                                                                                                                                              
                <h6 class="text-muted font-semibold">Total Pupils</h6>
                <h2 class="font-extrabold "><?php echo $total?></h2>                                         
            </div>                      
        </div>
                             
        <div class="row"> <!-- 1 row -->
            <div class="col-12 col-lg-7 col-md-12" >
                <div class="card" style="height:350px; weight: 100%">
                            <div class="card-header">
                                <h6>Enrollment by Age Group</h6>
                            </div>
                            <div class="card-body" style="margin-right:2px; padding-left:2px">
                                <div id="chart-grade">
                                    <script>
                                            var optionGrade = {
                                                series: [{
                                                name: 'Total Students',
                                                data: <?php echo json_encode($students); ?>,
                                                }],
                                                chart: {
                                                type: 'bar',
                                                height: 290
                                                },
                                                plotOptions: {
                                                bar: {
                                                    horizontal: true,
                                                    dataLabels: {
                                                    position: 'top',
                                                    },
                                                }
                                                },
                                                yaxis: {
                                                    title: {
                                                    text: "Age",
                                                    },
                                                },
                                        
                                                dataLabels: {
                                                enabled: true,
                                                offsetX: -6,
                                                style: {
                                                    fontSize: '12px',
                                                    colors: ['#fff'],                                                           
                                                }
                                                },
                                                stroke: {
                                                show: true,
                                                width: 1,
                                                colors: ['#fff']
                                                },
                                                tooltip: {
                                                shared: true,
                                                intersect: false
                                                },
                                                xaxis: {
                                                categories: <?php echo json_encode($age); ?>,
                                                title: {
                                                    text: "Students",
                                                    },
                                                },
                                                fill: {
                                                    colors: ['#2dbaac'],
                                                }
                                                
                                                };
                                                var chartGrade = new ApexCharts(document.querySelector("#chart-grade"), optionGrade);
                                                chartGrade.render();
                                    </script>
                                </div>
                            </div>
                </div>                   
            </div>
                            
            <div class="col-12 col-lg-5 col-md-12" >
                <div class="card" style="height:350px; weight: 100%">
                            <div class="card-header">
                                <h6>Student per Ethnicity</h6>
                            </div>
                            <div class="card-body" style="padding:8px; margin: 3px">
                                <div id="chart-ethnicity">
                                </div>
                                    <script>
                                        var optionChartEthnicity = {
                                            annotations: {
                                                position: 'back'
                                            },
                                            dataLabels: {
                                                enabled:true
                                            },
                                            chart: {
                                                type: 'bar',
                                                height: 275
                                            },
                                            fill: {
                                                opacity:1
                                            },
                                            plotOptions: {
                                                bar: {
                                                horizontal: false,
                                                columnWidth: "20%",
                                                endingShape: "rounded",
                                                dataLabels: {
                                                position: 'top',
                                                },
                                            },
                                            },
                                            series: [{
                                                name: 'students',
                                                data: <?php echo json_encode($students2); ?>,
                                            }],
                                            yaxis: {
                                                    title: {
                                                    text: "No. of Student",
                                                    },
                                            },
                                            colors: ['#435ebe'],
                                            xaxis: {
                                                categories: <?php echo json_encode($eg); ?>,
                                                title: {
                                                text: "Ethnicity",
                                                },
                                            },
                                        };
                                        var chartEthnicity = new ApexCharts(document.querySelector("#chart-ethnicity"), optionChartEthnicity);
                                        chartEthnicity.render();
                                    </script>                                                                                           
                            </div>
                </div>                   
            </div>
        </div>

        <div class="row"> <!-- 2 row -->         
            <div class="col-12 col-lg-4 col-md-12">
                    <div class="card" style="height:350px; weight: 100%">
                        <div class="card-header">
                            <h6>Gender Statistic<span style="float:right">Total: <?php echo $total ?></span></h6>
                        </div>
                        <div class="card-body" style="padding:0">
                            <div id="chart-profile">                  
                            </div>
                                <script>
                                    var optionsGenderProfile  = {
                                        series: [<?php echo $male ?>,<?php echo $female ?>],
                                        labels: ['Male', 'Female'],
                                        colors: ['#435ebe','#e970ac'],
                                        chart: {
                                        type: 'donut',
                                        width: '100%',
                                        height:'300px'
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
            <div class="col-12 col-lg-4 col-md-12">
                    <div class="card" style="height:350px; weight: 100%">
                        <div class="card-header">
                            <h6>Modality Statistic<span style="float:right">Total: <?php echo $total ?></span></h6>
                        </div>
                        <div class="card-body" style="padding:0">
                            <div id="chart-section">                  
                            </div>
                            <script>
                                    var optionsSectionProfile = {
                                        series: [<?php echo $modular ?>,<?php echo $onlineclass ?>,<?php echo $flexible ?>,<?php echo $f2f ?>],
                                        labels: ['Modular', 'Online Class', 'Flexible','Face To Face'],
                                        colors: ['#435ebe','#2dbaac','#fd7e14','#e970ac'],
                                        chart: {
                                        type: 'pie',
                                        width: '100%',
                                        height:'300px'
                                        },
                                        legend: {
                                        position: 'bottom'
                                        },
                                        plotOptions: {
                                        pie: {
                                            pie: {
                                            size: '30%'
                                            }
                                        }
                                        }
                                    };
                                    var sectionchart = new ApexCharts(document.querySelector('#chart-section'), optionsSectionProfile);
                                    sectionchart.render();
                                </script>
                        </div>
                    </div>
            </div>
            <div class="col-12 col-lg-4 col-md-12">
                    <div class="card" style="height:350px; weight: 100%">
                                <div class="card-header">
                                    <h6>4Ps Member<span style="float:right">Total: <?php echo $total ?></span></h6>
                                </div>
                                <div class="card-body" style="padding:0">
                                    <div id="ps-member">                  
                                    </div>
                                    <script>
                                        var FourPsMemberProfile = {
                                            series: [<?php echo $Member ?>,<?php echo $NotMember?>],
                                            labels: ['4Ps Member', 'Non-Member'],
                                            colors: ['#ff8080','#6f42c1'],
                                            chart: {
                                            type: 'donut',
                                            width: '100%',
                                            height:'300px'
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
                                        var memberChart = new ApexCharts(document.querySelector('#ps-member'), FourPsMemberProfile);
                                        memberChart.render();
                                    </script>
                                </div>
                    </div>
            </div>
        </div>

        <div class="row"> <!-- 3 row -->
            <div class="col-12 col-lg-12 col-md-12">
                <div class="card" style="height:400px; weight: 100%">
                                <div class="card-header">
                                    <h6>Enrollment per Barangay</h6>
                                </div>
                                <div class="card-body" style="padding:10px">
                                    <div id="line2">                  
                                    </div>
                                        <script>
                                           var barangayOption = {
                                            annotations: {
                                                position: 'back'
                                            },
                                            dataLabels: {
                                                enabled:true,
                                            },
                                            chart: {
                                                type: 'bar',
                                                height: 320
                                            },
                                            fill: {
                                                opacity:1
                                            },
                                            plotOptions: {
                                                bar: {
                                                horizontal: false,
                                                columnWidth: "20%",
                                                endingShape: "rounded",
                                                dataLabels: {
                                                position: 'top',
                                                },
                                            },
                                            },
                                            series: [{
                                                name: 'students',
                                                data: <?php echo json_encode($students3); ?>,
                                            }],
                                            yaxis: {
                                                    title: {
                                                    text: "No. of Student",
                                                    },
                                            },
                                            colors: ['#00e396'],
                                            xaxis: {
                                                categories: <?php echo json_encode($barangay); ?>,
                                                title: {
                                                text: "Barangay",
                                                },
                                            },
                                        };
                                            var line2 = new ApexCharts(document.querySelector("#line2"), barangayOption);
                                            line2.render();
                                        </script>
                                </div>
                </div>
            </div>
        </div>

        <div class="row"> <!-- 4 row -->
            <div class="col-12 col-lg-12 col-md-12">
                <div class="card" style="height:400px; weight: 100%">
                                <div class="card-header">
                                    <h6>Student Population per Religion</h6>
                                </div>
                                <div class="card-body" style="padding:10px">
                                    <div id="barReligion">                  
                                    </div>
                                    <script>
                                        var religionOption = {
                                            annotations: {
                                                position: 'back'
                                            },
                                            dataLabels: {
                                                enabled:true,
                                            },
                                            chart: {
                                                type: 'bar',
                                                height: 320
                                            },
                                            fill: {
                                                opacity:1
                                            },
                                            plotOptions: {
                                                bar: {
                                                distributed: false,
                                                horizontal: false,
                                                columnWidth: "20%",
                                                endingShape: "rounded",
                                                dataLabels: {
                                                position: 'top',
                                                },
                                            },
                                            },
                                            series: [{
                                                name: 'students',
                                                data: <?php echo json_encode($students4); ?>,
                                            }],
                                            yaxis: {
                                                    title: {
                                                    text: "No. of Student",
                                                    },
                                            },
                                            xaxis: {
                                                categories: <?php echo json_encode($religion); ?>,
                                                title: {
                                                text: "Religion",
                                                },
                                            },
                                        };
                                        var chartReligion = new ApexCharts(document.querySelector("#barReligion"), religionOption);
                                        chartReligion.render();
                                    </script>  
                                </div>
                </div>
            </div>
        </div> 
        
        <hr class="mt-0">

        <!-- Default switch -->
        <div class="form-group">
            <label class="switch">
                <input type="checkbox" id="firsttoggle" onclick="display()">
                <span class="slider round"></span>
            </label>
            <p>Display Student List</p>
        </div>


        <div class="row" id="studlist"> <!-- 5 row -->
            <div class="col-12 col-lg-12 col-md-12">
                <div class="card">                   
                    <div class="card-header"></div>                                                   
                        <div class="card-body">    
                            <div class="table-responsive">                
                            <table class="text-center table table-bordered table-striped" id="table1" style="width: 100%">   
                                <thead style="background-color: #435ebe; color: white; ">
                                    <tr>
                                        <th style="">#</th>                                    
                                        <th style="text-align: center;">LRN</th>
                                        <th style="text-align: center;">Name</th>
                                        <th style="text-align:center;">Age</th>
                                        <th style="text-align: center;">Grade</th>
                                        <th style="text-align: center;">Barangay</th>
                                        <th style="text-align: center;">4Ps</th>
                                        <th style="text-align: center;">Modality</th>
                                        <th style="text-align: center;">Action</th>                                  
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php                              
                                        
                                        $query = "SELECT DISTINCT (s.id) AS `studentID`, s.lrn, s.age, s.photo, concat(s.firstname,' ',s.middlename,' ',s.lastname,' ',s.extension) as 'Name', 
                                        g.grade, s.barangay, ss.sectionname, s.4Ps, s.modality   
                                        FROM student_tbl s
                                        INNER JOIN enrollment_tbl e
                                        ON e.student_id = s.id
                                        INNER JOIN section_tbl ss
                                        ON ss.id = e.section_id
                                        INNER JOIN gradelevel_tbl g
                                        ON g.id = ss.gradelevel_id
                                        INNER JOIN teacher t
                                        ON t.id = ss.teacher_id
                                        WHERE e.status = 'enrolled'";
                                        if ($role == "Admin")
                                        {
                                            $query .= " GROUP BY studentID
                                            ORDER BY s.lastname ASC";
                                        }
                                        else
                                        {
                                            $query .= "  AND ss.`teacher_id` = $userid GROUP BY studentID
                                            ORDER BY s.lastname ASC";
                                        }
                                        
                                        $query_run = mysqli_query($connection, $query);
                                        $i=1;
                                        while($row=$query_run->fetch_assoc()){
                                    ?>                    
                                    <tr>
                                            <td style="font-size:13px; font-weight: 600"><?php echo $i?></td>
                                            <td style="font-size:13px; font-weight: 600"><?php echo $row['lrn'];?></td>
                                            <td style="font-size:13px; font-weight: 600"><?php echo $row['Name'];?></td>
                                            <td style="font-size:13px; font-weight: 600"><?php echo $row['age'];?></td>
                                            <td style="font-size:13px; font-weight: 600"><?php echo $row['grade'];?></td>
                                            <td style="font-size:13px; font-weight: 600"><?php echo $row['barangay'];?></td>
                                            <td style="font-size:13px; font-weight: 600"><?php echo $row['4Ps'];?></td>
                                            <td style="font-size:13px; font-weight: 600"><?php echo $row['modality'];?></td>    
                                            <td style="">                                 
                                            <button type="button" name="viewstudent" id="<?php echo $row['studentID'];?>" data-bs-target="#viewStudentProfile" 
                                            data-bs-toggle="modal"  class="badge btn btn-sm btn-primary viewStudentProfile" title="View Profile"><i class="bi bi-eye"></i></button>                                                              
                                            </td>                                         
                                    </tr>
                                    <?php 
                                    $i++;} ?>                        
                                </tbody>
                            </table>
                            </div>  
                        </div>
                </div>
            </div>
        </div>
      
        <script src="asset/js/pdfexport/jquery-3.5.1.js"></script>
        <script src="asset/js/pdfexport/jquery.dataTables.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.buttons.min.js"></script>
        <script src="asset/js/pdfexport/buttons.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/jszip.min.js"></script>
        <script src="asset/js/pdfexport/pdfmake.min.js"></script>
        <script src="asset/js/pdfexport/vfs_fonts.js"></script>
        <script src="asset/js/pdfexport/buttons.html5.min.js"></script>
        <script src="asset/js/pdfexport/buttons.print.min.js"></script>
        <script src="asset/js/pdfexport/buttons.colVis.min.js"></script>
        <script src="asset/js/extensions/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#table1').DataTable( {
                    lengthChange: false,
                    buttons: [
                            {
                                extend: 'copy',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'excel',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'pdf',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            'colvis'
                        ],
                } );          
                table.buttons().container()
                    .appendTo( '#table1_wrapper .col-md-6:eq(0)' );
            } );

    
          //Script for displaying student information
          $(document).ready(function(){
            $(document).on('click','.viewStudentProfile',function(){
                var studentDetails = $(this).attr("id");
                $.ajax({
                url:"getlevel.php",
                method:"post",
                data: {studentDetails:studentDetails},
                success:function(data){
                    $('#studentDetails').html(data);
                    $('#printId').val(studentDetails);
                    $('#viewStudentProfile').modal('show');
                      }
                    });         
                });
             });  
    </script>