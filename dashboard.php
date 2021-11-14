<?php
 


  include('asset/database/MysqliDB.php');

  
    $db = new MysqliDb ('localhost', 'root', '', 'spes_db');
    //$users = $db->get('users');
    
   
    $records = $db->rawQueryOne('SELECT COUNT(id) as total FROM levelsection');
    $teachers = $db->rawQueryOne('SELECT COUNT(teacher_id) as totalteachers FROM teacher');
    $students = $db->rawQueryOne('SELECT COUNT(stud_id) as totalstudents FROM student_tbl WHERE STATUS="enrolled"');
    if($records !=NULL || $teachers !=NULL || $students !=NULL){    
      $_SESSION['records'] = $records['total'];
      $_SESSION['teachers'] = $teachers['totalteachers'];
      $_SESSION['students'] = $students['totalstudents'];
    }

  

?>



 <div class="page-heading">
            <h3>Profile Statistics</h3>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-4 col-md-6">
                                <a href="?page=records&data=student-list">
                                    <div class="card brand">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon purple">
                                                        <lord-icon
                                                        src="https://cdn.lordicon.com//eszyyflr.json"
                                                        trigger="hover"
                                                        colors="primary:#ffffff,secondary:#ffffff"
                                                        style="width:250px;height:250px">
                                                    </lord-icon>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Students</h6>
                                                    <h6 class="font-extrabold mb-0"><?php echo $_SESSION['students']; ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-lg-4 col-md-6">
                                <a href="?page=records&data=teacher-list">
                                    <div class="card brand">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon blue">
                                                        <lord-icon
                                                        src="https://cdn.lordicon.com//bwnhdkha.json"
                                                        trigger="hover"
                                                        colors="primary:#ffffff,secondary:#ffffff"
                                                        style="width:250px;height:250px">
                                                        </lord-icon>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Teachers</h6>
                                                    <h6 class="font-extrabold mb-0"><?php echo $_SESSION['teachers']; ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-lg-4 col-md-6">
                                <a href="?page=records&data=section-list">
                                    <div class="card brand">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon green">
                                                        <lord-icon
                                                        src="https://cdn.lordicon.com//jvucoldz.json"
                                                        trigger="hover"
                                                        colors="primary:#ffffff,secondary:#ffffff"
                                                        style="width:250px;height:250px">
                                                    </lord-icon>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Sections</h6>
                                                    <h6 class="font-extrabold mb-0"><?php echo $_SESSION['records']; ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
<!---------------------------------------------------------- Apex Chart JS ------------------------------------------>
                            <div class="row">
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>Grade Level Statistic</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div id="chart-profile-visit"></div>
                                                </div>
                                            </div>
                                        </div>


                                <div id="carouselExampleFade" class="carousel carousel-dark slide carousel-fade col-md-4" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-bs-interval="5000" >
                                    <div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>Learning Modality Statistic</h4>
                                                    <hr>
                                                </div>
                                                <div class="card-body">
                                                    <div id="chart-visitors-profile"></div>
                                                </div>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>

                                
                                    <div class="carousel-item" data-bs-interval="5000">
                                    <div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>Gender Statistics</h4>                                                 
                                                </div>
                                                <div class="card-body">
                                                    <div id="chart-gender"></div>
                                                </div>                                          
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button style="width:24px; height:24px; margin-top:200px; border-radius: 50%; border: 1px solid #201f1f17" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden"></span>
                                </button>
                                <button style="width:24px; height:24px; margin-top:200px; border-radius: 50%; border: 1px solid #201f1f17" class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden"></span>
                                </button>
                                </div>


                                        
                                        
                            </div>



                            
                            
<!---------------------------------------------------------- /Apex Chart JS/ ------------------------------------------>

                           
                </div>


        <!-------------------------------- Display the Name of user who is currently using the program -->
                <div class="col-12 col-lg-3">
                        <div class="card brand">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="asset/images/faces/1.jpg" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold"><?php echo $_SESSION['name']; ?></h5>
                                        <h6 class="text-muted mb-0">User</h6>
                                    </div>
                                </div>
                            </div>             
                    </div>
<!-------------------------------- /Display the Name of user who is currently using the program/ -->



                <!-- --------------------------Announcements---------------------------------- -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Announcements</h4>
                        </div>
                        <div class="card-content pb-4">
                            <div class="recent-message brand d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                    <img src="asset/images/faces/4.jpg">
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1">Hank Schrader</h5>
                                    <h6 class="text-muted mb-0">@johnducky</h6>
                                </div>
                            </div>
                            <div class="recent-message brand d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                    <img src="asset/images/faces/5.jpg">
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1">Dean Winchester</h5>
                                    <h6 class="text-muted mb-0">@imdean</h6>
                                </div>
                            </div>
                            <div class="recent-message brand d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                    <img src="asset/images/faces/1.jpg">
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1">John Dodol</h5>
                                    <h6 class="text-muted mb-0">@dodoljohn</h6>
                                </div>
                            </div>
                            <div class="recent-message brand d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                    <img src="asset/images/faces/1.jpg">
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1">John Dodol</h5>
                                    <h6 class="text-muted mb-0">@dodoljohn</h6>
                                </div>
                            </div>
                           <!--  <div class="px-4">
                                <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Start
                                    Conversation</button>
                            </div> -->
                        </div>
                    </div>

                     <!-- --------------------------/Announcements/---------------------------------- -->
                </div>
            </section>
        </div>





