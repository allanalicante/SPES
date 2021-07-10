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
                                <i class="bi bi-stack"></i>
                                <span>Records</span>
                            </a>

                            <ul class="submenu <?php echo (isset($page) && $page=='records')?'active':'' ?>">
                                <li class="submenu-item <?php echo (isset($data) && ($data=='admission-list' || $data=='admission-new'))?'active':'' ?>">
                                    <a href="?page=records&data=admission-list">Admission</a>
                                </li>
                                <li class="submenu-item <?php echo (isset($data) && $data=='student-list')?'active':'' ?>">
                                <a href="?page=records&data=student-list">Students</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="teacher-datatable.html">Teachers</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="#">Grade Level</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="section-datatable.html">Sections</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="user-layout.html" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>User Information</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="about-layout.html" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>About SPES</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="login.html" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Log-out</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
    </div>