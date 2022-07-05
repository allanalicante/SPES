<?php
session_start();
include_once('includes/scripts.php');
include_once('connect.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


/* ----------------------------------- Code to insert new level and section --------------------------------------------- */
if(isset($_POST['insertsection']))
{
    try{
        $level = str_replace("'","\'",strtoupper($_POST['level']));
        $section = str_replace("'","\'",strtoupper($_POST['section']));
        $advisor = str_replace("'","\'",strtoupper($_POST['advisor']));
        $sy = $_POST['sy'];

    $query = "INSERT INTO section_tbl (`gradelevel_id`,`sectionname`,`teacher_id`,`sy`) VALUES ('$level','$section','$advisor','$sy')";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {   
        $_SESSION['status']= "Section is successfully added.";    
        $_SESSION['status_code']= "success"; 
        header("Location: index.php?page=records&data=section-list");
    }
    else
    {
        $_SESSION['status']= "Failed to Add Section.";    
        $_SESSION['status_code']= "error"; 
        header("Location: index.php?page=records&data=section-list");

    }
    }
    catch (mysqli_sql_exception $exception) 
                {
                mysqli_rollback($connection);
                throw $exception;
                echo "ErrorW";
    
                }
}

/* -----------------------------------  Code to update level and section --------------------------------------------- */
elseif(isset($_POST['updatesection']))
{
    try{
     $id = $_POST['update_id'];
     $level = $_POST['editgradeid'];
     $section = str_replace("'","\'",strtoupper($_POST['editsection']));
     $advisor = $_POST['editadvisor'];
     $updatesy = $_POST['updatesy'];
 
     $query = "UPDATE section_tbl SET gradelevel_id='$level',sectionname='$section',teacher_id = '$advisor', sy='$updatesy' WHERE id='$id'";
     $query_run = mysqli_query($connection,$query);
 
     if($query_run)
     {   
        $_SESSION['status']= "Class is updated successfully.";    
        $_SESSION['status_code']= "success"; 
         header("Location: index.php?page=records&data=section-list");      
     }
     else
     {
        $_SESSION['status']= "Failed to Update Class.";    
        $_SESSION['status_code']= "error"; 
        header("Location: index.php?page=records&data=section-list");
     } 
    }
    catch (mysqli_sql_exception $exception) 
                {
                mysqli_rollback($connection);
                throw $exception;
                echo "ErrorW";  
                } 
} 

/* -----------------------------------  Code to insert new teacher/user  --------------------------------------------- */
elseif(isset($_POST['insertteacher']))
{
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
           
            $roletype = $_POST['roletype'];
            $status = $_POST['status'];
            $name = str_replace("'","\'",strtoupper($_POST['name']));
            $contactno = str_replace("'","\'",$_POST['contactno']);
            $address = str_replace("'","\'",$_POST['address']);
            $gradetohandle = $_POST['gradetohandle'];
            $username = str_replace("'","\'",$_POST['username']);
            $password = str_replace("'","\'",$_POST['password']);
            
            

    try{       
        
                // Insert into Database
                $sql1 = "INSERT INTO users (`username`,`password`,`role`,`status`) 
                VALUES
                ('$username','$password','$roletype','$status')";

                $sql2 = "INSERT INTO teacher (`id`,`name`,`contactno`,`address`,`gradetohandle`) 
                VALUES
                (LAST_INSERT_ID(),'$name','$contactno','$address','$gradetohandle')";
                
                $query1 = mysqli_query($connection,$sql1);
                $query2 = mysqli_query($connection,$sql2);


                if(mysqli_commit($connection)){
                    $_SESSION['status']= "Teacher is successfully Added.";    
                    $_SESSION['status_code']= "success";
                    header("Location: index.php?page=records&data=teacher-list");        
                }               
                else {
                     $_SESSION['status']= "An error occured. Failed adding data.";    
                    $_SESSION['status_code']= "error"; 
                    header("Location: index.php?page=records&data=teacher-list");
                }
        }

        catch(mysqli_sql_exception $exception) 
        {
        mysqli_rollback($connection);
        throw $exception;
        echo "<p>Error</p>";   
        }
}

/* -----------------------------------  Code to update teacher/user --------------------------------------------- */
elseif(isset($_POST['updateteacher']))
{
     $id = $_POST['updateid'];
     $status = $_POST['updatestatus'];
     $name = str_replace("'","\'",strtoupper($_POST['updatename']));
     $levelsectionid = $_POST['updatelevel_section_id'];
     $contactno = str_replace("'","\'",$_POST['updatecontactno']);
     $address = str_replace("'","\'",$_POST['updateaddress']);
     $gradetohandle = $_POST['updategradetohandle'];
     $currentid = $_POST['currentid'];
     $username = str_replace("'","\'",$_POST['updateusername']);
     $password = str_replace("'","\'",$_POST['updatepassword']);

     mysqli_begin_transaction($connection);
     
     try{       
    
            // Insert into Database
            $sql1 = "UPDATE teacher SET 
                gradetohandle='$gradetohandle'
                WHERE id ='$id'";
                $query_run = mysqli_query($connection,$sql1);

            $sql2 = "UPDATE users SET
                username='$username', password='$password', status='$status'
                WHERE id ='$id'";
                $query_run = mysqli_query($connection,$sql2);
            
            $query1 = mysqli_query($connection,$sql1);
            $query2 = mysqli_query($connection,$sql2);


            if(mysqli_commit($connection)){
                $_SESSION['status']= "Teacher profile is updated successfully.";    
                $_SESSION['status_code']= "success";
                header("Location: index.php?page=records&data=teacher-list");        
            }
               
        else {
                 $_SESSION['status']= "Unknown error occured. Try changing your photo.";    
                $_SESSION['status_code']= "error"; 
                header("Location: index.php?page=records&data=teacher-list");
        }
    }
    catch (mysqli_sql_exception $exception) 
                {
                mysqli_rollback($connection);
                throw $exception;
                echo "ErrorW";    
                }   
} 

/* -----------------------------------  Code to update teacher/user --------------------------------------------- */
elseif(isset($_POST['updateselfteacher']) && isset($_FILES['photo']))
{
     $id = $_POST['updateid'];
     $name = str_replace("'","\'",strtoupper($_POST['updatename']));
     $contactno = str_replace("'","\'",$_POST['updatecontactno']);
     $address = str_replace("'","\'",$_POST['updateaddress']);
     $username = str_replace("'","\'",$_POST['updateusername']);
     $password = str_replace("'","\'",$_POST['updatepassword']);

     mysqli_begin_transaction($connection);
     
     try
     {
        $img_name = $_FILES['photo']['name'];
        $img_size = $_FILES['photo']['size'];
        $tmp_name = $_FILES['photo']['tmp_name'];
        $error = $_FILES['photo']['error'];

        if ($error === 0) {
            if ($img_size > 99999999) {
                $_SESSION['status']= "Sorry, your file is too large.";    
                $_SESSION['status_code']= "error";
                header("Location: index.php?page=profile");
            }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png"); 

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'uploads/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path); 
               
    
            // Insert into Database
            $sql1 = "UPDATE teacher SET 
                name='$name',
                contactno='$contactno',
                address='$address'
                WHERE id ='$id'";
                $query_run = mysqli_query($connection,$sql1);

            $sql2 = "UPDATE users SET
                username='$username', password='$password', image='$new_img_name'
                WHERE id ='$id'";
                $query_run = mysqli_query($connection,$sql2);
            
            $query1 = mysqli_query($connection,$sql1);
            $query2 = mysqli_query($connection,$sql2);


            if(mysqli_commit($connection)){
                $_SESSION['status']= "Teacher profile is updated successfully.";    
                $_SESSION['status_code']= "success";
                header("Location: index.php?page=profile");
                       
            }
            }else 
            {
                $_SESSION['status']= "You can't upload this type of file.";    
                $_SESSION['status_code']= "error";
                header("Location: index.php?page=profile");
             
            }
                }
               
            }else {
                 $_SESSION['status']= "Unknown error occured. Try changing your photo.";    
                $_SESSION['status_code']= "error"; 
                header("Location: index.php?page=profile");
        }
    }
    catch (mysqli_sql_exception $exception) 
                {
                mysqli_rollback($connection);
                throw $exception;
                echo "ErrorW";    
                }   
} 

