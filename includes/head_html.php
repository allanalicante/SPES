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
    <link rel="stylesheet" href="asset/vendors/sweetalert2/sweetalert2.min.css">

    <link rel="stylesheet" href="asset/vendors/iconly/bold.css">

    <?php
    if(isset($data) && ($data == 'admission-list')){
    ?>
        <link rel="stylesheet" href="asset/vendors/simple-datatables/style.css">
    <?php
    } 
    elseif(isset($data) && ($data == 'student-list')){
    ?>
        <link rel="stylesheet" href="asset/vendors/simple-datatables/style.css">
    <?php
    } 
    elseif(isset($data) && ($data == 'section-list')){
        ?>
            <link rel="stylesheet" href="asset/vendors/simple-datatables/style.css">
        <?php
     }
    elseif(isset($data) && ($data == 'teacher-list')){
    ?>
        <link rel="stylesheet" href="asset/vendors/simple-datatables/style.css">
    <?php
        } 
   




    ?>
    <link rel="stylesheet" href="asset/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="asset/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="asset/css/app.css">
    <link rel="shortcut icon" href="asset/images/favicon.svg" type="image/x-icon">
</head>
<body>