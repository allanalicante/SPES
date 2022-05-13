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
                            <h3>List of Dropouts</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dropped Out List</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                
                <section class="section brand">
                    <div class="card">                   
                        <div class="card-header"></div>                                                   
                        <div class="card-body">                      
                        <div class="table-responsive">                                 
                            <table class="table table-bordered table-striped text-center" id="table1" style="width: 100%">  
                                <thead style="background-color: #435ebe; color: white; ">
                                <tr>
                                    <th >#</th>
                                    <th >LRN</th>
                                    <th >Name</th>
                                    <th >Grade</th>
                                    <th >Status</th>
                                    <th >Date Archived</th>
                                    <th >Remarks</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
            
                             
                                $query = "SELECT 
                                s.lrn, CONCAT(s.`firstname`, ' ',s.`middlename`, ' ', s.`lastname`) AS `name`, g.grade ,e.`status`, e.`dateofexit`, s.`Remarks`
                                    FROM student_tbl s
                                    INNER JOIN enrollment_tbl e
                                    ON s.id = e.`student_id`
                                    INNER JOIN gradelevel_tbl g
                                    ON s.gradetoenroll = g.id
                                    WHERE e.status != 'enrolled' AND e.status != 'pending' AND e.status = 'Dropped Out'";
                                $query_run = mysqli_query($connection, $query);
                                $i=1;
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
                                    <?php $i++;} ?>                        
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                </section>
</div>