/* -----------------------------------  Code to update student --------------------------------------------- */
elseif(isset($_POST['updatestudent']))
{
    
     
     $id = $_POST['editstud_id'];
     $firstname = str_replace("'","\'",strtoupper($_POST['editfirstname']));
     $middlename = str_replace("'","\'",strtoupper($_POST['editmiddlename']));
     $lastname = str_replace("'","\'",strtoupper($_POST['editlastname']));
     $levelsectionid = $_POST['editGradeSection'];
     $modality = $_POST['editmodality'];
     $lrn = $_POST['editlrn'];

     mysqli_begin_transaction($connection);

     try{
     $sql1 = "UPDATE student_tbl SET
     lrn = '$lrn',
     firstname = '$firstname',
     middlename = '$middlename',
     lastname = '$lastname',
     modality='$modality'
     WHERE id ='$id'";
     $query_run = mysqli_query($connection,$sql1);

     $sql2 = "UPDATE enrollment_tbl SET
     section_id = '$levelsectionid'
     WHERE student_id ='$id'";
     $query_run = mysqli_query($connection,$sql2);

     $query1 = mysqli_query($connection,$sql1);
     $query2 = mysqli_query($connection,$sql2);


 
     if(mysqli_commit($connection))
     {   
        $_SESSION['status']= "Student is updated Successfully.";    
        $_SESSION['status_code']= "success"; 
         header("Location: index.php?page=records&data=student-list");          
     }
     else
     {
        $_SESSION['status']= "Failed to update student.";    
        $_SESSION['status_code']= "error"; 
        header("Location: index.php?page=records&data=student-list");  
     }
    }
            catch (mysqli_sql_exception $exception) 
            {
            mysqli_rollback($connection);
            throw $exception;
            echo "Error";
            }
}

/* ----------------------------------- Code for admin to archive student ------------------------------------ */
elseif(isset($_POST['adminupdatestudent']))
{
    try{
     
        $id = $_POST['admineditstud_id'];
        $remarks = str_replace("'","\'",strtoupper($_POST['adminremarks']));
        $archive = $_POST['adminarchiveas'];
   
        mysqli_begin_transaction($connection);
   
   
        $sql1 = "UPDATE student_tbl SET
        Remarks = '$remarks'
        WHERE id ='$id'";
        $query_run = mysqli_query($connection,$sql1);
   
        $sql2 = "UPDATE enrollment_tbl SET
        section_id = NULL,
        dateofenroll = NULL,
        dateofexit = now(),
        status = '$archive'
        WHERE student_id ='$id'";
        $query_run = mysqli_query($connection,$sql2);
   
        $query1 = mysqli_query($connection,$sql1);
        $query2 = mysqli_query($connection,$sql2);
   
   
    
        if(mysqli_commit($connection))
        {   
           $_SESSION['status']= "Student has been moved to archive list.";    
           $_SESSION['status_code']= "success"; 
            header("Location: index.php?page=records&data=student-list");          
        }
        else
        {
           $_SESSION['status']= "Failed to archive student.";    
           $_SESSION['status_code']= "error"; 
           header("Location: index.php?page=records&data=student-list");  
        }
       }
               catch (mysqli_sql_exception $exception) 
               {
               mysqli_rollback($connection);
               throw $exception;
               echo "Error";
               }
   
}

