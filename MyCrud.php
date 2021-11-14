<?php
session_start();


$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'spes_db');

/* ----------------------------------- Code to insert new level and section --------------------------------------------- */
if(isset($_POST['insertsection']))
{
    $level = $_POST['level'];
    $section = $_POST['section'];

    $query = "INSERT INTO levelsection (`level`,`section`) VALUES ('$level','$section')";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {   
        header("Location: http://localhost/SPES/index.php?page=records&data=section-list");
        $message="Data added successfully!";
        $_SESSION['addsectionsuccess']=$message;    
        exit();     
    }
    else
    {
        header("Location: http://localhost/SPES/index.php?page=records&data=section-list");
        $message="Data failed to add!" . $query . mysqli_error($connection);
        $_SESSION['addsectionerror']=$message;    
        exit(); 
    }
}
/* ----------------------------------- / Code to insert new level and section /--------------------------------------------- */

/* -----------------------------------  Code to update level and section --------------------------------------------- */
elseif(isset($_POST['updatesection']))
 {
     $id = $_POST['update_id'];
     $level = $_POST['editlevel'];
     $section = $_POST['editsection'];
 
     $query = "UPDATE levelsection SET level='$level',section='$section' WHERE id='$id' ";
     $query_run = mysqli_query($connection,$query);
 
     if($query_run)
     {   
         header("Location: http://localhost/SPES/index.php?page=records&data=section-list");   
         $message="Data updated are successfully!";
        $_SESSION['updatesectionsuccess']=$message;    
        exit();     
     }
     else
     {
        header("Location: http://localhost/SPES/index.php?page=records&data=section-list");
        $message="Data failed to add!" . $query . mysqli_error($connection);
        $_SESSION['updatesectionerror']=$message;    
        exit(); 
     }
 } 

/* ----------------------------------- / Code to update level and section / --------------------------------------------- */

/* -----------------------------------  Code to insert new teacher  --------------------------------------------- */
elseif(isset($_POST['insertteacher']))
{
    $id = $_POST['teacher_id'];
    $name = $_POST['name'];
    $contactno = $_POST['contactno'];
    $address = $_POST['address'];
    $levelsectionid = $_POST['level_section_id'];
    $position = $_POST['position'];
    

    $query = "INSERT INTO teacher (`name`,`level_section_id`,`contactno`,`address`,`position`) 
    VALUES
    ('$name','$levelsectionid','$contactno','$address','$position')";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {   
        header("Location: http://localhost/SPES/index.php?page=records&data=teacher-list");
        $message="Data added successfully!";
        $_SESSION['addteachersuccess']=$message;    
        exit();
    }
    else
    {
        header("Location: http://localhost/SPES/index.php?page=records&data=teacher-list");
        $message="Data failed to add!" . $query . mysqli_error($connection);
        $_SESSION['addteachererror']=$message;    
        exit(); 
    }
}
/* -----------------------------------/  Code to insert new teacher /--------------------------------------------- */

/* -----------------------------------  Code to update teacher --------------------------------------------- */

elseif(isset($_POST['updateteacher']))
 {
     $id = $_POST['updateid'];
     $name = $_POST['updatename'];
     $levelsectionid = $_POST['updatelevel_section_id'];
     $contactno = $_POST['updatecontactno'];
     $address = $_POST['updateaddress'];
     $position = $_POST['updateposition'];
     $currentid = $_POST['currentid'];

 
     $query1 = "UPDATE teacher SET 
     name='$name',level_section_id='$levelsectionid', 
     contactno='$contactno',
     address='$address', position='$position'
     WHERE teacher_id ='$id'";
     $query_run = mysqli_query($connection,$query1);

    $query2 = "UPDATE student_tbl SET
    level_section_id='$levelsectionid'
    where level_section_id='$currentid'";
    $query_run = mysqli_query($connection,$query2);
 
     if($query_run)
     {   
         header("Location: http://localhost/SPES/index.php?page=records&data=teacher-list");    
         $message="Data updated successfully!";
         $_SESSION['updateteachersuccess']=$message;    
         exit();     
     }
     else
     {
         header("Location: http://localhost/SPES/index.php?page=records&data=teacher-list");
         $message="Data failed to update!" . $query . mysqli_error($connection);
         $_SESSION['updateteachererror']=$message;    
         exit(); 
     }
 } 

 /* ----------------------------------- / Code to update teacher / --------------------------------------------- */


/* -----------------------------------  Code to update student --------------------------------------------- */

elseif(isset($_POST['updatestudent']))
 {
     $id = $_POST['editstud_id'];
     $levelsectionid = $_POST['editlevelsectionid1'];
     $lrn = $_POST['lrn'];

     $query = "UPDATE student_tbl SET
     level_section_id='$levelsectionid',
     status='enrolled'
     WHERE stud_id ='$id'";
     $query_run = mysqli_query($connection,$query);
 
     if($query_run)
     {   
         header("Location: http://localhost/SPES/index.php?page=records&data=admission-list");    
         $message="Student successfully updated!";
         $_SESSION['updatestudentsuccess']=$message;    
         exit();     
     }
     else
     {
         echo "Data not Saved" . $query . mysqli_error($connection);
     }
 } 


