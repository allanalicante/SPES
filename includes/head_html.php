<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Dashboard -   
        <?php 
            if (isset($title)) echo $title;
            else echo '';
        ?>       
    </title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/bootstrap.css">

    <link rel="stylesheet" href="asset/vendors/toastify/toastify.css">
    <link rel="stylesheet" href="asset/vendors/iconly/bold.css">
    <link rel="stylesheet" href="asset/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="asset/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="asset/css/app.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    


    <?php
     if(isset($data)){
        switch($data){
            case 'admission-list':
            case 'student-list':
            case 'section-list':
            case 'teacher-list':
            case 'pending-student':
                echo '<link rel="stylesheet" href="asset/vendors/simple-datatables/style.css">'; 

                echo '<link rel="stylesheet" href="asset/vendors/toastify/toastify.css">';     
                echo '<link rel="stylesheet" href="asset/css/bootstrap.css">';     
                echo '<link rel="stylesheet" href="asset/css/app.css">';       
                echo '<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">';       
            break;
            }
     }
    ?>
    <link rel="stylesheet" href="asset/vendors/perfect-scrollbar/perfect-scrollbar.css">

    <link rel="stylesheet" href="asset/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="asset/css/app.css">
    <link rel="shortcut icon" href="asset/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    
</head>
<body>