/* -----------------------------------  Code to enroll student officially --------------------------------------------- */
elseif(isset($_POST['updatepending']))
{
     try{
        function itexmo($number,$message,$apicode,$passwd){
            $url = 'https://www.itexmo.com/php_api/api.php';
            $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
            $param = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($itexmo),
                ),
            );
            $context  = stream_context_create($param);
            return file_get_contents($url, false, $context);
        }

            $sectionid = $_POST['GradeSection'];
            $pendingId = $_POST['pendingId'];
            $grade = $_POST['level'];
            $contact = $_POST['contact'];
            $class = $_POST['GradeSection'];
            $student = $_POST['pendingname'];

            // Query for getting the class name as well as the teacher assigned to it.
            $querysection = "SELECT CONCAT(g.grade,' - ',s.sectionname) AS `Class`, t.name AS `Teacher`
            FROM section_tbl s
            INNER JOIN gradelevel_tbl g
            ON g.id = s.gradelevel_id 
            INNER JOIN teacher t
            ON t.id = s.teacher_id 
            WHERE s.id = '$class'";
            $query_run = mysqli_query($connection,$querysection);
            $row=$query_run->fetch_assoc();
            if($query_run){
                $classname = $row['Class'];
                $classteacher = $row['Teacher'];
            }
            // Query for getting the current/active schoolyear as well as its ID
            $querysection = "SELECT schoolyear, id FROM schoolyear_tbl WHERE Active = 'Yes'";
            $query_run = mysqli_query($connection,$querysection);
            $row=$query_run->fetch_assoc();
            if($query_run){
                $schoolyear = $row['schoolyear'];
                $schoolyearid = $row['id'];
            }
    
                $query = "UPDATE enrollment_tbl SET
                schoolyear_id = '$schoolyearid',
                section_id='$sectionid',
                status='enrolled',
                dateofenroll = now()
                WHERE student_id ='$pendingId' and status != 'renew'";
                $query_run = mysqli_query($connection,$query);
 
     if($query_run)
     {   
        $receiver = $_POST['contact'];
        $sender = "SPES Advisory";
        $msg = "is now enrolled. His/Her class is";
        $msg2 = "and his/her advisor is";
        $api = "TR-SPEST659738_Z7BGU";//ST-SORSO880451_U3LTP - last month
        $apipass = "(g[y#}l{9e"; // ")8b%(9}m&] last month
        $text = $sender. ": " .$student. " " .$msg. " " .$classname;
       /*  $text = $sender. ": " .$student. " " .$msg. " " .$classname. " " .$msg2. " " .$classteacher; */

        $result = itexmo($receiver,$text,$api,$apipass);
        if ($result == ""){
            $_SESSION['status']= "Student is successfully enrolled."; 
            $_SESSION['text']= "Sending of message failed: No response from server!";
            $_SESSION['status_code']= "warning"; 
            header("Location: index.php?page=records&data=pending-student");  
        }else if ($result == 0){            
            $_SESSION['status']= "Student is successfully enrolled.";   
            $_SESSION['text']= "Success! Message is now on queue and will be sent soon."; 
            $_SESSION['status_code']= "success"; 
            header("Location: index.php?page=records&data=pending-student");  
        }
        else if ($result == 1){            
            $_SESSION['status']= "Student is successfully enrolled.";   
            $_SESSION['text']= "Sending of message failed: Invalid contact number of guardian."; 
            $_SESSION['status_code']= "warning"; 
            header("Location: index.php?page=records&data=pending-student");  
        }
        else if ($result == 2){            
            $_SESSION['status']= "Student is successfully enrolled.";   
            $_SESSION['text']= "Sending of message failed: Number prefix not supported. Please contact us so we can add."; 
            $_SESSION['status_code']= "warning"; 
            header("Location: index.php?page=records&data=pending-student");  
        }
        else if ($result == 3){            
            $_SESSION['status']= "Student is successfully enrolled.";   
            $_SESSION['text']= "Sending of message failed: Invalid ApiCode."; 
            $_SESSION['status_code']= "warning"; 
            header("Location: index.php?page=records&data=pending-student");  
        }
        else if ($result == 4){            
            $_SESSION['status']= "Student is successfully enrolled.";   
            $_SESSION['text']= "Sending of message failed: Maximum Message per day reached. This will be reset every 12MN."; 
            $_SESSION['status_code']= "warning"; 
            header("Location: index.php?page=records&data=pending-student");  
        }
        else if ($result == 5){            
            $_SESSION['status']= "Student is successfully enrolled.";   
            $_SESSION['text']= "Sending of message failed: Maximum allowed characters for message reached."; 
            $_SESSION['status_code']= "warning"; 
            header("Location: index.php?page=records&data=pending-student");  
        }
        else if ($result == 6){            
            $_SESSION['status']= "Student is successfully enrolled.";   
            $_SESSION['text']= "Sending of message failed: System OFFLINE."; 
            $_SESSION['status_code']= "warning"; 
            header("Location: index.php?page=records&data=pending-student");  
        }
        else if ($result == 7){            
            $_SESSION['status']= "Student is successfully enrolled.";   
            $_SESSION['text']= "Sending of message failed: Expired ApiCode."; 
            $_SESSION['status_code']= "warning"; 
            header("Location: index.php?page=records&data=pending-student");  
        }
        else if ($result == 8){            
            $_SESSION['status']= "Student is successfully enrolled.";   
            $_SESSION['text']= "Sending of message failed: iTexMo Error. Please try again later."; 
            $_SESSION['status_code']= "warning"; 
            header("Location: index.php?page=records&data=pending-student");  
        }
        else if ($result == 9){            
            $_SESSION['status']= "Student is successfully enrolled.";   
            $_SESSION['text']= "Sending of message failed: Invalid Function Parameters."; 
            $_SESSION['status_code']= "warning"; 
            header("Location: index.php?page=records&data=pending-student");  
        }
        else if ($result == 10){            
            $_SESSION['status']= "Student is successfully enrolled.";   
            $_SESSION['text']= "Sending of message failed: Guardian's number is blocked due to FLOODING, message was ignored."; 
            $_SESSION['status_code']= "warning"; 
            header("Location: index.php?page=records&data=pending-student");  
        }
        else if ($result == 11){            
            $_SESSION['status']= "Student is successfully enrolled.";   
            $_SESSION['text']= "Guardian's number is blocked temporarily due to HARD sending (after 3 retries of sending and message still failed to send) and the message was ignored. Try again after an hour."; 
            $_SESSION['status_code']= "warning"; 
            header("Location: index.php?page=records&data=pending-student");  
        }
        else{	
            $_SESSION['status']= "Error encountered." . $result;   
            $_SESSION['text']= "There could be a fault in system code."; 
            $_SESSION['status_code']= "error"; 
            header("Location: index.php?page=records&data=pending-student"); 
        }
     }
     else
     {
        $_SESSION['status']= "Failed to enroll student.";
        $_SESSION['text']= "There could be a fault in system code."; 
        $_SESSION['status_code']= "error"; 
        header("Location: index.php?page=records&data=pending-student");  
     }
        }
 
            catch (mysqli_sql_exception $exception) 
            {
            mysqli_rollback($connection);
            throw $exception;
            echo "ErrorW";
        }           
}

