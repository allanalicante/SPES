    <div id="sidebar" class="active">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
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
                                <li class="submenu-item <?php echo (isset($data) && ($data=='admission-list' || $data=='admission-new' || $data=='pending-student'))?'active':'' ?>">
                                    <a href="?page=records&data=admission-list">Admission</a>
                                </li>
                                <li class="submenu-item <?php echo (isset($data) && $data=='student-list')?'active':'' ?>">
                                <a href="?page=records&data=student-list">Student List</a>
                                </li>
                                <li class="submenu-item <?php echo (isset($data) && $data=='teacher-list')?'active':'' ?>">
                                    <a href="?page=records&data=teacher-list">Teachers</a>
                                </li>
                                <li class="submenu-item <?php echo (isset($data) && $data=='section-list')?'active':'' ?>">
                                    <a href="?page=records&data=section-list">Level & Section</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item <?php echo (isset($page) && $page=='userprofile')?'active':'' ?>">
                            <a href="?page=userprofile" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>User Profile</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="logout.php" class='sidebar-link'>
                                <i class="bi bi-box-arrow-left"></i>
                                <span>Log-out</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
    </div>