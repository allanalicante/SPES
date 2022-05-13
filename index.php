<?php
session_start();

if (!isset($_SESSION["role"])){
    header('location: login.php');
    exit();
}
    //get pages
    
    $page="";
    $title = "";
    /* --------------------------If no page, then display dashboard------------------------- */
    if(!isset($_GET['page'])){
        $page="dashboard";
        $title = "SPES Student Enrolment System";
    }
    else{
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
                        $title = "Student Pending list";
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
        }  
        elseif($_GET['page'] =='reports' && isset($_GET['page'])){
            $page="reports";
            $data="";
            if(isset($_GET['data']) && $_GET['data']!=null){
                switch($_GET['data']){
                    case 'student-report-list':
                        $data='student-report-list';
                        $title = "Student Report List";
                        break;                 
                    case 'class-report-list':
                        $data='class-report-list';
                        $title = "Class Report List";
                        break;                   
                    case 'SPED-report-list':
                        $data='SPED-report-list';
                        $title = "SPED Report List";
                        break;                        
                    default:
                        $data='student-report-list';
                }
            }         
        } 
        elseif($_GET['page'] =='archives' && isset($_GET['page'])){
            $page="archives";
            $data="";
            if(isset($_GET['data']) && $_GET['data']!=null){
                switch($_GET['data']){
                    case 'graduate-list':
                        $data='graduate-list';
                        $title = "Graduate List";
                        break;                 
                    case 'dropout-list':
                        $data='dropout-list';
                        $title = "Dropout List";
                        break;                   
                    case 'transferred-list':
                        $data='transferred-list';
                        $title = "Transferred List";
                        break;                        
                    default:
                        $data='graduate-list';
                }
            }         
        } 
        elseif($_GET['page'] =='schoolyear' && isset($_GET['page'])){
            $page="schoolyear";
            $title = "SPES Student Enrolment System - schoolyear";
        }
        else if($_GET['page'] =='profile' && isset($_GET['page'])){
            $page="profile";
            $title = "SPES Student Enrolment System - profile";
        }
        else if($page='section'){
            $page="section";
            $title = "SPES Student Enrolment System - section";
        }
    }
   
    /* -------------------- start of including header and sidebar as fixed ---------------------------------- */
?>
<?php include_once('includes/head_html.php');
include_once('connect.php'); ?>

<div id="app">
    <!-- Sidebar -->
  
    <?php include_once('includes/sidebar.php');
     ?>

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
            include_once('dashboard.php');
        break; 
        /* -----------------------------Records Part---------------------------------- */
        case 'records':           
            if(isset($data) && $data=='admission-list'){include_once('admission_list.php');}
            elseif(isset($data) && $data=='admission-new'){include_once('admission_form.php');}
            elseif(isset($data) && $data=='pending-student'){include_once('pending_list.php');}
            elseif(isset($data) && $data=='student-list'){include_once('student_list.php');}
            elseif(isset($data) && $data=='teacher-list')
            {   
                if($_SESSION['role'] == 'Teacher'){include_once('error-404.php');}
                else{include_once('teacher_list.php');}
            }
            elseif(isset($data) && $data=='section-list'){include_once('section_list.php');}                                             
        break; 
        /* -----------------------------Reports Part---------------------------------- */
        case 'reports':
            if(isset($data) && $data=='student-report-list'){include_once('studentreport.php');}
            elseif(isset($data) && $data=='class-report-list'){include_once('classreport.php');}
            elseif(isset($data) && $data=='SPED-report-list'){include_once('SPEDreport.php');}
        break; 
         /* -----------------------------Archives Part---------------------------------- */
         case 'archives':
            if(isset($data) && $data=='graduate-list'){include_once('graduate_list.php');}
            elseif(isset($data) && $data=='dropout-list'){include_once('dropout_list.php');}
            elseif(isset($data) && $data=='transferred-list'){include_once('transferred_list.php');}
        break; 
        /* -----------------------------settings Part---------------------------------- */
        case 'schoolyear':
            if($_SESSION['role'] == 'Teacher'){    
                include_once('error-404.php');
            }
            else{
                include_once('schoolyear.php');
            }
        break; 
        /*  -----------------------------Profile Part---------------------------------- */
        case 'profile':
                include_once('MyProfile.php');        
        break; 
        /*  -----------------------------Section Part---------------------------------- */
        case 'section':
            include_once('MyClass.php');        
        break; 
        /* -----------------------------Default Part---------------------------------- */
        default: 
            include_once('dashboard.php');
        } //close switch
   
         include_once('includes/footer_html.php');  
        ?>
