<?php
  session_start();
  include('connect.php');
 

  if(isset($_REQUEST['login'])){
  
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

      $sql = "SELECT u.id AS `userid`, u.username, u.password, u.image, u.role, t.name, t.gradetohandle, g.id
      FROM users u
      LEFT JOIN teacher t
      ON t.id = u.id
      LEFT JOIN gradelevel_tbl g
      ON t.gradetohandle = g.grade WHERE u.username= '".$username."' AND u.password= '".$password."' AND u.status='Active'";
      $result = mysqli_query($connection,$sql);

      if(mysqli_num_rows($result) == 1){
          $row =  mysqli_fetch_assoc($result);
     
              $_SESSION['gradeid'] = $row['id'];
              $_SESSION['username'] = $row['username'];
              $_SESSION['name'] = $row['name'];
              $_SESSION['image'] = $row['image'];
              $_SESSION['role'] = $row['role'];
              $_SESSION['gradetohandle'] = $row['gradetohandle'];
              $_SESSION['userid'] = $row['userid'];
          
              header("Location: index.php");
              exit();
      }
          else{
              $message="Invalid username or passwordd!";
              $_SESSION['error']=$message;
              header("Location: login.php?Invalid username/password!");
              exit();
                  }
      }
      else{
          unset($_REQUEST['login']); 
          }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPES - Login Page</title>
    <link href="asset/css/fonts.googleapis.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <link rel="stylesheet" href="asset/css/app.css">
    <link rel="stylesheet" href="asset/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="asset/css/pages/auth.css">
    
</head>
<body>

    <div class="login" id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12 col-sm-12 main">
                <div  id="auth-left">
                    <div class="auth-logo">
                        <a href=""><img src="asset/images/speslogo.png" alt="logo"></a>
                    </div>
                    <h2 class="auth-title text-center">User Login</h2>
                    <p class="auth-subtitle mb-5 text-center">Log in with your username and password</p>

                    <div class="card logbrand col-md-12 col-sm-12">
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
                        </form>
                        </div>
                    </div>
                    <div class="register" style="text-align: center">
                            <br>
                             <p style="font-size: 20px">Proceed To <a href="enroll-now-bikol.php">Admission Page</a></p>                         
                            </div>  
                   <!-- 
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="auth-register.html"
                                class="font-bold">Sign
                                up</a>.</p>
                        <p><a class="font-bold" href="table-datatable.php">Forgot password?</a>.</p>
                    </div> -->
                </div>
            </div>
                <div class="col-lg-7 d-none d-lg-block main">
                    <div id="auth-right">
                        <div class="school-bg">
                            <img src="asset/images/newspesbg.jpg" alt="school">
                        </div>
                    </div>
                </div>

        </div>
    </div>
    <script src="asset/js/extensions/jquery-3.5.1.slim.min.js"></script>
    <script src="asset/js/extensions/bootstrap.bundle.min.js"></script>

                            </body>
                          </html>
    

 

