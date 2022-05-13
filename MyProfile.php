<script src="asset/js/pdfexport/jquery-3.5.1.js"></script>
<?php
    if(!isset($_SESSION['role']))
{
    header('location:login.php');
    exit();
} 

$userid = $_SESSION['userid'];

//Getting user basic information
$sql="SELECT u.id, u.username, u.password, u.image, u.role, t.name, t.`contactno`, t.`address`, t.`gradetohandle`
FROM users u
INNER JOIN teacher t
ON u.id = t.id where u.id = '$userid'";
$result = mysqli_query($connection,$sql);

while ($row = mysqli_fetch_array($result)) { 
  $id = $row['id'];   $username = $row['username'];    $password = $row['password'];
  $image = $row['image'];    $role = $row['role'];    $name = $row['name'];
  $contactno = $row['contactno'];    $address = $row['address'];    $gradetohandle = $row['gradetohandle'];
}

//Getting user total student and class
$sql2 = "SELECT ( SELECT COUNT(*) AS `TotalPupils`
                    FROM student_tbl s 
                    INNER JOIN enrollment_tbl e 
                    ON s.id = e.student_id
                    INNER JOIN section_tbl se
                    ON e.`section_id` = se.`id` 
                    INNER JOIN teacher t
                    ON se.`teacher_id` = t.`id`
                    WHERE e.`status` = 'enrolled'
                    AND t.id = '$userid') AS `TotalPupils`,
                ( SELECT COUNT(*) FROM section_tbl  WHERE teacher_id = '$userid') AS `TotalClass`";
                    $result = mysqli_query($connection,$sql2);
              
      while ($row = mysqli_fetch_array($result)) { 
            $totalstudents = $row['TotalPupils'];
            $totalclass = $row['TotalClass'];
          }

?>





<div class="page-heading"> <!--------------------------------- Profile Statistic Heading -------------------------->
            <h3>MY PROFILE</h3>   
            <hr>
</div>

<section class="section row">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card logbrand">
                    <div class="card-body pt-2 pb-1" style="background-color: #ff8080" >
                        <div class="row">
                            <div class="image-holder text-center mt-4">
                            <img style="width: 150px;height:150px;object-fit: cover; border-radius: 50%; border: 2px white solid" 
                                            src="uploads/<?php echo $image?>"/>
                            </div>
                            <div class="name-holder text-center mt-3">
                                <h5 style="font-size:20px; font-weight: 600; color: white"><?php echo $name?></h5>
                                <h6 style="font-size:15; font-weight: 600; color: white"><?php echo $role?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-12 col-md 12">
                            <div class="row">
                                <div class="col-6 text-center">
                                    <h6>TOTAL STUDENTS</h6>
                                    <br>
                                    <h2><?php echo $totalstudents ?></h2>
                                </div>
                                <div class="col-6 text-center">
                                    <h6>TOTAL CLASSES</h6>
                                    <br>
                                    <h2><?php echo $totalclass ?></h2>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="card logbrand">
                    <div class="card-body">
                        <form action="MyCrud.php" method="POST" enctype="multipart/form-data">
                            <div class="form form-vertical">
                                <div class="form-body ">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control" style="background-image: none;" id="updatename" name="updatename" required value="<?php echo $name?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group autocomplete">
                                                <label>Address</label>
                                                <input type="text" class="form-control" id="updateaddress" name="updateaddress" required value="<?php echo $address?>">                                                                
                                            </div>            
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label for="name-text" class="col-form-label">Contact No.</label>
                                                <input type="text" class="form-control" name="updatecontactno" id="updatecontactno" required value="<?php echo $contactno?>">
                                            </div>  
                                            <div class="col-lg-6 col-md-6">
                                                <label for="name-text" class="col-form-label">Select Photo</label>
                                                <input type="file" class="form-control" name="photo" id="photo" required>
                                            </div>                                      
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="name-text" class="col-form-label">Username</label>
                                                <input type="text" class="form-control checkusername" name="updateusername" id="updateusername" required value="<?php echo $username?>">
                                                <p class="feedback" style="font-size: .875em; color: #dc3545; margin-top: .25rem"></p>
                                            </div>  
                                            <div class="col-md-6">
                                                <label for="name-text" class="col-form-label">Password</label>
                                                <input type="password" class="form-control input-field mb-2" name="updatepassword" id="updatepassword" required value="<?php echo $password?>">
                                                <span style="padding-top:4px"><i class="bi bi-eye-slash" id="togglePassword"></i></span>
                                            </div>                                      
                                        </div>
                                            <input type="hidden" readonly class="form-control" name="updateid" id="updateid" value="<?php echo $userid?>">
                                        <div class="col-12 d-flex justify-content-start reset-btn mt-3">  
                                            <button type="submit" name="updateselfteacher" class="btn btn-success">Save Profile</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Script for checking lrn if already existing -->
<script>
    $(document).ready(function(){
        $('.checkusername').focusout(function (e){
            var username = $('.checkusername').val();
            $.ajax({
                type:"POST",
                url: "getlevel.php",
                data: {checkusername:username},
                success: function (response){
              
                    if (response.indexOf("Sorry, Username is already in used.") > -1) 
                    {
                       $('.feedback').text(response);
                       $('.checkusername').val('');
                    }
                    else
                    {
                        $('.feedback').text(response);
                    }
                }
            })
        })
    })
</script>

<!-- Script for toggle show/hide password -->
<script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#updatepassword");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });
</script>


