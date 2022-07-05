<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<?php
if (!isset($_SESSION["role"])){
    header('location: login.php');
    exit();
}

 
          /* counting total student */
         $sql="SELECT g.grade, COUNT(s.id) AS `enrolles`
         FROM gradelevel_tbl g
         LEFT JOIN section_tbl ss
         ON g.id = ss.gradelevel_id
         LEFT JOIN enrollment_tbl e
         ON ss.id = e.section_id
         LEFT JOIN student_tbl s
         ON e.id = s.id
         GROUP BY g.id";
         $result = mysqli_query($connection,$sql);
         while ($row = mysqli_fetch_array($result)) {         
            $Grade[] = $row['grade'];
            $enrolles[] = $row['enrolles'];     
         }
         /* counting student per religion types */
         $sql2="SELECT s.religion, COUNT(s.religion) AS `Total`
         FROM student_tbl s
         INNER JOIN enrollment_tbl e
         ON s.id = e.student_id
         WHERE e.status = 'enrolled'
         GROUP BY s.religion";
         $result = mysqli_query($connection,$sql2);

         while ($row = mysqli_fetch_array($result)) { 
            
            $Religion[] = $row['religion'];
            $Total[] = $row['Total'];     
         }
         /* counting registered teachers */
         $sql3="SELECT g.grade, COUNT(t.id) AS `teachers`
         FROM gradelevel_tbl g
         LEFT JOIN teacher t
         ON g.grade = t.`gradetohandle`
         GROUP BY g.id";
         $result = mysqli_query($connection,$sql3);

         while ($row = mysqli_fetch_array($result)) { 
            
            $grade[] = $row['grade'];
            $teacher[] = $row['teachers'];     
         }
         /* counting pending students */
         $sql4="SELECT g.grade, COUNT(e.`id`) AS `pending`
         FROM gradelevel_tbl g	
         LEFT JOIN student_tbl s
         ON s.gradetoenroll = g.id
         LEFT JOIN enrollment_tbl e
         ON s.id = e.`student_id`
         AND e.status = 'pending'
         GROUP BY g.id";
         $result = mysqli_query($connection,$sql4);

         while ($row = mysqli_fetch_array($result)) { 
            
            $grades[] = $row['grade'];
            $pending[] = $row['pending'];     
         }
         /* counting section for grade level */
         $sql5="SELECT g.grade, COUNT(ss.id) AS `section`
         FROM gradelevel_tbl g
         INNER JOIN section_tbl ss
         ON g.`id` = ss.`gradelevel_id`
         GROUP BY g.id";
         $result = mysqli_query($connection,$sql5);

         while ($row = mysqli_fetch_array($result)) { 
            
            $gradess[] = $row['grade'];
            $section[] = $row['section'];     
         }
        
         /* ------------------------------------------------- */