/* -----------------------------------  Code to admit new student  --------------------------------------------- */
elseif(isset($_POST['admitstudent']) && isset($_FILES['photo']))
{
   
    //A. GRADE LEVEL AND SCHOOL INFORMATION//
    $schoolyear = $_POST['A1'];
    $optionlrn = $_POST['A2'];
    $returning = $_POST['A3'];
    $gradetoenroll = $_POST['A4'];
    $lastgradecompleted = $_POST['A5'];
    $lastschoolyearcompleted = str_replace("'","\'",$_POST['A6']);
    $lastschoolattended = str_replace("'","\'",strtoupper($_POST['A7']));
    $schoolid = str_replace("'","\'",$_POST['A8']);
    $schooladdress =  str_replace("'","\'",strtoupper($_POST['A9']));
    $schooltype = $_POST['A10'];
    $schooltoenroll = str_replace("'","\'",strtoupper($_POST['A11']));
    $schoolid2 = str_replace("'","\'",$_POST['A12']);
    $schooladdress2 = str_replace("'","\'",strtoupper($_POST['A13']));
    //B. STUDENT INFORMATION//
    $psa = str_replace("'","\'",strtoupper($_POST['B1']));
    $lrn = str_replace("'","\'",$_POST['B2']);
    //$photo = $_POST['photo'];
    $lname = str_replace("'","\'",strtoupper($_POST['B3']));
    $fname = str_replace("'","\'",strtoupper($_POST['B4']));
    $mname = str_replace("'","\'",strtoupper($_POST['B5']));
    $ext = str_replace("'","\'",strtoupper($_POST['B6']));
    $bday = str_replace("'","\'",$_POST['B7']);
    $age = str_replace("'","\'",$_POST['B8']);
    $sex = $_POST['B9'];
    $ethnic = $_POST['B10'];
    $mtounge = $_POST['B12'];
    $religion = $_POST['religion'];
    $modality = $_POST['modality'];
    $pppp = $_POST['4ps'];
    $studentType = $_POST['A00'];
    //For Learners with Special Education Needs
    $b14 = $_POST['B14'];
    $semib15=$_POST['B15'];
    $b15 = implode(',',$semib15);
    $b151 = str_replace("'","\'",strtoupper($_POST['B151']));
    $b16 = $_POST['B16'];
    $b17 = str_replace("'","\'",strtoupper($_POST['B17']));
    //ADDRESS INFORMATION
    $house = str_replace("'","\'",strtoupper($_POST['street']));
    $barangay = str_replace("'","\'",strtoupper($_POST['barangay']));
    $city = str_replace("'","\'",strtoupper($_POST['municipality']));
    $province = str_replace("'","\'",strtoupper($_POST['province']));
    $region = str_replace("'","\'",strtoupper($_POST['region']));
    //C. PARENT / GUARDIAN INFORMATION 
    $father = str_replace("'","\'",strtoupper($_POST['father']));
    $mother = str_replace("'","\'",strtoupper($_POST['mother']));
    $guardian = str_replace("'","\'",strtoupper($_POST['guardian']));
    $fathereducattainment = str_replace("'","\'",strtoupper($_POST['fathereducattainment']));
    $mothereducattainment = str_replace("'","\'",strtoupper($_POST['mothereducattainment']));
    $guardianeducattainment = str_replace("'","\'",strtoupper($_POST['guardianeducattainment']));
    $fatheremployment = $_POST['fatheremployment'];
    $motheremployment = $_POST['motheremployment'];
    $guardianemployment = $_POST['guardianemployment'];
    $fatherWFH = $_POST['fatherWFH'];
    $motherWFH = $_POST['motherWFH'];
    $guardianWFH = $_POST['guardianWFH'];
    $fathercontact = str_replace("'","\'",$_POST['fathercontact']);
    $mothercontact = str_replace("'","\'",$_POST['mothercontact']);
    $guardiancontact = str_replace("'","\'",$_POST['guardiancontact']);
    $guardianrelationship = str_replace("'","\'",strtoupper($_POST['guardianrelate']));
    //D. HOUSEHOLD CAPACITY AND ACCESS TO DISTANCE LEARNING
    $semiD1=$_POST['D1'];  
    $D1 = implode(',',$semiD1);
    $semiD2=$_POST['D2'];  
    $D2 = implode(',',$semiD2);
    $semiD3=$_POST['D3'];  
    $D3 = implode(',',$semiD3);
    $semiD4=$_POST['D4'];  
    $D4 = implode(',',$semiD4);
    $D5 = $_POST['D5']; 
    $semiD6=$_POST['D6'];  
    $D6 = implode(',',$semiD6);
    $semiD7=$_POST['D7'];  
    $D7 = implode(',',$semiD7);
    $semiD8=$_POST['D8'];  
    $D8 = implode(',',$semiD8);
    

        mysqli_begin_transaction($connection);
        try
        {        
        $img_name = $_FILES['photo']['name'];
        $img_size = $_FILES['photo']['size'];
        $tmp_name = $_FILES['photo']['tmp_name'];
        $error = $_FILES['photo']['error'];

        if ($error === 0) {
            if ($img_size > 5000000) {
                $_SESSION['status']= "Sorry, your file is too large.";    
                $_SESSION['status_code']= "error";
                header("Location: enroll-now.php");   
            }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png"); 

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'uploads/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    // Insert into Database
                    //inserting data into student_tbl
                    $sql = "INSERT INTO student_tbl(`psa`,`lrn`,`photo`,`lastname`,`firstname`,`middlename`,`extension`,`birthday`,`age`,
                    `sex`,`ethnicgroup`,`mothertongue`,`religion`,`modality`,`4Ps`,`studentType`,
                    `street`,`barangay`,`municipality`,`province`,`region`,
                    `fname`,`feducattain`,`femploystatus`,`fwfh`,`fcontactno`,
                    `mname`,`meducattain`,`memploystatus`,`mwfh`,`mcontactno`,
                    `gname`,`geducattain`,`gemploystatus`,`gwfh`,`gcontactno`,`grelationship`,
                    `optionlrn`,`returning`,`gradetoenroll`,`lastgradecompleted`,
                    `lastschoolyearcompleted`,`lastschoolattended`,`schoolid`,`schooladdress`,`schooltype`,`schooltoenroll`,`schoolid2`,`schooladdress2`,
                    `spedneeds`,`specifyneeds`,`specifyneeds2`,`assistivetech`,`specifyassistivetech`,
                    `D1`,`D2`,`D3`,`D4`,`D5`,`D6`,`D7`,`D8`)
                    values
                    ('$psa','$lrn','$new_img_name','$lname','$fname','$mname','$ext','$bday','$age',
                    '$sex','$ethnic','$mtounge','$religion','$modality','$pppp','$studentType',
                    '$house','$barangay','$city','$province','$region',
                    '$father','$fathereducattainment','$fatheremployment','$fatherWFH','$fathercontact',
                    '$mother','$mothereducattainment','$motheremployment','$motherWFH','$mothercontact',
                    '$guardian','$guardianeducattainment','$guardianemployment','$guardianWFH','$guardiancontact','$guardianrelationship',
                    '$optionlrn','$returning','$gradetoenroll','$lastgradecompleted',
                    '$lastschoolyearcompleted','$lastschoolattended','$schoolid','$schooladdress',
                    '$schooltype','$schooltoenroll','$schoolid2','$schooladdress2',
                    '$b14','$b15','$b151','$b16','$b17',
                    '$D1','$D2','$D3','$D4','$D5','$D6','$D7','$D8')";
                    
                    //inserting data into enrollment_tbl
                    $sql1 = "INSERT INTO enrollment_tbl(`student_id`,`status`) 
                    VALUES
                    (LAST_INSERT_ID(),'pending')";
            
                    
                    $query1 = mysqli_query($connection,$sql);
                    $query2 = mysqli_query($connection,$sql1);

                    if(mysqli_commit($connection)){
                        $_SESSION['status']= "Submitted Successfully, kindly wait for your text confirmation.";    
                        $_SESSION['status_code']= "success";
                        header("Location: enroll-now.php");        
                    }
                }else {
                    $_SESSION['status']= "You can't upload this type of file.";    
                    $_SESSION['status_code']= "error";
                  
                }
                    }
                }else {
                    $_SESSION['status']= "Unknown error occured. Try changing your photo and try again.";    
                    $_SESSION['status_code']= "error";
                 
                }
            }
            catch (mysqli_sql_exception $exception) 
                {
                mysqli_rollback($connection);
                throw $exception;
                echo "Error";
        } 

}

