<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<?php
if (!isset($_SESSION["role"])){
    header('location: login.php');
    exit();
} 

?>
   
   
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