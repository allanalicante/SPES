<?php
    //get pages
    $page="";
    $title = "";
    if(!isset($_GET['page'])){
        $page="dashboard";
        $title = "SPES Student Management System";
    }else{
        //there's page
        if($_GET['page'] =='records' && isset($_GET['page'])) 
        {
            $page="records";  
            $data="";
            if(isset($_GET['data']) && $_GET['data']!=null){
                switch($_GET['data']){
                    case 'admission-list':
                        $data='admission-list';
                        $title = "Admission List";
                        break;
                    
                    case 'admission-new':
                        $data='admission-new';
                        $title = "Student Admission Form";
                        break;   
                        
                    case 'student-list':
                        $data='student-list';
                        $title = "student List";
                        break;

                    case 'teacher-list':
                        $data='teacher-list';
                        $title = "teacher list";
                        break;

                        case 'section-list':
                            $data='section-list';
                            $title = "section list";
                            break;
                    default:
                        $data='admission-list';
                }
            }

        }
    }

?>
<?php include_once('includes/head_html.php'); ?>

<div id="app">
    <!-- Sidebar -->
    <?php include_once('includes/sidebar.php'); ?>
    <!-- /Sidebar -->
    
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
<?php
    switch($page){
         case 'dashboard':
?>
        <!-- Dashboard -->
        <?php include_once('dashboard.php'); ?>
        <!-- /Dashboard -->
<?php   break; 

        case 'records':
            if(isset($data) && $data=='admission-list'){
?>
        <!-- Admission List -->
        <?php include_once('admission_list.php'); ?>
        <!-- /Admission List -->
<?php   
             }
             elseif(isset($data) && $data=='admission-new'){
?>
        <!-- Admission New -->
        <?php include_once('admission_form.php'); ?>
        <!-- /Admission New -->
<?php
             }
             elseif(isset($data) && $data=='student-list'){
                ?>
                        <!-- Admission New -->
                        <?php include_once('student_list.php'); ?>
                        <!-- /Admission New -->
                <?php
              }
             elseif(isset($data) && $data=='teacher-list'){
                ?>
                        <!-- Admission New -->
                        <?php include_once('teacher_list.php'); ?>
                        <!-- /Admission New -->
                <?php
                             }
            elseif(isset($data) && $data=='section-list'){
                ?>
                        <!-- Admission New -->
                        <?php include_once('section_list.php'); ?>
                        <!-- /Admission New -->
                <?php
                                }
        break; 
        
        default: ?>
        <!-- Dashboard -->
        <?php include_once('dashboard.php'); ?>
        <!-- /Dashboard -->
<?php 
    } //close switch
?>
        
        <?php include_once('includes/footer_html.php'); ?>