/* -----------------------------------  Code to admit new student  --------------------------------------------- */
elseif(isset($_POST['manueladmit']) && isset($_FILES['photo']))
{
    //A. GRADE LEVEL AND SCHOOL INFORMATION//
    $schoolyear = $_POST['A1'];
    $optionlrn = $_POST['A2'];
    $returning = $_POST['A3'];
    $gradetoenroll = $_POST['A4'];
    $lastgradecompleted = $_POST['A5'];
    $lastschoolyearcompleted = str_replace("'","\'",$_POST['A6']);
    $lastschoolattended = str_replace("'","\'",strtoupper($_POST['A7']));
    $schoolid = str_replace("'","\'",$_POST['A8']);
    $schooladdress =  str_replace("'","\'",strtoupper($_POST['A9']));
    $schooltype = $_POST['A10'];
    $schooltoenroll = str_replace("'","\'",strtoupper($_POST['A11']));
    $schoolid2 = str_replace("'","\'",$_POST['A12']);
    $schooladdress2 = str_replace("'","\'",strtoupper($_POST['A13']));
    //B. STUDENT INFORMATION//
    $psa = str_replace("'","\'",strtoupper($_POST['B1']));
    $lrn = str_replace("'","\'",$_POST['B2']);
    //$photo = $_POST['photo'];
    $lname = str_replace("'","\'",strtoupper($_POST['B3']));
    $fname = str_replace("'","\'",strtoupper($_POST['B4']));
    $mname = str_replace("'","\'",strtoupper($_POST['B5']));
    $ext = str_replace("'","\'",strtoupper($_POST['B6']));
    $bday = str_replace("'","\'",$_POST['B7']);
    $age = str_replace("'","\'",$_POST['B8']);
    $sex = $_POST['B9'];
    $ethnic = $_POST['B10'];
    $mtounge = $_POST['B12'];
    $religion = $_POST['religion'];
    $modality = $_POST['modality'];
    $pppp = $_POST['4ps'];
    $studentType = "New";
    //For Learners with Special Education Needs
    $b14 = $_POST['B14'];
    $checkbox15=$_POST['B15'];
    $chk15="";;
    foreach($checkbox15 as $chkFif)  
    {  
        $chk15 .= $chkFif.",";  
    } 
    $b151 = str_replace("'","\'",strtoupper($_POST['B151']));
    $b16 = $_POST['B16'];
    $b17 = str_replace("'","\'",strtoupper($_POST['B17']));
    //ADDRESS INFORMATION
    $house = str_replace("'","\'",strtoupper($_POST['street']));
    $barangay = str_replace("'","\'",strtoupper($_POST['barangay']));
    $city = str_replace("'","\'",strtoupper($_POST['municipality']));
    $province = str_replace("'","\'",strtoupper($_POST['province']));
    $region = str_replace("'","\'",strtoupper($_POST['region']));
    //C. PARENT / GUARDIAN INFORMATION 
    $father = str_replace("'","\'",strtoupper($_POST['father']));
    $mother = str_replace("'","\'",strtoupper($_POST['mother']));
    $guardian = str_replace("'","\'",strtoupper($_POST['guardian']));
    $fathereducattainment = str_replace("'","\'",strtoupper($_POST['fathereducattainment']));
    $mothereducattainment = str_replace("'","\'",strtoupper($_POST['mothereducattainment']));
    $guardianeducattainment = str_replace("'","\'",strtoupper($_POST['guardianeducattainment']));
    $fatheremployment = $_POST['fatheremployment'];
    $motheremployment = $_POST['motheremployment'];
    $guardianemployment = $_POST['guardianemployment'];
    $fatherWFH = $_POST['fatherWFH'];
    $motherWFH = $_POST['motherWFH'];
    $guardianWFH = $_POST['guardianWFH'];
    $fathercontact = str_replace("'","\'",$_POST['fathercontact']);
    $mothercontact = str_replace("'","\'",$_POST['mothercontact']);
    $guardiancontact = str_replace("'","\'",$_POST['guardiancontact']);
    $guardianrelationship = str_replace("'","\'",strtoupper($_POST['guardianrelate']));
    //D. HOUSEHOLD CAPACITY AND ACCESS TO DISTANCE LEARNING
    $checkbox1=$_POST['D1'];  
    $checkbox2=$_POST['D2'];
    $checkbox3=$_POST['D3'];
    $checkbox4=$_POST['D4'];
    $checkbox5=$_POST['D5'];
    $checkbox6=$_POST['D6'];
    $checkbox7=$_POST['D7'];
    $checkbox8=$_POST['D8'];
    $chk1=""; $chk2=""; $chk3=""; $chk4=""; $chk5=""; $chk6=""; $chk7=""; $chk8="";
    foreach($checkbox1 as $chkOne)  
    {  
        $chk1 .= $chkOne.",";  
    }  
    foreach($checkbox2 as $chkTwo)  
    {  
        $chk2 .= $chkTwo.",";  
    }
    foreach($checkbox3 as $chkThree)  
    {  
        $chk3 .= $chkThree.",";  
    }  
    foreach($checkbox4 as $chkFour)  
    {  
        $chk4 .= $chkFour.",";  
    }
    foreach($checkbox5 as $chkFive)  
    {  
        $chk5 .= $chkFive.",";  
    }  
    foreach($checkbox6 as $chkSix)  
    {  
        $chk6 .= $chkSix.",";  
    }
    foreach($checkbox7 as $chkSeven)  
    {  
        $chk7 .= $chkSeven.",";  
    }  
    foreach($checkbox8 as $chkEight)  
    {  
        $chk8 .= $chkEight.",";  
    }
    /*     $query = "SELECT * FROM student_tbl WHERE `lrn` = '$lrn'";
    $query_run = mysqli_query($connection, $query);
    $rows = mysqli_num_rows($query_run);

    /* The above $rows would contain the number of rows returned in the result set. So, before 
      firing the insert query, you just have to check one condition :- */

    /* if ($rows === 0) { */ // Meaning record does not exist with “some email”
        // Insert query */
        mysqli_begin_transaction($connection);
        try
        {        
        $img_name = $_FILES['photo']['name'];
        $img_size = $_FILES['photo']['size'];
        $tmp_name = $_FILES['photo']['tmp_name'];
        $error = $_FILES['photo']['error'];

        if ($error === 0) {
            if ($img_size > 5000000) {
                $_SESSION['status']= "Sorry, your file is too large.";    
                $_SESSION['status_code']= "error";
                header("Location:  index.php?page=records&data=pending-student");   
            }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png"); 

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'uploads/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    // Insert into Database
                    //inserting data into student_tbl
                    $sql = "INSERT INTO student_tbl(`psa`,`lrn`,`photo`,`lastname`,`firstname`,`middlename`,`extension`,`birthday`,`age`,
                    `sex`,`ethnicgroup`,`mothertongue`,`religion`,`modality`,`4Ps`,`studentType`,
                    `street`,`barangay`,`municipality`,`province`,`region`,
                    `fname`,`feducattain`,`femploystatus`,`fwfh`,`fcontactno`,
                    `mname`,`meducattain`,`memploystatus`,`mwfh`,`mcontactno`,
                    `gname`,`geducattain`,`gemploystatus`,`gwfh`,`gcontactno`,`grelationship`,
                    `optionlrn`,`returning`,`gradetoenroll`,`lastgradecompleted`,
                    `lastschoolyearcompleted`,`lastschoolattended`,`schoolid`,`schooladdress`,`schooltype`,`schooltoenroll`,`schoolid2`,`schooladdress2`,
                    `spedneeds`,`specifyneeds`,`specifyneeds2`,`assistivetech`,`specifyassistivetech`,
                    `D1`,`D2`,`D3`,`D4`,`D5`,`D6`,`D7`,`D8`)
                    values
                    ('$psa','$lrn','$new_img_name','$lname','$fname','$mname','$ext','$bday','$age',
                    '$sex','$ethnic','$mtounge','$religion','$modality','$pppp','$studentType',
                    '$house','$barangay','$city','$province','$region',
                    '$father','$fathereducattainment','$fatheremployment','$fatherWFH','$fathercontact',
                    '$mother','$mothereducattainment','$motheremployment','$motherWFH','$mothercontact',
                    '$guardian','$guardianeducattainment','$guardianemployment','$guardianWFH','$guardiancontact','$guardianrelationship',
                    '$optionlrn','$returning','$gradetoenroll','$lastgradecompleted',
                    '$lastschoolyearcompleted','$lastschoolattended','$schoolid','$schooladdress',
                    '$schooltype','$schooltoenroll','$schoolid2','$schooladdress2',
                    '$b14','$chk15','$b151','$b16','$b17',
                    '$chk1','$chk2','$chk3','$chk4','$chk5','$chk6','$chk7','$chk8')";
                    
                    //inserting data into enrollment_tbl
                    $sql1 = "INSERT INTO enrollment_tbl(`student_id`,`status`) 
                    VALUES
                    (LAST_INSERT_ID(),'pending')";
            
                    
                    $query1 = mysqli_query($connection,$sql);
                    $query2 = mysqli_query($connection,$sql1);

                    if(mysqli_commit($connection)){
                        $_SESSION['status']= "Successfully Admitted, kindly wait for your text confirmation.";    
                        $_SESSION['status_code']= "success";
                        header("Location: index.php?page=records&data=pending-student");        
                    }
                }else {
                    $_SESSION['status']= "You can't upload this type of file.";    
                    $_SESSION['status_code']= "error";
                    
                }
                    }
                }else {
                    $_SESSION['status']= "Unknown error occured. Try changing your photo and try again.";    
                    $_SESSION['status_code']= "error";
                

                }
            }
            catch (mysqli_sql_exception $exception) 
                {
                mysqli_rollback($connection);
                throw $exception;
                echo "Error";
        } 
    
  /*   else
    {
        $_SESSION['status']= "The lrn you entered is already exist.";    
        $_SESSION['status_code']= "error";
    } */
}