/* ----------------------------------- / Code to update student / --------------------------------------------- */
/* -----------------------------------  Code to update student --------------------------------------------- */

elseif(isset($_POST['updatepending']))
 {
     $id = $_POST['editstud_id'];
     $levelsectionid = $_POST['editlevelsectionid'];
     $lrn = $_POST['pendinglrn'];

     $query = "UPDATE student_tbl SET
     level_section_id='$levelsectionid',
     status='enrolled'
     WHERE lrn ='$lrn'";
     $query_run = mysqli_query($connection,$query);
 
     if($query_run)
     {   
         header("Location: http://localhost/SPES/index.php?page=records&data=pending-student");    
         $message="Student successfully enrolled!";
         $_SESSION['enrolled']=$message;    
         exit();     
     }
     else
     {
         echo "Data not Saved" . $query . mysqli_error($connection);
     }
 } 
/* ----------------------------------- / Code to update student / --------------------------------------------- */
/* -----------------------------------  Code to admit new student  --------------------------------------------- */
elseif(isset($_POST['admitstudent']))
{
    //A. GRADE LEVEL AND SCHOOL INFORMATION//
    $schoolyear = $_POST['A1'];
    $optionlrn = $_POST['A2'];
    $returning = $_POST['A3'];
    $gradetoenroll = $_POST['A4'];
    $lastgradecompleted = $_POST['A5'];
    $lastschoolyearcompleted = $_POST['A6'];
    $lastschoolattended = $_POST['A7'];
    $schoolid = $_POST['A8'];
    $schooladdress = $_POST['A9'];
    $schooltype = $_POST['A10'];
    $schooltoenroll = $_POST['A11'];
    $schoolid2 = $_POST['A12'];
    $schooladdress2 = $_POST['A13'];
    //B. STUDENT INFORMATION//
    $psa = $_POST['B1'];
    $lrn = $_POST['B2'];
    //$photo = $_POST['photo'];
    $lname = $_POST['B3'];
    $fname = $_POST['B4'];
    $mname = $_POST['B5'];
    $ext = $_POST['B6'];
    $bday = $_POST['B7'];
    $age = $_POST['B8'];
    $sex = $_POST['B9'];
    $ethnic = $_POST['B10'];
    $mtounge = $_POST['B12'];
    $religion = $_POST['religion'];

    $sql = "INSERT INTO school_info (`schoolyear`,`optionlrn`,`returning`,`gradetoenroll`,`lastgradecompleted`,
    `lastschoolyearcompleted`,`lastschoolattended`,`schoolid`,`schooladdress`,`schooltype`,`schooltoenroll`,`schoolid2`,`schooladdress2`) 
    VALUES
    ('$schoolyear','$optionlrn','$returning','$gradetoenroll','$lastgradecompleted',
    '$lastschoolyearcompleted','$lastschoolattended','$schoolid','$schooladdress',
    '$schooltype','$schooltoenroll','$schoolid2','$schooladdress2');";


    $sql .= "INSERT INTO student_tbl (`psa`,`lrn`,`lastname`,`firstname`,`middlename`,`extension`,`birthday`,`age`,
    `sex`,`ethnicgroup`,`mothertongue`,`religion`,`status`)
    values
    ('$psa','$lrn','$lname','$fname','$mname','$ext','$bday','$age','$sex','$ethnic','$mtounge','$religion','pending');";


    if(mysqli_multi_query($connection,$sql))
    {   
        $message= "Student successfully admitted, Please wait for a text confirmation.";
        $_SESSION['admitStudentsuccess']=$message;    
        header("Location: login.php?success=student admitted!");    
        exit();     
    }
    else
    {
        $message = "Error: " . $sql . "<br>" . mysqli_error($connection);
        $_SESSION['admitStudentError']=$message;    
        header("Location: login.php?error=failed to admit student!");    
        exit(); 
    }
}
/* -----------------------------------/ Code to admit new student/--------------------------------------------- */



















/* ----------------------------------- Code to login usename and password --------------------------------------------- */

 elseif(isset($_POST['username']) && isset($_POST['password'])){

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
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($connection,$sql);

        if(mysqli_num_rows($result) === 1){
            $row =  mysqli_fetch_assoc($result);
            if($row['username'] === $username && $row['password'] === $password){
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: index.php");
                exit();
            }
            else{
                header("Location: login.php?error=Incorrect username or password!");
                exit();
            }
        }
        else{
            header("Location: login.php?error=Incorrect username or password!");
            exit();
        }
     }
 }
 


 /* -----------------------------------/ Code to login usename and password /--------------------------------------------- */

 



 else{
    header("Location: login.php");
    exit();
}

?>