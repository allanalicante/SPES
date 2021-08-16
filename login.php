<?php
  session_start();
  include('asset/database/MysqliDB.php');

  if(isset($_REQUEST['login'])){
    $db = new MysqliDb ('localhost', 'root', '', 'spes_db');
    //$users = $db->get('users');
     $username = ($_REQUEST['username']);
     $password = ($_REQUEST['password']);
    if (empty($username)){
      $message="Username is required!";
      $_SESSION['error']=$message;
      header("Location: login.php?Username is required!");
      exit();
    }
   elseif (empty($password)){
    $message="Password is required!";
    $_SESSION['error']=$message;
    header("Location: login.php?Password is required!");
    exit();
      }
    $user = $db->rawQueryOne('SELECT * from users where username=? AND password=?', Array($_REQUEST['username'], $_REQUEST['password']));
    if($user != Null){
      $_SESSION["ADMIN"] = $user['username'];
      $_SESSION['name'] = $user['name'];
      header('location: index.php');
    }else{
        $message="Invalid username or password!";
        $_SESSION['error']=$message;
        header("Location: login.php?Invalid username/password!");
        exit();
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPES - Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <link rel="stylesheet" href="asset/css/app.css">
    <link rel="stylesheet" href="asset/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="asset/css/pages/auth.css">
    
</head>
<body>

    <div class="login" id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12 main">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href=""><img src="asset/images/speslogo.png" alt="logo"></a>
                    </div>
                    <h2 class="auth-title">User Login</h2>
                    <p class="auth-subtitle mb-5">Log in with your username and password</p>

                    <div class="card col-md-12">
                        <div class="card-body">
                          <?php

                            if(isset($_SESSION['error'])){ 
                          ?>
                           <div class="alert alert-danger alert-dismissible show fade" role="alert">
                            <strong>Error! </strong><?php echo $_SESSION['error']?>  
                              <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">  
                              </button>
                            </div>
                          <?php     
                          unset($_SESSION['error']); 
                            }

                          ?>
                        <form method="post">
                            <!--  ------------------------------------------------------------------------------>
                            
                            <!--  --------------------------------------------------------------------------------->

                            
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text" name="username" id="username" class="form-control form-control-xl" placeholder="Username">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>

                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="password" name="password" id="password" class="form-control form-control-xl" placeholder="Password">
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                            </div>
                            <button type="submit" name="login" class="btn btn-login btn-primary btn-block btn-lg shadow-lg mt-2">Log in</button>
                           
                            <div class="register" style="text-align: center">
                            <br>
                             <p>Not yet enrolled?<a href="enroll-now.php"> Enroll now</a></p> 
                            </div>   
                        </form>
                        </div>
                    </div>
                   
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="auth-register.html"
                                class="font-bold">Sign
                                up</a>.</p>
                        <p><a class="font-bold" href="table-datatable.php">Forgot password?</a>.</p>
                    </div>
                </div>
            </div>
                <div class="col-lg-7 d-none d-lg-block main">
                    <div id="auth-right">
                        <div class="school-bg">
                            <img src="asset/images/newpilotlogo.jpg" alt="school">
                        </div>
                    </div>
                </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

                            </body>
                          </html>
    

 