/*  ------------------------------------ Code to re-admit student ------------------------------------------------ */
elseif(isset($_POST['readmitstudent']) && isset($_FILES['photo']))
{
    //A. GRADE LEVEL AND SCHOOL INFORMATION//
    $stud_id = $_POST['stud_id'];
    $schoolyear = $_POST['A1'];
    $optionlrn = $_POST['A2'];
    $returning = $_POST['A3'];
    $gradetoenroll = $_POST['A4'];
    $lastgradecompleted = $_POST['A5'];
    $lastschoolyearcompleted = str_replace("'","\'",$_POST['A6']);
    $lastschoolattended = str_replace("'","\'",strtoupper($_POST['A7']));
    $schoolid = str_replace("'","\'",$_POST['A8']);
    $schooladdress = str_replace("'","\'",strtoupper($_POST['A9']));
    $schooltype = $_POST['A10'];
    $schooltoenroll = str_replace("'","\'",strtoupper($_POST['A11']));
    $schoolid2 = str_replace("'","\'",$_POST['A12']);
    $schooladdress2 = str_replace("'","\'",strtoupper($_POST['A13']));
    //B. STUDENT INFORMATION//
    $psa = str_replace("'","\'",strtoupper($_POST['B1']));
    $lrn = str_replace("'","\'",$_POST['B2']);
    //$photo = $_POST['photo'];
    $lname = str_replace("'","\'",strtoupper($_POST['B3']));
    $fname = str_replace("'","\'",strtoupper($_POST['B4']));
    $mname = str_replace("'","\'",strtoupper($_POST['B5']));
    $ext = str_replace("'","\'",strtoupper($_POST['B6']));
    $bday = $_POST['B7'];
    $age = str_replace("'","\'",$_POST['B8']);
    $sex = $_POST['B9'];
    $ethnic = $_POST['B10'];
    $mtounge = $_POST['B12'];
    $religion = $_POST['religion'];
    $modality = $_POST['modality'];
    $pppp = $_POST['4ps'];
    $studentType = $_POST['A00'];
    //For Learners with Special Education Needs
    $b14 = $_POST['B14'];
    $semib15=$_POST['B15'];
    $b15 = implode(',',$semib15);
    $b151 = str_replace("'","\'",strtoupper($_POST['B151']));
    $b16=$_POST['B16'];
    $b17 = str_replace("'","\'",strtoupper($_POST['B17']));
    //ADDRESS INFORMATION
    $house = str_replace("'","\'",strtoupper($_POST['street']));
    $barangay = str_replace("'","\'",strtoupper($_POST['barangay']));
    $city = str_replace("'","\'",strtoupper($_POST['municipality']));
    $province = str_replace("'","\'",strtoupper($_POST['province']));
    $region = str_replace("'","\'",strtoupper($_POST['region']));
    //C. PARENT / GUARDIAN INFORMATION 
    $father = str_replace("'","\'",strtoupper($_POST['father']));
    $mother = str_replace("'","\'",strtoupper($_POST['mother']));
    $guardian = str_replace("'","\'",strtoupper($_POST['guardian']));
    $fathereducattainment = str_replace("'","\'",strtoupper($_POST['fathereducattainment']));
    $mothereducattainment = str_replace("'","\'",strtoupper($_POST['mothereducattainment']));
    $guardianeducattainment = str_replace("'","\'",strtoupper($_POST['guardianeducattainment']));
    $fatheremployment = $_POST['fatheremployment'];
    $motheremployment = $_POST['motheremployment'];
    $guardianemployment = $_POST['guardianemployment'];
    $fatherWFH = $_POST['fatherWFH'];
    $motherWFH = $_POST['motherWFH'];
    $guardianWFH = $_POST['guardianWFH'];
    $fathercontact = str_replace("'","\'",$_POST['fathercontact']);
    $mothercontact = str_replace("'","\'",$_POST['mothercontact']);
    $guardiancontact = str_replace("'","\'",$_POST['guardiancontact']);
    $guardianrelationship = str_replace("'","\'",strtoupper($_POST['guardianrelate']));
    //D. HOUSEHOLD CAPACITY AND ACCESS TO DISTANCE LEARNING
    $semiD1=$_POST['D1'];  
    $D1 = implode(',',$semiD1);
    $semiD2=$_POST['D2'];  
    $D2 = implode(',',$semiD2);
    $semiD3=$_POST['D3'];  
    $D3 = implode(',',$semiD3);
    $semiD4=$_POST['D4'];  
    $D4 = implode(',',$semiD4);  
    $D5 = $_POST['D5'];;
    $semiD6=$_POST['D6'];  
    $D6 = implode(',',$semiD6);
    $semiD7=$_POST['D7'];  
    $D7 = implode(',',$semiD7);
    $semiD8=$_POST['D8'];  
    $D8 = implode(',',$semiD8);


    mysqli_begin_transaction($connection);

    try
    {        
    $img_name = $_FILES['photo']['name'];
    $img_size = $_FILES['photo']['size'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $error = $_FILES['photo']['error'];

    if ($error === 0) {
        if ($img_size > 5000000) {
            $_SESSION['status']= "Sorry, your file is too large.";    
            $_SESSION['status_code']= "error";
            header("Location: enroll-now.php");   
        }else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png"); 

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Update old records from database
                //updating data into student table
                $sql = "UPDATE student_tbl set psa = '$psa',lrn='$lrn',photo='$new_img_name',lastname='$lname', /* student info*/
                firstname='$fname',middlename='$mname',extension='$ext',birthday='$bday',
                age='$age',sex='$sex',ethnicgroup='$ethnic',mothertongue='$mtounge',religion='$religion',
                modality='$modality',4Ps='$pppp',studentType='$studentType',
                street='$house',barangay='$barangay',municipality='$city',province='$province',region='$region', /* address info*/
                fname='$father',feducattain='$fathereducattainment',femploystatus='$fatheremployment',/* guardian info*/
                fwfh='$fatherWFH',fcontactno='$fathercontact',mname='$mother',meducattain='$mothereducattainment',
                memploystatus='$motheremployment',mwfh='$motherWFH',mcontactno='$mothercontact',
                gname='$guardian',geducattain='$guardianeducattainment',gemploystatus='$guardianemployment',
                gwfh='$guardianWFH',gcontactno='$guardiancontact',grelationship='$guardianrelationship',
                optionlrn='$optionlrn',`returning`='$returning', /* school info*/
                gradetoenroll='$gradetoenroll',lastgradecompleted='$lastgradecompleted',lastschoolyearcompleted='$lastschoolyearcompleted',
                lastschoolattended='$lastschoolattended',schoolid='$schoolid',schooladdress='$schooladdress',
                schooltype='$schooltype',schooltoenroll='$schooltoenroll',schoolid2='$schoolid2',schooladdress2='$schooladdress2',
                spedneeds='$b14',specifyneeds='$b15',specifyneeds2='$b151',assistivetech='$b16',specifyassistivetech='$b17', /* special educ info*/
                D1='$D1',D2='$D2',D3='$D3',D4='$D4',D5='$D5',D6='$D6',D7='$D7',D8='$D8' /* household info*/
                WHERE id = '$stud_id'";

                //updating data into school table
                $sql1 = "UPDATE enrollment_tbl set status = 'renew'
                WHERE student_id = '$stud_id'";

                $sql2 = "INSERT INTO enrollment_tbl(`student_id`,`status`) 
                    VALUES
                    ('$stud_id','pending')";
  
                $query1 = mysqli_query($connection,$sql);
                $query2 = mysqli_query($connection,$sql1);
                $query3 = mysqli_query($connection,$sql2);

                if(mysqli_commit($connection)){
                    $_SESSION['status']= "Submitted Successfully, kindly wait for your text confirmation.";    
                    $_SESSION['status_code']= "success";
                    header("Location: enroll-now.php");        
                }
            }else {
                $_SESSION['status']= "You can't upload this type of file.";    
                $_SESSION['status_code']= "error";
           
            }
                }
            }else {
                $_SESSION['status']= "Unknown error occured. Try changing your photo and try again.";    
                $_SESSION['status_code']= "error";
           
            }
        }
        catch (mysqli_sql_exception $exception) 
            {
            mysqli_rollback($connection);
            throw $exception;
            echo "Error";
        } 
}    

