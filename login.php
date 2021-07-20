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
                    <h2 class="auth-title">Log in.</h2>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                    <div class="card col-md-12">
                        <div class="card-body">
                        <form action="index.php" method="post">
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
                            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Log in</button>
                            <div class="register" style="text-align: center">
                            <br>
                             <p>Not yet enrolled?<a href=""> Enroll now</a></p> 
                            </div>
                            
                            </form>
                        </div>
                    </div>
                   
                   <!--  <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="auth-register.html"
                                class="font-bold">Sign
                                up</a>.</p>
                        <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
                    </div> -->
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
    
</body>
</html>

