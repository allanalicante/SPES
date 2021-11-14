<?php

session_start();

if (!isset($_SESSION["name"])){
    header('location: login.php');
    exit();
}
    //get pages
    
    $page="";
    $title = "";
    /* --------------------------If no page, then display dashboard------------------------- */
    if(!isset($_GET['page'])){
        $page="dashboard";
        $title = "SPES Student Management System";
    }else{
        /* ---------------------------- If there is a page, read the records and sub list------------------- */
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
                        
                    case 'pending-student':
                        $data='pending-student';
                        $title = "Student Admission list";
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
            /* --------------------- if page is not "records" or not empty then display user profile -------------------------- */
        }elseif($page='userprofile'){
            $page="userprofile";
            $title = "SPES Student Management System - User Profile";
        }
    }

    /* -------------------- start of including header and sidebar as fixed ---------------------------------- */
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
        /* ------------------------ Dashboard ---------------------------------- */
        case 'dashboard':


        echo '<!-- Dashboard -->';
        include_once('dashboard.php');
        echo '<!-- /Dashboard -->'; 
        break; 


        /* -----------------------------Records Part---------------------------------- */
        case 'records':
            
            if(isset($data) && $data=='admission-list'){

        echo '<!-- Admission List -->';
        include_once('admission_list.php');
        echo '<!-- /Admission List -->';
        
             }
             elseif(isset($data) && $data=='admission-new'){

        echo '<!-- Admission New -->';
        include_once('admission_form.php');
        echo '<!-- /Admission New -->';

             }

             elseif(isset($data) && $data=='pending-student'){

                echo '<!-- Pending-Student -->';
                include_once('pending_list.php');
                echo '<!-- /Pending-Student -->';
        
            }
             elseif(isset($data) && $data=='student-list'){
                
                        echo '<!-- student-list -->';
                        include_once('student_list.php'); 
                        echo '<!-- /student-list -->';
                
              }
             elseif(isset($data) && $data=='teacher-list'){
                
                        echo '<!-- teacher-list-->';
                         include_once('teacher_list.php'); 
                        echo '<!-- /teacher-list -->';
                
                             }
            elseif(isset($data) && $data=='section-list'){
                
                        echo '<!-- section-list -->';
                        include_once('section_list.php'); 
                        echo '<!-- /section-list -->';
                
                                }                         
        break; 

        case 'userprofile':

        echo '<!-- User Profile -->';
        include_once('user_profile.php');
        echo '<!-- /User Profile -->';
  break; 

        default: 
        echo '<!-- Dashboard -->';
        include_once('dashboard.php');
        echo '<!-- /Dashboard -->';

    } //close switch
        
        include_once('includes/footer_html.php');  