/* ----------------------------------- Code to login usename and password --------------------------------------------- */
elseif(isset($_POST['login']))
{
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

     $username = validate($_POST['username']);
     $password = validate($_POST['password']);

     if (empty($username)){
         header("Location: login.php?error=Username is required!");
         exit();
     }
     elseif (empty($password)){
         header("Location: login.php?error=Password is required!");
         exit();
     }
     else{
        $sql = "SELECT u.username, u.password, u.image, u.role, t.name, t.gradetohandle, g.id
        FROM users u
        LEFT JOIN teacher t
        ON t.id = u.id
        LEFT JOIN gradelevel_tbl g
        ON t.gradetohandle = g.grade WHERE u.username= '".$username."' AND u.password= '".$password."' AND u.status='Active'";
        $result = mysqli_query($connection,$sql);

        if(mysqli_num_rows($result) === 1){
            $row =  mysqli_fetch_assoc($result);
            if($row['username'] === $username && $row['password'] === $password){
                $_SESSION['gradeid'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['image'] = $row['image'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['gradetohandle'] = $row['gradetohandle'];
            
                header("Location: index.php");
                exit();
            }
            else{
                $message="Invalid username or password!";
                $_SESSION['error']=$message;
                header("Location: login.php?Invalid username/password!");
                exit();
                    }
        }
        else{
            unset($_REQUEST['login']); 
            }
     }   
}

 /* ----------------------------------- Code to insert new school year --------------------------------------------- */
elseif(isset($_POST['addschoolyear']))
{
    $schoolyear = str_replace("'","\'",$_POST['SchoolYear']);
    $schoolhead = str_replace("'","\'",strtoupper($_POST['SchoolHead']));

    mysqli_begin_transaction($connection);

    try
    {
    $sql1 = "UPDATE schoolyear_tbl SET Active='No', EnrollmentStatus='Ended'";
    $query_run = mysqli_query($connection,$sql1);
  
    $sql2 = "INSERT INTO schoolyear_tbl (`SchoolYear`,`SchoolHead`,`Active`,`EnrollmentStatus`) 
    VALUES ('$schoolyear','$schoolhead','Yes','Ongoing')";
    $query_run = mysqli_query($connection,$sql2);

  /*   $query1 = mysqli_query($connection,$sql1);
    $query2 = mysqli_query($connection,$sql2); */

    if(mysqli_commit($connection))
    {   
        $_SESSION['status']= "SchoolYear added successfully.";    
        $_SESSION['status_code']= "success"; 
        header("Location: index.php?page=schoolyear");
    }
    else
    {
        $_SESSION['status']= "Failed to Add SchoolYear.";    
        $_SESSION['status_code']= "error"; 
        header("Location: index.php?page=schoolyear");
    }
    }
    catch (mysqli_sql_exception $exception) 
                {
                mysqli_rollback($connection);
                throw $exception;
                echo "ErrorW";
    
                }
}

/* ----------------------------------- Code to edit school year --------------------------------------------- */
elseif(isset($_POST['editschoolyear']))
{
    $status = $_POST['editStatus'];
    $process = $_POST['editprocess'];
    $schoolhead = str_replace("'","\'",strtoupper($_POST['editSchoolHead']));
    $id = $_POST['editschoolyearid'];

    mysqli_begin_transaction($connection);

    try
    {
        $sql1 = "UPDATE schoolyear_tbl SET Active='No', EnrollmentStatus='Ended' WHERE id != '$id'";
        $query_run = mysqli_query($connection,$sql1);
      
        $sql2 = "UPDATE schoolyear_tbl SET SchoolHead='$schoolhead', Active='$status', EnrollmentStatus='$process' WHERE id = '$id'";
        $query_run = mysqli_query($connection,$sql2);
    
        $query1 = mysqli_query($connection,$sql1);
        $query2 = mysqli_query($connection,$sql2);
    
        if(mysqli_commit($connection))
        {   
            $_SESSION['status']= "SchoolYear updated successfully.";    
            $_SESSION['status_code']= "success"; 
            header("Location: index.php?page=schoolyear");
        }
        else
        {
            $_SESSION['status']= "Failed to update SchoolYear.";    
            $_SESSION['status_code']= "error"; 
            header("Location: index.php?page=schoolyear"); 
        }
    }
    catch (mysqli_sql_exception $exception) 
                {
                mysqli_rollback($connection);
                throw $exception;
                echo "ErrorW";
    
                }
}
 
/* ----------------------------------- Code to delete school year --------------------------------------------- */
elseif(isset($_POST['deleteschoolyear']))
{
    try{
    
    $id = $_POST['deleteschoolyearid'];
    

    $query = "DELETE FROM schoolyear_tbl WHERE id ='$id'";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {   
        $_SESSION['status']= "Successfully Removed.";    
        $_SESSION['status_code']= "success"; 
        header("Location: index.php?page=settings");
    }
    else
    {
        $_SESSION['status']= "Failed to Remove data.";    
        $_SESSION['status_code']= "error"; 
        header("Location: index.php?page=settings");

    }
    }
    catch (mysqli_sql_exception $exception) 
                {
                mysqli_rollback($connection);
                throw $exception;
                echo "ErrorW";
    
                }
}

/* ----------------------------------- Code to delete section --------------------------------------------- */
elseif(isset($_POST['deleteSection']))
{
    try{
    
    $id = $_POST['removeId'];
    $total = $_POST['totalstudents'];

    if ($total > 0)
    {
        $_SESSION['status']= "Failed to remove section.";  
        $_SESSION['text']= "You cannot remove an allocated section.";  
        $_SESSION['status_code']= "error"; 
        header("Location: index.php?page=records&data=section-list");
    } 
    else
    {
        $query = "DELETE FROM section_tbl WHERE id ='$id'";
        $query_run = mysqli_query($connection,$query);
    
        if($query_run)
        {   
            $_SESSION['status']= "Successfully Removed.";    
            $_SESSION['status_code']= "success"; 
            header("Location: index.php?page=records&data=section-list");
        }
        else
        {
            $_SESSION['status']= "Failed to Remove data.";    
            $_SESSION['status_code']= "error"; 
            header("Location: index.php?page=records&data=section-list");
    
        }
    }
   
    }
    catch (mysqli_sql_exception $exception) 
                {
                mysqli_rollback($connection);
                throw $exception;
                echo "ErrorW";
    
                }
}

/* ----------------------------------- Code to delete teacher/user--------------------------------------------- */
elseif(isset($_POST['deleteteacher']))
{
    try{
    
    $id = $_POST['deleteteacherid'];

    mysqli_begin_transaction($connection);
    

     // Insert into Database
     $sql1 = "DELETE FROM teacher WHERE id = '$id'";
     $query_run = mysqli_query($connection,$sql1);

     $sql2 = "DELETE FROM users WHERE id = '$id'";
     $query_run = mysqli_query($connection,$sql2);
        
    $query1 = mysqli_query($connection,$sql1);
    $query2 = mysqli_query($connection,$sql2);

    if(mysqli_commit($connection))
    {   
        $_SESSION['status']= "Successfully Removed.";    
        $_SESSION['status_code']= "success"; 
        header("Location: index.php?page=records&data=teacher-list");
    }
    else
    {
        $_SESSION['status']= "Failed to Remove data.";    
        $_SESSION['status_code']= "error"; 
        header("Location: index.php?page=records&data=teacher-list");

    }
    }
    catch (mysqli_sql_exception $exception) 
                {
                mysqli_rollback($connection);
                throw $exception;
                echo "ErrorW";
    
                }
}

/* ----------------------------------- Code to delete student --------------------------------------------- */
elseif(isset($_POST['removeStudent']))
{
    try{
    
    $id = $_POST['removeStudentID'];
    
    mysqli_begin_transaction($connection);

    $sql = "DELETE FROM student_tbl WHERE id ='$id'";
    $sql1 = "DELETE FROM enrollment_tbl WHERE student_id ='$id'";

    $query1 = mysqli_query($connection,$sql);
    $query2 = mysqli_query($connection,$sql1);

     if(mysqli_commit($connection))
    {   
        $_SESSION['status']= "Removed Successfully.";    
        $_SESSION['status_code']= "success"; 
        header("Location: index.php?page=records&data=pending-student");
    }
    else
    {
        $_SESSION['status']= "Failed to Remove Data.";    
        $_SESSION['status_code']= "error"; 
        header("Location: index.php?page=records&data=pending-student");

    }
    }
    catch (mysqli_sql_exception $exception) 
                {
                mysqli_rollback($connection);
                throw $exception;
                echo "ErrorW";  
                }
}
/* ------------------------------------ Code to edit admin ------------------------------------------------ */
elseif(isset($_POST['editadmin']))
{
     $id = $_POST['editID'];
     $name = str_replace("'","\'",strtoupper($_POST['editname']));
     $contactno = str_replace("'","\'",$_POST['editcontact']);
     $address = str_replace("'","\'",$_POST['editaddress']);
     $username = str_replace("'","\'",$_POST['editusername']);
     $password = str_replace("'","\'",$_POST['editpassword']);

     mysqli_begin_transaction($connection);
     
     try{       
        $img_name = $_FILES['editimage']['name'];
        $img_size = $_FILES['editimage']['size'];
        $tmp_name = $_FILES['editimage']['tmp_name'];
        $error = $_FILES['editimage']['error'];
    
        if ($error === 0) {
            if ($img_size > 5000000) {
                $_SESSION['status']= "Sorry, your file is too large.";    
                $_SESSION['status_code']= "error"; 
                header("Location: index.php?page=settings");
            }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                $allowed_exs = array("jpg", "jpeg", "png"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'uploads/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
    
                    // Insert into Database
                   $sql1 = "UPDATE teacher SET 
                        name='$name', contactno='$contactno',
                        address='$address' WHERE id ='$id'";
                        $query_run = mysqli_query($connection,$sql1);

                    $sql2 = "UPDATE users SET
                        username='$username', password='$password', image='$new_img_name'
                        WHERE id ='$id'";
                        $query_run = mysqli_query($connection,$sql2);
                    
                    $query1 = mysqli_query($connection,$sql1);
                    $query2 = mysqli_query($connection,$sql2);


            if(mysqli_commit($connection)){
                $_SESSION['status']= "Admin Updated Successfully.";    
                $_SESSION['status_code']= "success";
                header("Location: index.php?page=settings");        
            }
                }else {
                    $_SESSION['status']= "You can't upload this type of file.";    
                    $_SESSION['status_code']= "error"; 
                    header("Location: index.php?page=settings");
                }
            }
        }else {
                 $_SESSION['status']= "Unknown error occured. Try changing your photo.";    
                $_SESSION['status_code']= "error"; 
                header("Location: index.php?page=settings");
        }
    }
    catch (mysqli_sql_exception $exception) 
                {
                mysqli_rollback($connection);
                throw $exception;
                echo "ErrorW";    
                }   
}

/* -----------------------------------  Code to insert new admin  --------------------------------------------- */
elseif(isset($_POST['addadmin']) && isset($_FILES['addimage']))
{
            $id = $_POST['id'];
            $name = str_replace("'","\'",strtoupper($_POST['name']));
            $contactno = str_replace("'","\'",$_POST['contact']);
            $address = str_replace("'","\'",$_POST['address']);
            $username = str_replace("'","\'",$_POST['username']);
            $password = str_replace("'","\'",$_POST['password']);
            

            mysqli_begin_transaction($connection);

    try{       
            $img_name = $_FILES['addimage']['name'];
            $img_size = $_FILES['addimage']['size'];
            $tmp_name = $_FILES['addimage']['tmp_name'];
            $error = $_FILES['addimage']['error'];
        
            if ($error === 0) {
                if ($img_size > 5000000) {
                    $_SESSION['status']= "Sorry, your file is too large.";    
                    $_SESSION['status_code']= "error"; 
                    header("Location: index.php?page=settings");
                }else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
        
                    $allowed_exs = array("jpg", "jpeg", "png"); 
        
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = 'uploads/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
        
                        // Insert into Database
                        $query1 = "INSERT INTO users (`username`,`password`,`image`,`role`) 
                        VALUES
                        ('$username','$password','$new_img_name','Admin')";

                        $query2 = "INSERT INTO teacher (`id`,`name`,`contactno`,`address`) 
                        VALUES
                        (LAST_INSERT_ID(),'$name','$contactno','$address')";
                        
                        $query1 = mysqli_query($connection,$query1);
                        $query2 = mysqli_query($connection,$query2);


                if(mysqli_commit($connection)){
                    $_SESSION['status']= "Admin Successfully Added.";    
                    $_SESSION['status_code']= "success";
                    header("Location: index.php?page=settings");        
                }
                }else {
                        $_SESSION['status']= "You can't upload this type of file.";    
                        $_SESSION['status_code']= "error"; 
                        header("Location: index.php?page=settings");
                    }
                }
                }else {
                     $_SESSION['status']= "Unknown error occured. Try changing your photo.";    
                    $_SESSION['status_code']= "error"; 
                    header("Location: index.php?page=settings");
                }
        }

        catch(mysqli_sql_exception $exception) 
        {
        mysqli_rollback($connection);
        throw $exception;
        echo "Error";   
        }
}