?>
        <div class="page-heading"> <!--------------------------------- Profile Statistic Heading -------------------------->
            <h3>STATISTICAL DATA</h3> 
            <p class="text-subtitle text-muted">For user to view visual reports</p>  
            <hr>
        </div>
       
        <section class="row">   <!--------------------- 1st row ----------------------->                      
                <div class="col-12 col-lg-12"> <!-------------------- Advanced Statistic Using Apex Chart JS Row 2 -------------------------------->
                        <div class="row">
                            <div class="col-lg-5 col-md-12">
                                <div class="card logbrand">
                                        <div class="card-header">
                                            <h4>Total student per grade level via Table</h4>
                                        </div>
                                        <div class="card-body">
                                        <table class="table table-bordered table-striped text-center" id="table1">
                                                <thead  style="background-color: #435ebe; color: white;">
                                                    <tr>
                                                        <th style="text-align: center;">Grade</th>
                                                        <th style="text-align: center;">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php


                                        $query = "SELECT g.grade, COUNT(s.id) AS `enrolles`
                                        FROM gradelevel_tbl g
                                        LEFT JOIN section_tbl ss
                                        ON g.id = ss.gradelevel_id
                                        LEFT JOIN enrollment_tbl e
                                        ON ss.id = e.section_id
                                        LEFT JOIN student_tbl s
                                        ON e.id = s.id
                                        GROUP BY g.id";
                                        $query_run = mysqli_query($connection, $query);
                                        while($row=$query_run->fetch_assoc()){
                                        ?>
                                                <tr>
                                                    <td style="font-size:13px; font-weight: 600"><?php echo $row['grade'];?></td>
                                                    <td style="font-size:13px; font-weight: 600"><?php echo $row['enrolles'];?></td>                     
                                                </tr>
                                                <?php } ?>
                                                </tbody>
                                    </table>                                                                                                      
                                      </div>
                                </div>                      
                            </div>      
   
                           <div class="col-lg-7 col-md-12">
                               <div class="card logbrand">
                                   <div class="card-header">
                                       <h4>Total student per grade level via graph</h4>
                                   </div>
                                   <div class="card-body">
                                       <div id="chart-grade">
                                       <script>
                                                  var optionGrade = {
                                                    series: [{
                                                    name: 'Total',
                                                    data: <?php echo json_encode($enrolles); ?>,
                                                    }],
                                                    chart: {
                                                    type: 'bar',
                                                    height:300
                                                    },
                                                    plotOptions: {
                                                    bar: {
                                                        borderRadius: 10,
                                                        horizontal: true,
                                                        dataLabels: {
                                                        position: 'top',
                                                        },
                                                    }
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
                                                    categories: <?php echo json_encode($Grade); ?>,
                                                    },
                                                    fill: {
                                                        colors: ['#435ebe'],
                                                    }
                                                    };
                                                    var chartGrade = new ApexCharts(document.querySelector("#chart-grade"), optionGrade);
                                                    chartGrade.render();
                                            </script>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                </div>
                <!--------------------- 2nd row ----------------------->
                <div class="col-12 col-lg-12"> <!-------------------- Advanced Statistic Using Apex Chart JS Row 2 -------------------------------->
                        <div class="row">
                            <div class="col-lg-5 col-md-12">
                                <div class="card logbrand">
                                        <div class="card-header">
                                            <h4>Total pending per grade level via Table</h4>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped text-center" id="table1">
                                                            <thead  style="background-color: #435ebe; color: white;">
                                                                <tr>
                                                                    <th style="text-align: center;">Grade</th>
                                                                    <th style="text-align: center;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php                             
                                                    $query = "SELECT g.grade, COUNT(e.`id`) AS `pending`
                                                    FROM gradelevel_tbl g	
                                                    LEFT JOIN student_tbl s
                                                    ON s.gradetoenroll = g.id
                                                    LEFT JOIN enrollment_tbl e
                                                    ON s.id = e.`student_id`
                                                    AND e.status = 'pending'
                                                    GROUP BY g.id";
                                                    $query_run = mysqli_query($connection, $query);
                                                    while($row=$query_run->fetch_assoc()){
                                                    ?>
                                                            <tr>
                                                                <td style="font-size:13px; font-weight: 600"><?php echo $row['grade'];?></td>
                                                                <td style="font-size:13px; font-weight: 600"><?php echo $row['pending'];?></td>                     
                                                            </tr>
                                                            <?php } ?>
                                                            </tbody>
                                            </table>                                                                                                      
                                      </div>
                                </div>                      
                            </div>      
   
                            <div class="col-lg-7 col-md-12">
                               <div class="card logbrand">
                                   <div class="card-header">
                                       <h4>Total pending per grade level via graph</h4>
                                   </div>
                                   <div class="card-body">
                                       <div id="chart-pending">
                                            <script>
                                                  var optionpending = {
                                                    series: [{
                                                    name: 'Total',
                                                    data: <?php echo json_encode($pending); ?>,
                                                    }],
                                                    chart: {
                                                    type: 'bar',
                                                    height:300
                                                    },
                                                    plotOptions: {
                                                    bar: {
                                                        borderRadius: 10,
                                                        horizontal: true,
                                                        dataLabels: {
                                                        position: 'top',
                                                        },
                                                    }
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
                                                    categories: <?php echo json_encode($Grade); ?>,
                                                    },
                                                    fill: {
                                                        colors: ['#435ebe'],
                                                    }
                                                    };
                                                    var chartPending = new ApexCharts(document.querySelector("#chart-pending"), optionpending);
                                                    chartPending.render();
                                            </script>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                </div>
                <!--------------------- 3rd row ----------------------->
                <div class="col-12 col-lg-12"> <!-------------------- Advanced Statistic Using Apex Chart JS Row 2 -------------------------------->
                        <div class="row">
                            <div class="col-lg-5 col-md-12">
                                <div class="card logbrand">
                                        <div class="card-header">
                                            <h4>Total teacher per grade level via Table</h4>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped text-center" id="table4">
                                                        <thead  style="background-color: #435ebe; color: white;">
                                                            <tr>
                                                                <th style="text-align: center;">Grade</th>
                                                                <th style="text-align: center;">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                

                                                $query = "SELECT g.grade, COUNT(t.id) AS `teachers`
                                                FROM gradelevel_tbl g
                                                LEFT JOIN teacher t
                                                ON g.grade = t.`gradetohandle`
                                                GROUP BY g.id";
                                                $query_run = mysqli_query($connection, $query);
                                                while($row=$query_run->fetch_assoc()){
                                                ?>
                                                        <tr>
                                                            <td style="font-size:13px; font-weight: 600"><?php echo $row['grade'];?></td>
                                                            <td style="font-size:13px; font-weight: 600"><?php echo $row['teachers'];?></td>                     
                                                        </tr>
                                                        <?php } ?>
                                                        </tbody>
                                            </table>                                                                                                      
                                      </div>
                                </div>                      
                            </div>      
   
                            <div class="col-lg-7 col-md-12">
                               <div class="card logbrand">
                                   <div class="card-header">
                                       <h4>Total teacher per grade level via graph</h4>
                                   </div>
                                   <div class="card-body">
                                       <div id="chart-teacher">
                                            <script>
                                                  var optionTeacher = {
                                                    series: [{
                                                    name: 'Total',
                                                    data: <?php echo json_encode($teacher); ?>,
                                                    }],
                                                    chart: {
                                                    type: 'bar',
                                                    height:300
                                                    },
                                                    plotOptions: {
                                                    bar: {
                                                        borderRadius: 10,
                                                        horizontal: true,
                                                        dataLabels: {
                                                        position: 'top',
                                                        },
                                                    }
                                                    },
                                                    dataLabels: {
                                                    enabled: true,
                                                    offsetX: -6,
                                                    style: {
                                                        fontSize: '12px',
                                                        colors: ['#fff']
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
                                                    categories: <?php echo json_encode($grades); ?>,
                                                    },
                                                    fill: {
                                                        colors: ['#435ebe'],
                                                    }
                                                    };
                                                    var chartTeacher = new ApexCharts(document.querySelector("#chart-teacher"), optionTeacher);
                                                    chartTeacher.render();
                                            </script>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                </div>
                <!--------------------- 4th row ----------------------->
                <div class="col-12 col-lg-12"> <!-------------------- Advanced Statistic Using Apex Chart JS Row 2 -------------------------------->
                        <div class="row">
                            <div class="col-lg-5 col-md-12">
                                <div class="card logbrand">
                                        <div class="card-header">
                                            <h4>Total section per grade level via Table</h4>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped text-center" id="table4">
                                                            <thead  style="background-color: #435ebe; color: white;">
                                                                <tr>
                                                                    <th style="text-align: center;">Grade</th>
                                                                    <th style="text-align: center;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                        

                                                    $query = "SELECT g.grade, COUNT(ss.id) AS `section`
                                                    FROM gradelevel_tbl g
                                                    INNER JOIN section_tbl ss
                                                    ON g.`id` = ss.`gradelevel_id`
                                                    GROUP BY g.id";
                                                    $query_run = mysqli_query($connection, $query);
                                                    while($row=$query_run->fetch_assoc()){
                                                    ?>
                                                            <tr>
                                                                <td style="font-size:13px; font-weight: 600"><?php echo $row['grade'];?></td>
                                                                <td style="font-size:13px; font-weight: 600"><?php echo $row['section'];?></td>                     
                                                            </tr>
                                                            <?php } ?>
                                                            </tbody>
                                            </table>                                                                                                      
                                      </div>
                                </div>                      
                            </div>      
   
                            <div class="col-lg-7 col-md-12">
                               <div class="card logbrand">
                                   <div class="card-header">
                                       <h4>Total section per grade level via graph</h4>
                                   </div>
                                   <div class="card-body">
                                       <div id="chart-section">
                                            <script>
                                                  var optionSection = {
                                                    series: [{
                                                    name: 'Total',
                                                    data: <?php echo json_encode($section); ?>,
                                                    }],
                                                    chart: {
                                                    type: 'bar',
                                                    height:300
                                                    },
                                                    plotOptions: {
                                                    bar: {
                                                        borderRadius: 10,
                                                        horizontal: true,
                                                        dataLabels: {
                                                        position: 'top',
                                                        },
                                                    }
                                                    },
                                                    dataLabels: {
                                                    enabled: true,
                                                    offsetX: -6,
                                                    style: {
                                                        fontSize: '12px',
                                                        colors: ['#fff']
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
                                                    categories: <?php echo json_encode($gradess); ?>,
                                                    },
                                                    fill: {
                                                        colors: ['#435ebe'],
                                                    }
                                                    };
                                                    var chartSection = new ApexCharts(document.querySelector("#chart-section"), optionSection);
                                                    chartSection.render();
                                            </script>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                </div>
                <!--------------------- 5th row ------------------------------------>
                <div class="col-lg-12 col-md-12">
                        <div class="card logbrand">
                            <div class="card-header">
                                <h4>Student Archives</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped text-center" id="table3">
                                                <thead  style="background-color: #435ebe; color: white;">
                                                    <tr>
                                                        <th style="text-align: center;">#</th>
                                                        <th style="text-align: center;">LRN</th>
                                                        <th style="text-align: center;">Name</th>
                                                        <th style="text-align: center;">Grade</th>
                                                        <th style="text-align: center;">Status</th>
                                                        <th style="text-align: center;">Date Archived</th>
                                                        <th style="text-align: center;">Remarks</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php
            

                                        $query = "SELECT s.lrn, CONCAT(s.`firstname`, ' ',s.`middlename`, ' ', s.`lastname`) AS `name`, g.grade ,e.`status`, e.`dateofexit`, s.`Remarks`
                                        FROM student_tbl s
                                        INNER JOIN enrollment_tbl e
                                        ON s.id = e.`student_id`
                                        INNER JOIN gradelevel_tbl g
                                        ON s.gradetoenroll = g.id
                                        WHERE e.status != 'enrolled' AND e.status != 'pending'";
                                        $query_run = mysqli_query($connection, $query);
                                        $i = 1;
                                        while($row=$query_run->fetch_assoc()){
                                        ?>
                                                <tr>
                                                    <td style="font-size:13px; font-weight: 600"><?php echo $i?></td>
                                                    <td style="font-size:13px; font-weight: 600"><?php echo $row['lrn'];?></td>
                                                    <td style="font-size:13px; font-weight: 600"><?php echo $row['name'];?></td>
                                                    <td style="font-size:13px; font-weight: 600"><?php echo $row['grade'];?></td>                     
                                                    <td style="font-size:13px; font-weight: 600"><?php echo $row['status'];?></td>
                                                    <td style="font-size:13px; font-weight: 600"><?php echo $row['dateofexit'];?></td>
                                                    <td style="font-size:13px; font-weight: 600"><?php echo $row['Remarks'];?></td>                     
                                                </tr>
                                                <?php 
                                            $i++; }
                                            
                                                ?>
                                                </tbody>
                                </table>   
                            </div>
                        </div>                      
                </div>
        </section>
     





