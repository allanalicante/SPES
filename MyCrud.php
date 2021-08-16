<?php
session_start();


$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'spes_db');

/* ----------------------------------- Code to insert new level and section --------------------------------------------- */
if(isset($_POST['insertdata']))
{
    $level = $_POST['level'];
    $section = $_POST['section'];
    $advisory = $_POST['advisory'];

    $query = "INSERT INTO levelsection (`level`,`section`,`advisory`) VALUES ('$level','$section','$advisory')";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {   
        header("Location: http://localhost/SPES/index.php?page=records&data=section-list");
        $message="Data added successfully!";
        $_SESSION['addsuccess']=$message;    
        exit();     
    }
    else
    {
        echo "Data not Saved" . $query . mysqli_error($connection);
    }
}
/* ----------------------------------- / Code to insert new level and section /--------------------------------------------- */

elseif(isset($_POST['updatedata']))
 {
     $id = $_POST['update_id'];
     $level = $_POST['editlevel'];
     $section = $_POST['editsection'];
     $advisory = $_POST['editadvisory'];
 
     $query = "UPDATE levelsection SET level='$level',section='$section',advisory='$advisory' WHERE id='$id' ";
     $query_run = mysqli_query($connection,$query);
 
     if($query_run)
     {   
         header("Location: http://localhost/SPES/index.php?page=records&data=section-list");    
     }
     else
     {
         echo "Data not Saved" . $query . mysqli_error($connection);
     }
 } 



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