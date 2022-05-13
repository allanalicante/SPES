    <div id="sidebar" class="active">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">

            <!-- For Sidebar image -->
                <div class="sidebar-header">
                    <div class="d-flex justify-content-center">
                        <div class="logo">
                            <a href="index.php"><img src="asset/images/speslogo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
            <!-- For Sidebar menu -->
                
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        

                        <li class="sidebar-item <?php echo (isset($page) && $page=='dashboard')?'active':'' ?>">
                            <a href="index.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                                  
                        <li class="sidebar-item <?php echo (isset($page) && $page=='records' && isset($data) && $data !='')?'active':'' ?> has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-archive-fill"></i>
                                <span>Records</span>
                            </a>
                            <ul class="submenu <?php echo (isset($page) && $page=='records')?'active':'' ?>">
                                <li class="submenu-item <?php echo (isset($data) && ($data=='admission-new' || $data=='pending-student'))?'active':'' ?>">
                                    <a href="?page=records&data=pending-student">Admission</a>
                                </li>
                                <li class="submenu-item <?php echo (isset($data) && $data=='student-list')?'active':'' ?>">
                                    <a href="?page=records&data=student-list">Students</a>
                                </li>
                                <li class="submenu-item <?php echo (isset($data) && $data=='teacher-list')?'active':'' ?>"<?php echo($_SESSION['role']=='Admin')?'': 'hidden'?>>
                                    <a href="?page=records&data=teacher-list">Teachers</a>
                                </li>
                                <li class="submenu-item <?php echo (isset($data) && $data=='section-list')?'active':'' ?>">
                                    <a href="?page=records&data=section-list">Classes</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item <?php echo (isset($page) && $page=='reports' && isset($data) && $data !='')?'active':'' ?> has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-folder-fill"></i>
                                <span>Reports</span>
                            </a>
                            <ul class="submenu <?php echo (isset($page) && $page=='reports')?'active':'' ?>">
                                <li class="submenu-item <?php echo (isset($data) && $data=='student-report-list')?'active':'' ?>">
                                    <a href="?page=reports&data=student-report-list">Records Analysis</a>
                                </li>
                                <li class="submenu-item <?php echo (isset($data) && $data=='class-report-list')?'active':'' ?>">
                                    <a href="?page=reports&data=class-report-list">Class Reports</a>
                                </li>
                                <li class="submenu-item <?php echo (isset($data) && $data=='SPED-report-list')?'active':'' ?>">
                                    <a href="?page=reports&data=SPED-report-list">Special Education</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item <?php echo (isset($page) && $page=='archives' && isset($data) && $data !='')?'active':'' ?> has-sub" <?php echo($_SESSION['role']=='Admin')?'': 'hidden'?>>
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-file-earmark-zip-fill"></i>
                                <span>Archives</span>
                            </a>
                            <ul class="submenu <?php echo (isset($page) && $page=='archives')?'active':'' ?>">
                                <li class="submenu-item <?php echo (isset($data) && $data=='graduate-list')?'active':'' ?>">
                                    <a href="?page=archives&data=graduate-list">Graduated</a>
                                </li>
                                <li class="submenu-item <?php echo (isset($data) && $data=='dropout-list')?'active':'' ?>">
                                    <a href="?page=archives&data=dropout-list">Dropped Out</a>
                                </li>
                                <li class="submenu-item <?php echo (isset($data) && $data=='transferred-list')?'active':'' ?>">
                                    <a href="?page=archives&data=transferred-list">Transferred out</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item <?php echo (isset($page) && $page=='schoolyear')?'active':'' ?>"<?php echo($_SESSION['role']=='Admin')?'': 'hidden'?>>
                            <a href="?page=schoolyear" class='sidebar-link'>
                                <i class="bi bi-calendar-check"></i>
                                <span>School Year</span>
                            </a>
                        </li>
                      
                        <li class="sidebar-item <?php echo (isset($page) && $page=='profile')?'active':'' ?>">
                            <a href="?page=profile" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item  ">
                            <a href="logout.php" class='sidebar-link'>
                                <i class="bi bi-box-arrow-left"></i>
                                <span>Log-out</span>
                            </a>
                         </li>
                     </ul>        
                     <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            
            </div>
        </div>
    </div>