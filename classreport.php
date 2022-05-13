<?php
    if (!isset($_SESSION["role"])){
        header('location: login.php');
        exit();
    }
?>
<!-- Style for toggle switch -->
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
    $userid = $_SESSION['userid'];
    if($_SESSION['role']=='Teacher')
    {
        // Query for selecting section group by grade level   
        $sql="SELECT g.`grade`, st.`sectionname`, COUNT(e.`student_id`) as `students`
        FROM section_tbl st
        LEFT JOIN gradelevel_tbl g ON g.`id`= st.`gradelevel_id`
        LEFT JOIN enrollment_tbl e ON st.`id` = e.`section_id`
        WHERE st.`teacher_id` = ".$userid."
        GROUP BY g.`id` ASC, st.`sectionname`";
        $result = mysqli_query($connection,$sql);
        while ($row = mysqli_fetch_array($result)) {         
        $class[] = $row['sectionname'];
        $students[] = $row['students'];          
        }
    }
    else
    {
        // Query for selecting section group by grade level   
        $sql="SELECT g.`grade`, st.`sectionname`, COUNT(e.`student_id`) as `students`
        FROM section_tbl st
        LEFT JOIN gradelevel_tbl g ON g.`id`= st.`gradelevel_id`
        LEFT JOIN enrollment_tbl e ON st.`id` = e.`section_id`
        GROUP BY g.`id` ASC, st.`sectionname`";
        $result = mysqli_query($connection,$sql);
        while ($row = mysqli_fetch_array($result)) {         
        $class[] = $row['sectionname'];
        $students[] = $row['students'];          
        }
    }
?>

<div class="page-heading" id="mainbody">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>CLASS REPORTS<!-- <a href="#">
                            <i style="vertical-align:middle;" class="bi bi-info-circle"></i></a> --></h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Class Report</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-12">  <!-------------------- Row 1 -------------------------->
                    <div class="row" <?php echo($_SESSION['role']=='Admin')?'': 'hidden'?>>                    
                        <div class="col-12 col-lg-2 col-sm-3">                                                                     
                                <h6 class="text-muted font-semibold">Select Grade</h6>                                                                     
                                    <div class="form-group">
                                            <select class="form-select" aria-label=".form-select-lg example" style="background-image: none;" name="A4" id="A4" value="<?php echo isset($_POST['A4']) ? $_POST['A4'] : ""?>"  required>
                                            <option value="ALL">All</option>
                                            <option value="KINDER">Kinder</option>
                                            <option value="GRADE 1">Grade 1</option>
                                            <option value="GRADE 2">Grade 2</option>
                                            <option value="GRADE 3">Grade 3</option>
                                            <option value="GRADE 4">Grade 4</option>
                                            <option value="GRADE 5">Grade 5</option>
                                            <option value="GRADE 6">Grade 6</option>
                                            </select>                                           
                                    </div>             
                        </div>                                        
                    </div>
                    <hr class="mt-0">

                    

                
 
                <section class="section" id="sectionlist"> <!-------------------------- 2nd row ----------------------------->
                    <div class="card">
                        <div class="card-body">                                        
                           <div class="table-responsive container">                                 
                            <table class="table table-bordered table-striped text-center" id="table1" style="width: 100%">
                                <thead style="background-color: #435ebe; color: white;">
                                    <tr>
                                        <th style="Display:none">ID</th>
                                        <th style="">#</th>
                                        <th style="text-align: center;">Level</th>
                                        <th style="text-align: center;">Section</th>
                                        <th style="text-align: center;">Advisor</th>
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
                                                <td>                                                                                                                                                                                                                                                                                
                                                    <a href="/spes/index.php?page=section&classid=<?php echo $row['ClassID'];?>">
                                                    <button type="button"  id="<?php echo $row['ClassID'];?>" class="badge btn btn-info seeClass">View Class</button></a>                                                                                                                                                                                                                                              
                                                </td>                        
                                                </tr>
                                                <?php 
                                            $i++;}
                                ?>      
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                </section>       
</div>






