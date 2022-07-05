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
    <link href="asset/images/speslogo.png" rel="icon" type="image/png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="asset/css/fonts.googleapis.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/bootstrap.css">

    <link rel="stylesheet" href="asset/vendors/iconly/bold.css">
    <link rel="stylesheet" href="asset/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="asset/css/app.css">
    <link rel="stylesheet" href="asset/css/dataTables.bootstrap4.min.css">
    
    <?php
     if(isset($data)){
        switch($data){
            case 'admission-list':
            case 'student-list':
            case 'section-list':
            case 'teacher-list':
            case 'pending-student':
                echo '<link rel="stylesheet" href="asset/vendors/simple-datatables/style.css">';  
                echo '<link rel="stylesheet" href="asset/css/bootstrap.css">';     
                echo '<link rel="stylesheet" href="asset/css/app.css">';       
                echo '<link rel="stylesheet" href="asset/css/dataTables.bootstrap4.min.css">';
                echo '<link rel="stylesheet" href="asset/css/pages/pdfexport/twitter.bootstrap4-4.5.2.css">';
                echo '<link rel="stylesheet" href="asset/css/pages/pdfexport/dataTables.bootstrap4.min.css">';
                echo '<link rel="stylesheet" href="asset/css/pages/pdfexport/buttons.bootstrap4.min.css">';
            break;
            }
     }
    ?>
    <link rel="stylesheet" href="asset/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="asset/css/app.css">
    <link rel="stylesheet" href="asset/css/dataTables.bootstrap4.min.css">
    <!-- css for file export -->
    <link rel="stylesheet" href="asset/css/pages/pdfexport/twitter.bootstrap4-4.5.2.css">
    <link rel="stylesheet" href="asset/css/pages/pdfexport/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="asset/css/pages/pdfexport/buttons.bootstrap4.min.css">
    
</head>
<body>
   