<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'spes_db');

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
       
    }
    else
    {
        echo "Data not Saved" . $query . mysqli_error($connection);
    }
}

?>