/* ------------------------------------ Code to decline admission ------------------------------------ */
elseif(isset($_POST['declinepending']))
{
    try{
    
        $id = $_POST['pendingId'];
        $remarks = $_POST['remarks'];
        
        mysqli_begin_transaction($connection);
    
        $sql = "UPDATE student_tbl set Remarks = '$remarks' WHERE id ='$id'";
        $sql1 = "UPDATE enrollment_tbl set status = 'Admission Declined' WHERE student_id ='$id'";
    
        $query1 = mysqli_query($connection,$sql);
        $query2 = mysqli_query($connection,$sql1);
    
         if(mysqli_commit($connection))
        {   
            $_SESSION['status']= "Admission has been declined."; 
            $_SESSION['text']= "Admission status can still be viewed.";    
            $_SESSION['status_code']= "success"; 
            header("Location: index.php?page=records&data=pending-student");
        }
        else
        {
            $_SESSION['status']= "Failed to procees data."; 
            $_SESSION['text']= "Admission status can still be viewed.";    
            $_SESSION['status_code']= "error"; 
            header("Location: index.php?page=records&data=pending-student"); 
        }
    }
    catch (mysqli_sql_exception $exception) 
        {
        mysqli_rollback($connection);
        throw $exception;
        echo "ErrorW";  
        }
}
else
{
    header("Location: login.php");
    exit();
}
?>

