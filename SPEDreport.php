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
                            <h3>SPECIAL EDUCATION</h3>
                            <p>Students with Special Education Needs</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Transferred Out List</li>
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
                            <table class="text-center table table-bordered table-striped" id="table1" style="width: 100%">   
                                <thead style="background-color: #435ebe; color: white; ">
                                <tr>
                                    <th style="text-align: center;">#</th>                                   
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">LRN</th>
                                    <th style="text-align: center;">Class</th>
                                    <th style="text-align: center;">Disability</th>
                                    <th style="text-align: center;">Description</th>
                                    <th style="text-align: center;">Assistive Technology</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
            
                             
                                $query = "SELECT 
                                    s.id, CONCAT(s.`firstname`, ' ',s.`middlename`, ' ', s.`lastname`) AS `name`, 
                                    s.lrn, CONCAt(g.grade, ' - ',st.`sectionname`) as `class`, s.`specifyneeds`, s.`specifyneeds2`, s.`specifyassistivetech`
                                    FROM student_tbl s
                                    INNER JOIN enrollment_tbl e
                                    ON s.id = e.`student_id`
                                    INNER JOIN gradelevel_tbl g
                                    ON s.gradetoenroll = g.id
                                    INNER JOIN section_tbl st
                                    ON st.`gradelevel_id` = g.`id`
                                    WHERE e.status = 'enrolled'
                                    AND s.`spedneeds` = 'Yes'";
                                $query_run = mysqli_query($connection, $query);
                                $i=1;
                                while($row=$query_run->fetch_assoc()){
                                ?>                    
                                    <tr>
                                        <td style="font-size:13px; font-weight: 600"><?php echo $i?></td>
                                        <td style="font-size:13px; font-weight: 600"><?php echo $row['name'];?></td>
                                        <td style="font-size:13px; font-weight: 600"><?php echo $row['lrn'];?></td>
                                        <td style="font-size:13px; font-weight: 600"><?php echo $row['class'];?></td>                     
                                        <td style="font-size:13px; font-weight: 600"><?php echo $row['specifyneeds'];?></td>
                                        <td style="font-size:13px; font-weight: 600"><?php echo $row['specifyneeds2'];?></td>
                                        <td style="font-size:13px; font-weight: 600"><?php echo $row['specifyassistivetech'];?></td>                     
                                    </tr>
                                    <?php $i++;} ?>                        
                                </tbody>
                            </table>
                            </div>  
                        </div>
                    </div>
                </section>
</div>