<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>STUDENT RECORDS</h3>
                            <p class="text-subtitle text-muted">For user to check student list</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section brand">
                    <div class="card">
                        
                        <div class="card-header"></div>                                
                       
                        <div class="card-body">
                           
                            <table class="table table-bordered table-striped" id="table1">   
                                <thead style="background-color: #435ebe; color: white;">
                                    <tr>
                                        <th>Student ID</th>
                                        <th>LRN</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Sex</th>
                                        <th>Birthday</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $connection = mysqli_connect("localhost","root","");
                                $db = mysqli_select_db($connection,'spes_db');

                                $query = "SELECT * FROM `student_tbl` WHERE `status`='enrolled'";
                                $query_run = mysqli_query($connection, $query);
                                while($row=$query_run->fetch_assoc()){
                                ?>                    
                                <tr>
                                        <td><?php echo $row['stud_id'];?></td>
                                        <td><?php echo $row['lrn'];?></td>
                                        <td><?php echo $row['firstname'] ." ".$row['lastname'];?></td>
                                        <td><?php echo $row['age'];?></td>
                                        <td><?php echo $row['sex'];?></td>
                                        <td><?php echo $row['birthday'];?></td>
                                        
                                    </tr>
                                    <?php } ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>