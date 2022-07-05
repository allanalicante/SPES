<?php
if (!isset($_SESSION["role"])){
    header('location: login.php');
    exit();
}

$enrollmentstatus = false;
$thisquery = "SELECT * FROM schoolyear_tbl
              WHERE Active = 'Yes'";
              $result = mysqli_query($connection,$thisquery);
              while ($row = mysqli_fetch_array($result)) { 
                $status = $row['EnrollmentStatus'];
              }
              if ($status == "Ongoing")
              {
                $enrollmentstatus = true;
              }
              else 
              {
                $enrollmentstatus = false;
              }          
?>
<link href="asset/css/bootstrap.min.css" rel="stylesheet" >
<link href="asset/css/autocomplete.css" rel="stylesheet">
<script src="asset/js/pdfexport/jquery-3.5.1.js"></script>
<script src="asset/js/autocomplete.js"></script>
<script src="asset/js/bootstrap.min.js"></script>


<!-- Script to hide combobox and divs -->
<script>
          $(document).ready(function () 
          {
            $('.myDiv').hide();    // just add this
            $('.searchdiv').hide();    // just add this
            $('.type').hide();    // just add this
            $('#readmit').hide();
            $('.spedlink').hide();     
            $('#review').hide();     
            $('#btnprint').prop('disabled', true);
            $('#readmit').prop('disabled', true);
            $('#admit').prop('disabled', true);
            $('.B151').hide();
            $('.B16').prop('selectedIndex',0);
            $('#Bb17').hide();    
               
          });
</script>


<!-- Disable input fields script in sped area-->
<script>
    window.special = function () {
    var b15 = document.getElementsByClassName("spedlink");

    console.log(document.getElementById("B14").value);
    if (document.getElementById("B14").value == "No") {
        $('.spedlink').hide();
        $('.B151').hide();
    } else if (document.getElementById("B14").value == "Yes") {
        $('.spedlink').show();
    }
    else {
        $('.spedlink').hide();
    }
    return true;
    }
    window.special2 = function () {
    var b17 = document.getElementsByClassName("Bb17");

    console.log(document.getElementById("B16").value);
    if (document.getElementById("B16").value == "No") {
        $('.Bb17').hide();
    } else if (document.getElementById("B16").value == "Yes") {
        $('.Bb17').show();
    }
    else {
        $('.Bb17').hide();
    }
    return true;
    }
    window.assistive = function () {
        console.log(document.getElementById("B16").value);
        if (document.getElementById("B16").value == "No") {
            document.getElementById("B17").readOnly = true;
        } else {
            document.getElementById("B17").readOnly = "";
        }
        return true;
    }   
    window.myLrn = function () {       
            console.log(document.getElementById("A2").value);
            if (document.getElementById("A2").checked == true) {
                document.getElementById("B2").readOnly = true;
            } else {
                document.getElementById("B2").readOnly = "";  
            }
            return true;
        } 
</script>
<!-- Script for age calculator / display form / verify student type dropdown list --> 
<script>
    // Script for calculating age based from date input 
    function ageCalculator(){
        var userinput = document.getElementById("B7").value;
        var dob = new Date(userinput);
        if(userinput==null || userinput=='') {
        document.getElementById("message").innerHTML = "**Choose a date please!";  
        return false; 
        } else {
        
        //calculate month difference from current date in time
        var month_diff = Date.now() - dob.getTime();
        
        //convert the calculated difference in date format
        var age_dt = new Date(month_diff); 
        
        //extract year from date    
        var year = age_dt.getUTCFullYear();
        
        //now calculate the age of the user
        var age = Math.abs(year - 1970);
        
        //display the calculated age
        return document.getElementById("B8").value = age;
        }
    }   
    function displayform(){
        var selectgrade = document.getElementById("A0").value;
        var  x = document.getElementsByClassName("myDiv");
        var  y = document.querySelector('.searchdiv');
        var  z = document.querySelector('.type');
        for (var i = 0, len = x.length; i < len; i++) {
            if(selectgrade == 2){                  
                document.getElementById("A4").selectedIndex = 2; 
                document.querySelector("#A5").readOnly = true;
                document.getElementById("A5").value = "Kinder";       
                document.getElementById("A6").readOnly = "";
                document.getElementById("A7").readOnly = "";
                document.getElementById("A8").readOnly = "";
                document.getElementById("A9").readOnly = "";  
                x[i].style.display = "none";
                y.style.display = "none";
                z.style.display = "block";
                $("#A00 option[value='Regular']").hide(); 
                document.querySelector('.type').value="";
            }
            else if(selectgrade == 1){
                document.getElementById("A3").selectedIndex = 2; 
                document.getElementById("A10").selectedIndex = 1; 
                document.getElementById("A4").selectedIndex = 1;
                document.querySelector('.noLrn').checked = true;
                document.getElementById("B2").readOnly = true;
                document.querySelector('.type').value="New";
                document.querySelector("#A5").value = "";
                document.getElementById("A5").readOnly = true;
                document.getElementById("A6").readOnly = true;
                document.getElementById("A7").readOnly = true;
                document.getElementById("A8").readOnly = true;
                document.getElementById("A9").readOnly = true;
                x[i].style.display = "block";
                y.style.display = "none";
                z.style.display = "none";   
                
                $('#readmit').hide(); 
                $('#admit').show(); 
            }
            else if (selectgrade == 3){ 
                document.getElementById("A4").selectedIndex = 3; 
                document.getElementById("A5").value = "Grade 1";       
                document.getElementById("A6").readOnly = "";
                document.getElementById("A7").readOnly = "";
                document.getElementById("A8").readOnly = "";
                document.getElementById("A9").readOnly = "";
                x[i].style.display = "none";
                y.style.display = "none";
                z.style.display = "block";
                $("#A00 option[value='Regular']").show(); 
                document.querySelector('.type').value="";
            }
            else if (selectgrade == 4){
                document.getElementById("A4").selectedIndex = 4;
                document.querySelector("#A5").readOnly = true;
                document.getElementById("A5").value = "Grade 2";       
                document.getElementById("A6").readOnly = "";
                document.getElementById("A7").readOnly = "";
                document.getElementById("A8").readOnly = "";
                document.getElementById("A9").readOnly = "";
                x[i].style.display = "none";
                y.style.display = "none";
                z.style.display = "block";
                document.querySelector('.type').value="";
                $("#A00 option[value='Regular']").show(); 
            }
            else if (selectgrade == 5){
                document.getElementById("A4").selectedIndex = 5;
                document.querySelector("#A5").readOnly = true;
                document.getElementById("A5").value = "Grade 3";       
                document.getElementById("A6").readOnly = "";
                document.getElementById("A7").readOnly = "";
                document.getElementById("A8").readOnly = "";
                document.getElementById("A9").readOnly = "";
                x[i].style.display = "none";
                y.style.display = "none";
                z.style.display = "block";
                document.querySelector('.type').value="";
                $("#A00 option[value='Regular']").show(); 
            }
            else if (selectgrade == 6){
                document.getElementById("A4").selectedIndex = 6;
                document.querySelector("#A5").readOnly = true;
                document.getElementById("A5").value = "Grade 4";       
                document.getElementById("A6").readOnly = "";
                document.getElementById("A7").readOnly = "";
                document.getElementById("A8").readOnly = "";
                document.getElementById("A9").readOnly = "";
                x[i].style.display = "none";
                y.style.display = "none";
                z.style.display = "block";
                document.querySelector('.type').value="";
                $("#A00 option[value='Regular']").show(); 
            }
            else if (selectgrade == 7){
                document.getElementById("A4").selectedIndex = 7;
                document.querySelector("#A5").readOnly = true;
                document.getElementById("A5").value = "Grade 5";       
                document.getElementById("A6").readOnly = "";
                document.getElementById("A7").readOnly = "";
                document.getElementById("A8").readOnly = "";
                document.getElementById("A9").readOnly = "";
                x[i].style.display = "none";
                y.style.display = "none";
                z.style.display = "block";
                document.querySelector('.type').value="";
                $("#A00 option[value='Regular']").show(); 
            }
            else{
                x[i].style.display = "none";
                y.style.display = "none";
                z.style.display = "block";
            }
        }
    }
    function verifyType(){

        var selectType = document.getElementById("A00").value;
        var  x = document.getElementsByClassName("myDiv");
        var  y = document.querySelector('.searchdiv');

        for (var i = 0, len = x.length; i < len; i++) {
            if(selectType == "Transferee"){             
                x[i].style.display = "block";
                y.style.display = "block";            
                $('#readmit').hide(); 
                $('#admit').show();  
            }
            else if(selectType == "New Enrollee"){             
                x[i].style.display = "block";
                y.style.display = "block";
                $('#readmit').hide(); 
                $('#admit').show();  
            }
            else if(selectType == "Regular"){
                x[i].style.display = "none";
                y.style.display = "block";
                $('#readmit').show(); 
                $('#admit').hide();

            }
        }
    }
    function resetStudentTypeSelection(){
        $('#A00').prop('selectedIndex',0);
    }
</script>

<script>
    function enablefirst()
    {
        var check = document.getElementById("check");
        /* var admit = document.getElementById("admit");
        var readmit = document.getElementById("readmit"); */

        if(check.checked){
            /* $('#submitforadmission').prop('disabled', false); */
            $('#review').show();
        }
        else {
           /*  $('#submitforadmission').prop('disabled', true); */
           $('#review').hide();
        }
    }
    function enable()
    {
        var check2 = document.getElementById("check2");
        /* var admit = document.getElementById("admit");
        var readmit = document.getElementById("readmit"); */

        if(check2.checked){
            /* $('#submitforadmission').prop('disabled', false); */
            $('#admit').prop('disabled', false);
            $('#readmit').prop('disabled', false);
            $('#btnprint').prop('disabled', false);
        }
        else {
           /*  $('#submitforadmission').prop('disabled', true); */
            $('#admit').prop('disabled', true);
            $('#readmit').prop('disabled', true);
            $('#btnprint').prop('disabled', true);
            
        }
    }
    function thisenable()
    {
        if ($('.checkothers').is(':checked')) {
	    // this checkbox is checked
        $('.B151').show();  
        }
        else{
            $('.B151').hide();   
        }
    }     
</script>

<!-- Display sweetalert notifications script  -->
<script src="asset/js/extensions/sweetalert.min.js"></script>
<?php
     if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
?>   
        <!-- script for displaying sweetalert -->   
<script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Continue",
            });
</script>


<?php
   unset($_SESSION['status']);
   }
?>
<!-- Script for checking input data validation -->
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if(form.checkValidity() == false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false)
    })();

</script>





                                                <!-- Start of Form -->
                                                <form <?php if ($enrollmentstatus===false){?>style="display:none"<?php } ?> autocomplete="off" id="forms" name="main" method="POST" action="MyCrud.php" class="needs-validation" novalidate enctype="multipart/form-data">
    
    <div id="main" style="margin-left:20px">
        <header class="mb-3">
        </header>

        <div class="page-heading"> <!--HEADING -->
            <div class="page-title">
                <div class="row">
                    <div class="col-12">
                        <h3 style="text-align: center">LEARNER ENROLLMENT AND SURVEY FORM</h3><br>
                        <h6>Instructions:</h6>
                        <h6>1. This enrollment survey shall be answered by the parent/guardian of the learner.</h6>
                        <h6>2. Please read the questions carefully and fill in all applicable spaces and write your answers legibly in CAPITAL
                            letters. For items not applicable, write N/A.
                        </h6>
                        <h6>3. For questions / clarifications, please ask for the assistance of the teacher / person-in-charge.</h6>
                        <h6>4. If fields are not applicable, leave it blank.</h6>
                        <h6>5. Fields with (<span style="color: red; font-weight: 900;">*</span>) symbols are required to be fill in.</h6><br>

                        <div class="row nonprintable">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label >Grade Level to enroll</label><span id="id"></span>
                                    <select class="form-select mb-3" style="background-image: none;" aria-label=".form-select-lg example" onchange="displayform(); resetStudentTypeSelection();" name="A0" id="A0" required>
                                    <option disabled selected >Open this select menu</option>
                                        <?php 

                                        $query = "SELECT * FROM `gradelevel_tbl`";
                                        $query_run = mysqli_query($connection, $query);
                                        while($row=$query_run->fetch_assoc()){  
                                        ?>     
                                        <option value="<?php echo $row['id']?>"> <?php echo $row['grade']; ?></option>
                                        <?php  
                                        }
                                        ?>  
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="type">
                                        <label >Select Student Type</label>
                                        <select class="form-select mb-3" style="background-image: none;" aria-label=".form-select-lg example" onchange="verifyType()" name="A00" id="A00">
                                        <option disabled selected >Open this select menu</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Transferee">Transferee</option>
                                        <option value="New Enrollee">New Enrollee</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="searchdiv">
                                        <label >Search LRN</label> 
                                            <div class="input-group mb-3">                                               
                                                <input type="text" class="form-control" style="background-image: none;" name="search" id="search" >
                                                    <button  class="btn btn-primary" type="submit" id="verifylrn" onclick="modal();">                                                       
                                                    <i class="bi bi-search"></i></button><br>
                                            </div>
                                                    <span id= "message"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>                      
                    </div>
                     <div class="col-12 col-md-4 order-md-2 order-first">
                    </div>
                </div>
            </div>
        </div>
                          <!-------------------------GRADE LEVEL AND SCHOOL INFORMATION --------------------------->     
            <section class="section myDiv">
                <div class="card logbrand">
                    <div style="background-color: lightgray" class="card-header">
                        <h4 class="card-title">A. GRADE LEVEL AND SCHOOL INFORMATION</h4>
                        <input type="hidden" class="form-control" style="background-image: none;" id="stud_id" name="stud_id">                                                          
                    </div>
                    <br>               
                    <div class="card-body">
                        <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label>A1. School Year</label>
                                        <?php                                 
                                            $query = "SELECT SchoolYear FROM `schoolyear_tbl` WHERE `Active` = 'Yes' ";
                                            $query_run = mysqli_query($connection, $query);
                                            while($row=$query_run->fetch_assoc()){  
                                            ?>     
                                            <input type="text" class="form-control" readonly name="A1" id="A1" value="<?php echo $row['SchoolYear']?>">
                                            <?php  
                                            }
                                            ?>  
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>A2. Check the appropriate boxes only <span style="color: red; font-weight: 900">  *</span></label>                                     
                                        <div class="form-check form-check-inline" >
                                            <input  class="form-check-input noLrn" type="radio" id="A2" name="A2" value="No LRN" onchange="myLrn()" required="">
                                            <label class="form-check-label" >No LRN</label><br>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input  class="form-check-input withLrn" type="radio" id="A2" name="A2" value="With LRN" onchange="myLrn()" required="">
                                            <label class="form-check-label" >With LRN</label><br>
                                        </div>   
                                    </div>  
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>A3. Returning (Balik-aral) <span style="color: red; font-weight: 900;">  *</span></label>
                                        <select class="form-select mb-3" aria-label=".form-select-lg example"  name="A3" id="A3" required="">
                                        <option value="">Open this select menu</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select option first.
                                        </div>  
                                    </div>
                                </div>
                        </div>

                        <div class="row">
                                <div class="col-md-3">
                                        <div class="form-group">
                                        <label>A4. Grade Level to enroll</label>
                                        <select class="form-select mb-3" aria-label=".form-select-lg example" style="background-image: none;" name="A4" id="A4" value="<?php echo isset($_POST['A4']) ? $_POST['A4'] : ""?>" required>
                                        <option disabled selected >Open this select menu</option>
                                            <?php    
                                            $query = "SELECT * FROM `gradelevel_tbl`";
                                            $query_run = mysqli_query($connection, $query);
                                            while($row=$query_run->fetch_assoc()){  
                                            ?>   
                                                 
                                            <option value="<?php echo $row['id']?>"> <?php echo $row['grade']; ?></option>
                                            <?php  
                                            }
                                            ?>  
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label>A5. Last grade level completed</label>
                                        <input type="text" readonly class="form-control" name="A5" id="A5">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group autocomplete">
                                        <label>A6. Last school year completed <span style="color: red; font-weight: 900;">  *</span></label>
                                        <input type="text" class="form-control"  name="A6" id="A6" required="">
                                        <div class="invalid-feedback">
                                            This field cannot be left blank.
                                        </div>  
                                    </div>
                                </div>
                        </div>

                        <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group autocomplete">
                                        <label>A7. Last school attended <span style="color: red; font-weight: 900;">  *</span></label>
                                        <input type="text" class="form-control" name="A7" id="A7" required="">
                                        <div class="invalid-feedback">
                                            This field cannot be left blank.
                                        </div>  
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label>A8. School ID </label>
                                        <input type="number" class="form-control" style="background-image: none;" name="A8" id="A8">
                                        <div class="invalid-feedback">
                                            This field cannot be left blank.
                                        </div>  
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label>A9. School Address <span style="color: red; font-weight: 900;">  *</span></label>
                                        <input type="text" class="form-control" name="A9" id="A9" required="">
                                        <div class="invalid-feedback">
                                            This field cannot be left blank.
                                        </div>  
                                    </div>
                                </div>
                                <div class="col-md-3">
                                <div class="form-group">
                                        <label>A10. School Type <span style="color: red; font-weight: 900;">  *</span></label>
                                        <select class="form-select mb-3" aria-label=".form-select-lg example"  name="A10" id="A10" required="">
                                        <option value="">Open this select menu</option>
                                        <option value="PUBLIC">PUBLIC</option>
                                        <option value="PRIVATE">PRIVATE</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select an option first.
                                        </div>  
                                    </div>
                                </div>
                        </div>

                        <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label>A11. School to enroll in</label>
                                        <input type="text" class="form-control" name="A11" id="A11" 
                                        value ="Sorsogon Pilot Elementary School" placeholder="Sorsogon Pilot Elementary School" 
                                        readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label>A12. School ID</label>
                                        <input type="text" class="form-control" name="A12" id="A12"
                                        value="114581" placeholder="114581" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label>A13. School Address</label>
                                        <input type="text" class="form-control" name="A13" id="A13" 
                                        value ="De Vera St, Sorsogon City, 4700 Sorsogon" 
                                        placeholder="De Vera St, Sorsogon City, 4700 Sorsogon" 
                                        readonly>
                                    </div>
                                </div>
                        </div>                       
                    </div>
                </div>
            </section>
                             <!-----------------------------STUDENT INFORMATION --------------------->
            <section class="section myDiv">
                <div class="card logbrand">
                    <div style="background-color: lightgray" class="card-header">
                        <h4 class="card-title">B. STUDENT INFORMATION</h4>
                    </div>
                    <br>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label>B1. PSA Birth Certificate No.</label>
                                    <input type="text" class="form-control" style="background-image: none;" id="B1" name="B1">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>B2. LRN</label>
                                    <small class="text-muted">(<i>Learners Reference No.</i>)</small><span style="color: red; font-weight: 900;">  *</span>
                                    <input type="tel" class="form-control check_email"  id="B2" name="B2" maxlength="12" required="">
                                    <p class="feedback" style="font-size: .875em; color: #dc3545; margin-top: .25rem"></p>
                                    <div class="invalid-feedback">
                                            This field cannot be left blank.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                    <label>Student Photo <span style="color: red; font-weight: 900;">  *</span><!-- <i style="color: red; font-size: 12px"> (Note: Recommended file size: 1-5 mb.)</i> --></label>
                                    <input name="photo" type="file" class="form-control" id="photo" required="">
                                    <div class="invalid-feedback">
                                            This field cannot be left blank.
                                        </div>  
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label>Name<span style="color: red; font-weight: 900;">  *</span></label>
                            <div class="col-md-3">                                    
                                <input type="text" class="form-control" id="B3" name="B3" placeholder="B3. Last Name" required=""> 
                                <div class="invalid-feedback">
                                    This field cannot be left blank.
                                </div> 
                            </div>
                            <div class="col-md-3">    
                                <input type="text" class="form-control"id="B4" name="B4" placeholder="B4. First Name" required="">
                                <div class="invalid-feedback">
                                    This field cannot be left blank.
                                </div>                                        
                            </div>
                            <div class="col-md-3">    
                                <input type="text" class="form-control" style="background-image: none;" id="B5" name="B5" placeholder="B5. Middle Name">  
                                <div class="invalid-feedback">
                                    This field cannot be left blank.
                                </div>                                      
                            </div>
                            <div class="col-md-2">    
                                <input type="text" class="form-control" id="B6" style="background-image: none;" name="B6" placeholder="B6. Jr., II" >                                        
                            </div>
                        </div>
                        
                        <br/>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label>B7. Birthday <span style="color: red; font-weight: 900;">  *</span></label>
                                    <input type="date" class="form-control" id="B7" name="B7" onchange="ageCalculator()" required="">
                                    <div class="invalid-feedback">
                                            This field cannot be left blank.
                                    </div>  
                                </div>
                            </div>
                
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label>B8. Age <span style="color: red; font-weight: 900;">  *</span></label>
                                    <input type="tel" maxlength="2" class="form-control" id="B8" name="B8" required="">
                                    <div class="invalid-feedback">
                                            This field cannot be left blank.
                                    </div>  
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>B9. Sex <span style="color: red; font-weight: 900;">  *</span></label>
                                    <select class="form-control" name="B9" id="B9" required="">   
                                        <option value="">Select</option>                                         
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>                                           
                                    </select>
                                    <div class="invalid-feedback">
                                            Please select an option first.
                                    </div>  
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group ">
                                <label>B10. Indigenous Group <span style="color: red; font-weight: 900;">  *</span></label>
                                    <small class="text-muted">(<i>Ethnic Group</i>)</small>
                                    <input list="B10list" type="text" class="form-control" name="B10" id="B10" placeholder="Select" required="">
                                    <datalist id="B10list" required="">   
                                        <option value="">Select</option>                                         
                                        <option value="Ifugao">Ifugao</option>
                                        <option value="Bontoc">Bontoc</option>                                           
                                        <option value="Kankanay">Kankanay</option>                                           
                                        <option value="Ibaloi">Ibaloi</option>                                           
                                        <option value="Kalinga">Kalinga</option>                                           
                                        <option value="Tinguian">Tinguian</option>                                           
                                        <option value="Isneg">Isneg</option>                                           
                                        <option value="Gaddang">Gaddang</option>                                           
                                        <option value="Ilongot">Ilongot </option>                                           
                                        <option value="Negrito">Negrito</option>  
                                        <option value="Others">Others</option>                                          
                                        <option value="None">None</option>                                          
                                        </datalist>
                                    <div class="invalid-feedback">
                                            Please select an option first.
                                    </div>  
                                </div>
                            </div>                      
                        </div>

                        <div class="row">                                       
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>B12. Mother Tongue <span style="color: red; font-weight: 900;">  *</span></label>
                                    <input list="B12list" type="text" class="form-control" name="B12" id="B12" placeholder="Select" required="">
                                    <datalist id="B12list" required="">                                            
                                        <option value="Tagalog">Tagalog</option>
                                        <option value="Kapampangan">Kapampangan</option>                                           
                                        <option value="Pangasinense">Pangasinense</option>                                           
                                        <option value="Iloko">Iloko</option>                                           
                                        <option value="Bikol">Bikol</option>                                           
                                        <option value="Cebuano">Cebuano</option>                                           
                                        <option value="Hiligaynon">Hiligaynon</option>                                           
                                        <option value="Waray">Waray</option>                                           
                                        <option value="Tausug">Tausug </option>                                           
                                        <option value="Maguindanaoan">Maguindanaoan</option>  
                                        <option value="Maranao">Maranao</option>                                          
                                        <option value="Chabacano">Chabacano</option>                                          
                                        <option value="Aklanon">Aklanon</option>                                          
                                        <option value="Surigaonon">Surigaonon</option>
                                        <option value="English">English</option>
                                        <option value="None">None</option>                                                                                        
                                    </datalist>
                                    <div class="invalid-feedback">
                                            Please select an option first.
                                    </div>  
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label>Religion <span style="color: red; font-weight: 900;">  *</span></label>
                                    <input list="religionlist" type="text" class="form-control" name="religion" id="religion" placeholder="Select" required="">
                                    <datalist id="religionlist" required="">                                           
                                        <option value="Roman Catholic">Roman Catholic</option>
                                        <option value="Islam">Islam</option>                                           
                                        <option value="Evangelical (PCEC)">Evangelical (PCEC)</option>
                                        <option value="Iglesia Ni Cristo">Iglesia Ni Cristo</option>                                           
                                        <option value="Protestant (NCCP)">Protestant (NCCP)</option>
                                        <option value="Aglipayan">Aglipayan</option>                                           
                                        <option value="Seventh-day Adventist">Seventh-day Adventist</option>
                                        <option value="Bible Baptist Church">Bible Baptist Church</option>                                           
                                        <option value="United Church of Christ in the Philippines">United Church of Christ in the Philippines</option>
                                        <option value="Jehovah's Witnesses">Jehovah's Witnesses</option>  
                                        <option value="Others">Others</option>                                         
                                        <option value="None">None</option>                                         
                                        </datalist>
                                    <div class="invalid-feedback">
                                            Please select an option first.
                                    </div>  
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label>Learning Mode <span style="color: red; font-weight: 900;">  *</span></label>
                                    <select class="form-control" name="modality" id="modality" required="">   
                                        <option value="">Select</option>                                         
                                        <option value="Modular">Modular</option>
                                        <option value="Online Class">Online Class</option>                                                                                      
                                        <option value="Flexible">Flexible</option>                                                                                      
                                        <option value="F2F">Face to Face</option>                                                                                      
                                    </select>
                                    <div class="invalid-feedback">
                                            Please select an option first.
                                        </div>  
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label>4Ps Member <span style="color: red; font-weight: 900;">  *</span></label>
                                    <select class="form-control" name="4ps" id="4ps" required="">   
                                        <option value="">Select</option>                                         
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>                                                                                                                                                                           
                                    </select>
                                    <div class="invalid-feedback">
                                            Please select an option first.
                                        </div> 
                                </div>
                            </div>
                        </div>                                 
                    </div>
                </div>
            </section>
                        <!--------------------FOR LEARNERS WITH SPECIAL EDUCATION NEEDS --------------------------->
            <section id="basic-vertical-layouts" class="myDiv">
                <div class="row match-height">
                    <div class="col-md-7 col-12">
                        <div class="card logbrand">
                            <div style="background-color: lightgray" class="card-header">
                                <h4 class="card-title">For Learners with Special Education Needs</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                    <label>B14. Does the learner have special education needs? <span style="color: red; font-weight: 900;">  *</span></label>
                                                        <div class="col-6">
                                                        <select class="form-select mb-3" aria-label=".form-select-lg example"  id="B14" name="B14" onchange="special()" required="">
                                                        <option value="No">No</option>
                                                        <option value="Yes">Yes</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select an option first.
                                                        </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="col-12">
                                                    <div class="form-group spedlink">
                                                        <label>B15. If yes, Choose all that applies.
                                                            </label>  
                                                                <div class="row">                                                                                                                        
                                                                    <div class="col">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input checkothers" style="background-image: none;" type="checkbox" name="B15[]" value="Mental Retardation" onclick="thisenable()" >
                                                                            <label class="form-check-label" >Mental Retardation</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input checkothers" style="background-image: none;" type="checkbox" name="B15[]" value="Hearing Impairment" onclick="thisenable()" >
                                                                            <label class="form-check-label" >Hearing Impairment</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input checkothers" style="background-image: none;" type="checkbox" name="B15[]" value="Visual Impairmentlexia" onclick="thisenable()" >
                                                                            <label class="form-check-label" >Visual Impairment</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input checkothers" style="background-image: none;" type="checkbox" name="B15[]" value="Autism" onclick="thisenable()" >
                                                                            <label class="form-check-label" >Autism</label>
                                                                        </div> 
                                                                    
                                                                    </div>

                                                                    <div class="col">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input checkothers" style="background-image: none;" type="checkbox" name="B15[]" value="Multiple Disabilities" onclick="thisenable()" >
                                                                            <label class="form-check-label" >Multiple Disabilities</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input checkothers" style="background-image: none;" type="checkbox" name="B15[]" value="Physical Disabilities & Health Impairment" onclick="thisenable()" >
                                                                            <label class="form-check-label" >Physical Disabilities & Health Impairment</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input checkothers" style="background-image: none;" type="checkbox" name="B15[]" value="Giftedness" onclick="thisenable()" >
                                                                            <label class="form-check-label" >Giftedness</label>
                                                                        </div>                                             
                                                                        <div class="form-check">
                                                                            <input class="form-check-input checkothers" style="background-image: none;" type="checkbox" name="B15[]" value="Others" onclick="thisenable()" >
                                                                            <label class="form-check-label" >Others</label>
                                                                        </div>                                             
                                                                    </div>  
                                                                </div>                                                                  
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group B151">
                                                        <label>Please specify</label>
                                                        <input type="text" class="form-control" style="background-image: none;" id="B151" name="B151">
                                                            
                                                    </div>
                                                </div>  
                                                                                        
                                                <div class="col-12">
                                                    <div class="form-group spedlink">
                                                    <label>B16. Do you have any assistive technology available at home? 
                                                        (i.e. Screen Reader, Braille, Daisy) <span style="color: red; font-weight: 900;">  *</span></label>
                                                        <div class="col-6">
                                                        <select class="form-select mb-3" style="background-image: none;" aria-label=".form-select-lg example" id="B16" name="B16" onchange="assistive(); special2();" required="">
                                                        <option value="No">No</option>
                                                        <option value="Yes">Yes</option>       
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select an option first.
                                                        </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group Bb17" id="Bb17">
                                                        <label>B17. If yes, please specify</label>
                                                        <input type="text" class="form-control" style="background-image: none;" id="B17" name="B17" >
                                                            <br>
                                                    </div>
                                                </div>                                                                           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                          <!------------------ADDRESS INFORMATION -------------------------->
                <div class="col-md-5 col-12">
                        <div class="card logbrand"><!----------------- ADDRESS CARD --------------------------->
                            <div style="background-color: lightgray" class="card-header">
                                <h4 class="card-title">STUDENT ADDRESS</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="form form-vertical">
                                        <div class="form-body ">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>House No. and Street</label>
                                                        <input type="text" class="form-control" style="background-image: none;" id="street" name="street">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group autocomplete">
                                                        <label>Barangay <span style="color: red; font-weight: 900;">  *</span></label>
                                                        <input type="text" class="form-control" id="barangay" name="barangay" required=""> 
                                                        <div class="invalid-feedback">
                                                        This field cannot be left blank.
                                                        </div>                                                                
                                                    </div>            
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group autocomplete">
                                                        <label>City / Municipality <span style="color: red; font-weight: 900;">  *</span></label>
                                                        <input type="text" class="form-control" id="municipality" name="municipality" required=""> 
                                                        <div class="invalid-feedback">
                                                             This field cannot be left blank.
                                                        </div>                                                                                 
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group autocomplete">
                                                        <label>Province <span style="color: red; font-weight: 900;">  *</span></label>
                                                        <input type="text" class="form-control" id="province" name="province" required="">
                                                        <div class="invalid-feedback">
                                                        This field cannot be left blank.
                                                        </div>
                                                    </div>    
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Region <span style="color: red; font-weight: 900;">  *</span></label>
                                                        <input type="text" value="V" placeholder="V" readonly class="form-control" id="region" name="region" required="">   
                                                        <div class="invalid-feedback">
                                                        This field cannot be left blank.
                                                        </div> 
                                                        <br>                                                   
                                                    </div>
                                                </div>       
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>      
                </div>
            </section>
                              <!--------------------------PARENT / GUARDIAN INFORMATION------------------------>
            <section class="section myDiv">
                <div class="card logbrand">
                    <div style="background-color: lightgray" class="card-header">
                        <h4 class="card-title">C. PARENT  / GUARDIAN INFORMATION</h4>                          
                    </div>
                    <br>
                  
                    <div class="card-body">
                        <div class="row">
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                    <div class="form-group ">
                                        <label>Father's Full Name</label>
                                        <input type="text" class="form-control" style="background-image: none;" id="father" name="father">
                                    </div>
                                </div>
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                    <div class="form-group ">
                                        <label>Mother's Full Name</label>
                                        <input type="text" class="form-control" style="background-image: none;" id="mother" name="mother">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label>Guardian's Full Name <span style="color: red; font-weight: 900;">  *</span></label>
                                        <input type="text" class="form-control" id="guardian" name="guardian" required="">
                                        <div class="invalid-feedback">
                                            This field cannot be left blank.
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!-- =-------------------------------------------------------------------------------------------------------- -->
                        <div class="row">                                          
                            <div style="border-right: solid 1px gray" class="col-md-4">
                                    <div class="form-group">
                                            <label>Highest Educational Attainment</label>
                                            <select class="form-select  mb-3" style="background-image: none;" aria-label=".form-select-lg example" id="fathereducattainment" name="fathereducattainment">
                                            <option value="" selected>Open this select menu</option>
                                            <option value="Elementary Graduate">Elementary Graduate</option>
                                            <option value="High School Graduate">High School Graduate</option>
                                            <option value="College Graduate">College Graduate</option>
                                            <option value="Vocational">Vocational</option>
                                            <option value="Master's/Doctorate Degree">Master's/Doctorate Degree</option>
                                            <option value="Did not attent school">Did not attent school</option>
                                            </select>                                            
                                        </div>
                             </div>
                            <div style="border-right: solid 1px gray" class="col-md-4">
                                    <div class="form-group">
                                            <label>Highest Educational Attainment</label>
                                            <select class="form-select  mb-3" style="background-image: none;" aria-label=".form-select-lg example" id="mothereducattainment" name="mothereducattainment">
                                            <option value="" selected>Open this select menu</option>
                                            <option value="Elementary Graduate">Elementary Graduate</option>
                                            <option value="High School Graduate">High School Graduate</option>
                                            <option value="College Graduate">College Graduate</option>
                                            <option value="Vocational">Vocational</option>
                                            <option value="Master's/Doctorate Degree">Master's/Doctorate Degree</option>
                                            <option value="Did not attent school">Did not attent school</option>
                                            </select>
                                        </div>
                             </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                            <label>Highest Educational Attainment </label>
                                            <select class="form-select  mb-3" aria-label=".form-select-lg example" style="background-image: none;" id="guardianeducattainment" name="guardianeducattainment">
                                            <option value="" selected>Open this select menu</option>
                                            <option value="Elementary Graduate">Elementary Graduate</option>
                                            <option value="High School Graduate">High School Graduate</option>
                                            <option value="College Graduate">College Graduate</option>
                                            <option value="Vocational">Vocational</option>
                                            <option value="Master's/Doctorate Degree">Master's/Doctorate Degree</option>
                                            <option value="Did not attent school">Did not attent school</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select an option first.
                                            </div>
                                    </div>
                             </div>                                  
                        </div>
                        <!-------------------------------------------------------------------------------------------------------------  -->
                        <div class="row">                                          
                            <div style="border-right: solid 1px gray" class="col-md-4">
                                    <div class="form-group">
                                            <label>Employment Status</label>
                                            <select class="form-select  mb-3" style="background-image: none;" aria-label=".form-select-lg example" id="fatheremployment" name="fatheremployment" >
                                            <option value="" selected>Open this select menu</option>
                                            <option value="Full Time">Full Time</option>
                                            <option value="Part Time">Part Time</option>
                                            <option value="Self-Employed (i.e family business)">Self-Employed (i.e family business)</option>
                                            <option value="Unemployed due to ECQ">Unemployed due to ECQ</option>
                                            <option value="Not Working">Not Working</option>
                                            </select>
                                        </div>
                             </div>
                            <div style="border-right: solid 1px gray" class="col-md-4">
                                    <div class="form-group">
                                            <label>Employment Status</label>
                                            <select class="form-select  mb-3" style="background-image: none;" aria-label=".form-select-lg example" id="motheremployment" name="motheremployment" >
                                            <option value="" selected>Open this select menu</option>
                                            <option value="Full Time">Full Time</option>
                                            <option value="Part Time">Part Time</option>
                                            <option value="Self-Employed (i.e family business)">Self-Employed (i.e family business)</option>
                                            <option value="Unemployed due to ECQ">Unemployed due to ECQ</option>
                                            <option value="Not Working">Not Working</option>
                                            </select>
                                        </div>
                             </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                            <label>Employment Status </label>
                                            <select class="form-select  mb-3" aria-label=".form-select-lg example" style="background-image: none;" id="guardianemployment" name="guardianemployment">
                                            <option value="" selected>Open this select menu</option>
                                            <option value="Full Time">Full Time</option>
                                            <option value="Part Time">Part Time</option>
                                            <option value="Self-Employed (i.e family business)">Self-Employed (i.e family business)</option>
                                            <option value="Unemployed due to ECQ">Unemployed due to ECQ</option>
                                            <option value="Not Working">Not Working</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select an option first.
                                            </div>
                                        </div>
                             </div>                                   
                        </div>    
                        <!-- ------------------------------------------------------------------------------------------------ -->
                        
                        <div class="row">                                          
                            <div style="border-right: solid 1px gray" class="col-md-4">
                                    <div class="form-group">
                                            <label>Working from home due to ECQ?</label>
                                            <select class="form-select  mb-3" style="background-image: none;" aria-label=".form-select-lg example" id="fatherWFH" name="fatherWFH">
                                            <option value="" selected>Open this select menu</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                            </select>
                                     </div>
                             </div>
                            <div style="border-right: solid 1px gray" class="col-md-4">
                                    <div class="form-group">
                                            <label>Working from home due to ECQ?</label>
                                            <select class="form-select  mb-3" style="background-image: none;" aria-label=".form-select-lg example" id="motherWFH" name="motherWFH">
                                            <option value="" selected>Open this select menu</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                            </select>
                                     </div>
                             </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                            <label>Working from home due to ECQ? </label>
                                            <select class="form-select  mb-3"  aria-label=".form-select-lg example" style="background-image: none;" id="guardianWFH" name="guardianWFH">
                                            <option value="" selected>Open this select menu</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select an option first.
                                            </div>
                                     </div>
                             </div>
                        </div>
                        <!-- ------------------------------------------------------------------------------------------------------------- -->

                        <div class="row">
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                    <div class="form-group ">
                                        <label>Contact Number/s (cellphone/telephone)</label>
                                        <input type="tel" maxlength="11" style="background-image: none;" class="form-control" id="fathercontact" name="fathercontact" >
                                    </div>
                                </div>
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                    <div class="form-group ">
                                        <label>Contact Number/s (cellphone/telephone)</label>
                                        <input type="tel" maxlength="11" style="background-image: none;" class="form-control" id="mothercontact" name="mothercontact" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group autocomplete ">
                                        <label>Contact Number/s (cellphone/telephone)</label>
                                        <input type="tel" maxlength="11" class="form-control" style="background-image: none;" id="guardiancontact" name="guardiancontact">
                                        <div class="invalid-feedback">
                                                This field cannot be left blank.
                                            </div>
                                        <br>
                                        <label>Relationship to the Guardian</label>
                                        <input type="text" class="form-control" style="background-image: none;" id="guardianrelate" name="guardianrelate" >
                                        <div class="invalid-feedback">
                                                This field cannot be left blank.
                                            </div>
                                    </div>
                                </div>
                        </div>                        
                    </div>
                </div>
            </section>
                         <!------------------- HOUSEHOLD CAPACITY AND ACCESS TO DISTANCE LEARNING-------------------------->

            <section class="section myDiv forms2">
                  <div class="card logbrand"><!-- Household Survey -->
                    <div style="background-color: lightgray" class="card-header">
                        <h4 class="card-title">D. HOUSEHOLD CAPACITY AND ACCESS TO DISTANCE LEARNING</h4>                          
                     </div>
                            <br>        
                            <div class="card-body">
                                <div class="row">            

                                    <!-- D1 & D3 -->
                                    <div style="border-right: solid 1px gray" class="col-md-6">
                                        <div class="form-group ">
                                            <label>D1. How does your child go to school? Choose all that applies.</label>                                      
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input " type="checkbox"  name="D1[]" value="Walking">
                                                            <label class="form-check-label" >Walking</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input " type="checkbox"  name="D1[]" value="Public Commute (land/water)">
                                                            <label class="form-check-label" >Public Commute (land/water)</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input " type="checkbox"  name="D1[]" value="Family-owned vehicle">
                                                            <label class="form-check-label" >Family-owned vehicle</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input " type="checkbox"  name="D1[]" value="School Service">
                                                            <label class="form-check-label" >School Service</label>
                                                        </div>
                                                        
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>D3. Who among the household members can provide instructional support
                                                to the child's distance learning? Choose all that applies.
                                            </label>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D3[]" value="Parents/Guardians">
                                                            <label class="form-check-label" >Parents/Guardians</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D3[]" value="Elder siblings">
                                                            <label class="form-check-label" >Elder siblings</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D3[]" value="Grandparents">
                                                            <label class="form-check-label" >Grandparents</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D3[]" value="Extended members of the family">
                                                            <label class="form-check-label" >Extended members of the family</label>
                                                        </div> 
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D3[]" value="Others(tutor, house helper)">
                                                            <label class="form-check-label" >Others(tutor, house helper)</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D3[]" value="none">
                                                            <label class="form-check-label" >none</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D3[]" value="able to do independent learning">
                                                            <label class="form-check-label" >able to do independent learning</label>
                                                        </div>                                             
                                                    </div> 

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- D2 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>D2. How many of your household members (including the Enrollee) are
                                                studying in the current School Year? Please specify each.
                                            </label>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">Kinder</span>
                                                            <input type="tel" style="background-image: none;" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                            </div>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">Grade 1</span>
                                                            <input type="tel" style="background-image: none;" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]"> 
                                                            </div>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">Grade 2</span>
                                                            <input type="tel" style="background-image: none;" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                            </div>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">Grade 3</span>
                                                            <input type="tel" style="background-image: none;" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                            </div>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">Grade 4</span>
                                                            <input type="tel" style="background-image: none;" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                            </div>
                                                    </div>

                                                    <div class="col">
                                                    <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">Grade 5</span>
                                                            <input type="tel" style="background-image: none;" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                            </div>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">Grade 6</span>
                                                            <input type="tel" style="background-image: none;" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                            </div>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">Grade 7</span>
                                                            <input type="tel" style="background-image: none;" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                            </div>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">Grade 8</span>
                                                            <input type="tel" style="background-image: none;" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                            </div>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">Grade 9</span>
                                                            <input type="tel" style="background-image: none;" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                            </div>
                                                    </div>
                                                    
                                                    <div class="col ">
                                                    <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">Grade 10</span>
                                                            <input type="tel" style="background-image: none;" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                            </div>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">Grade 11</span>
                                                            <input type="tel" style="background-image: none;" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]"> 
                                                            </div>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">Grade 12</span>
                                                            <input type="tel" style="background-image: none;" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                            </div>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm"><i>Others</i></span>
                                                            <input type="text" class="form-control" style="background-image: none;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                            </div>
                                                        <div class="input-group input-group-sm mb-3">
                                                        <label class="form-check-label"><i>(i.e college, vocational, none, etc.)</i></label>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    
                                    <!-- D4 -->
                                    <div style="border-right: solid 1px gray" class="col-md-6">
                                        <div class="form-group">
                                            <label>D4. What devices are available at home that the learner can use for learning?
                                                Check all that applies.
                                            </label>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="cable tv">
                                                            <label class="form-check-label" >cable tv</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="non-cable tv">
                                                            <label class="form-check-label" >non-cable tv</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="basic cellphone">
                                                            <label class="form-check-label" >basic cellphone</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="smartphone">
                                                            <label class="form-check-label" >smartphone</label>
                                                        </div> 
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="tablet">
                                                            <label class="form-check-label" >tablet</label>
                                                        </div> 
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="radio">
                                                            <label class="form-check-label" >radio</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="desktop computer">
                                                            <label class="form-check-label" >desktop computer</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="laptop">
                                                            <label class="form-check-label" >laptop</label>
                                                        </div>                                             
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="none">
                                                            <label class="form-check-label" >none</label>
                                                        </div>                                             
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" style="background-image: none;" id="inputGroup-sizing-sm"><i>Others</i></span>
                                                            <input type="text" class="form-control" style="background-image: none;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D4[]">
                                                            </div>                                            
                                                    </div> 

                                                </div>
                                            </div>
                                        </div>
                                    </div>  


                                    <!-- D5 & D6 -->
                                    <div class="col-md-6">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label>D5. Do you have a way to connect to the internet?
                                                    </label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="D5" id="D5" value="Yes">
                                                            <label class="form-check-label" >Yes</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="D5" id="D5" value="No">
                                                            <label class="form-check-label" >No. (if No, proceed to D7)</label>
                                                        </div>
                                                </div>
                                                <div class="col form-group">
                                                        <label>D6. How do you connect to the internet? Choose all that applies.
                                                        </label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D6[]" id="inlineCheckbox1" value="own mobile data">
                                                                <label class="form-check-label" >own mobile data</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D6[]" id="inlineCheckbox1" value="own broadband (DSL, wireless fiber, satellite)">
                                                                <label class="form-check-label" >own broadband (DSL, wireless fiber, satellite)</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D6[]" id="inlineCheckbox1" value="computer shop">
                                                                <label class="form-check-label" >computer shop</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D6[]" id="inlineCheckbox1" value="other places outside the home with internet connection">
                                                                <label class="form-check-label" >other places outside the home with internet connection</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D6[]" id="inlineCheckbox1" value="none">
                                                                <label class="form-check-label" >none</label>
                                                            </div>
                                                </div>
                                            </div>
                                                
                                        </div>
                                    </div>
                                


                                    <!-- D7 -->
                                    <div style="border-right: solid 1px gray" class="col-md-6">
                                     <div class="form-group">
                                            <label>D7. What distance learning modalities do you prefer for 
                                                your child? Choose all that applies.
                                            </label>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D7[]" id="inlineCheckbox1" value="online learning">
                                                            <label class="form-check-label" >online learning</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D7[]" id="inlineCheckbox1" value="television">
                                                            <label class="form-check-label" >television</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D7[]" id="inlineCheckbox1" value="radio">
                                                            <label class="form-check-label" >radio</label>
                                                        </div>
                                                    
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D7[]" id="inlineCheckbox1" value="modular learning">
                                                            <label class="form-check-label" >modular learning</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D7[]" id="inlineCheckbox1" value="combination of face to face with other modalities">
                                                            <label class="form-check-label" >combination of face to face with other modalities</label>
                                                        </div>                                                                                             
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm"><i>Others</i></span>
                                                            <input type="text" class="form-control" style="background-image: none;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D7[]">
                                                            </div>                                            
                                                    </div> 

                                                </div>
                                            </div>
                                        </div>
                                    </div>                                


                                    <!-- D8 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>D8. What are the challenges that may affect your child's learning process
                                                through distance education? Choose all that applies.
                                            </label>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="lack of available gadgets/equipment">
                                                            <label class="form-check-label" >lack of available gadgets/equipment</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="insufficient load/data allowance">
                                                            <label class="form-check-label" >insufficient load/data allowance</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="unstable internet connection">
                                                            <label class="form-check-label" >unstable internet connection</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="existing health condition">
                                                            <label class="form-check-label" >existing health condition</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="difficulty in independent learning">
                                                            <label class="form-check-label" >difficulty in independent learning</label>
                                                        </div> 
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="conflict with other activities">
                                                            <label class="form-check-label" >conflict with other activities</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="high electrical consumption">
                                                            <label class="form-check-label" >high electrical consumption</label>
                                                        </div>                                                                                             
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="distractions (i.e. social media, noise)">
                                                            <label class="form-check-label" >distractions (i.e. social media, noise)</label>
                                                        </div>                                                                                             
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm"><i>Others</i></span>
                                                            <input type="text" style="background-image: none;" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D8[]">
                                                            </div>                                            
                                                    </div> 

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                             </div>                            
                      </div>
                 </div> 
                <div class="card logbrand"><!-- Consent -->
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check" onclick="enablefirst()">
                            <label class="form-check-label" >
                                <i>"In accordance with the Department of Education’s mandate to protect and promote the right to and 
                    access to quality basic education, DepEd collects various data and information, 
                    including personal information, from various subjects using different systems. more info."</i></label>
                        </div>
                    </div>
                </div>                        
            </section>
                              <!-------------------Reset / Submit / Resubmit buttons----------------- -->                              
            
            <section class="section" id="review">
                <div class="card logbrand"> 
                    <div class="card-body">
                        <label class="form-check-label" >
                        <span style="color: red; font-weight: 900;">Note:</span> 
                        Before submitting, kindly review your answers to match the relevant questions. 
                        <i>(ex. mispelled words, incorrect number format, etc.) </i>
                                </label><hr>
                            <div class="form-check">                 
                                <input class="form-check-input" type="checkbox" id="check2" onclick="enable()">
                                <label class="form-check-label" >
                                    <i>I agree that all of my answers are correct, reliable, and true. 
                                        This information I have provided will be necessary for my learner's enrollment form.</i>
                                </label>
                            </div>
                                         
                        <div class="col-12 d-flex justify-content-center reset-btn" id="mybuttons">         
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            <button type="submit" id="readmit" name="readmitstudent" class="btn btn-success me-1 mb-1 nonprintable">Submit</button>                               
                            <button type="submit" id="admit" name="admitstudent" class="btn btn-primary me-1 mb-1 nonprintable">Submit</button>
                           

                            
                        </div>
                    </div>
                </div>
            </section>
    </div>
</form>


                                            <!-- Semi Footer -->
     <div class="col-12 d-flex justify-content-center " <?php if ($enrollmentstatus===false){?> hidden<?php } ?>>
        <a href="index.php"><button type="button" class="btn btn-primary me-1 mb-1 " <?php if ($enrollmentstatus===false){?> hidden<?php } ?>>Go Back To Home Page</button></a>
        <a href="check-enrolled.php"><button type="button" class="btn btn-info me-1 mb-1" <?php if ($enrollmentstatus===false){?> hidden<?php } ?>>Check Admission status</button></a> 
     </div>       
                                                <!-- Footer -->
        <hr <?php if ($enrollmentstatus===false){?> hidden<?php } ?>>


    <div id="notfound" <?php if ($enrollmentstatus===true){?> style="display:none"<?php } ?> >
            <div class="notfound">
                <div class="d-flex justify-content-center">
                    <div class="logo">
                        <img src="asset/images/speslogo.png" alt="Logo" style="height: 90px; weight: 90px">
                    </div>
                </div>

                <div class="notfound-bg">
                    <div></div>
                    <div></div>
                    <div></div>                      
                </div>
           
                <h1>oops!</h1>
                <h2>Enrollment Status: <span style="color:red">Ended</span></h2><br>
                <h4>For more information, feel free to contact or visit <br> Sorsogon Pilot Elementary School.</h4>

                <a href="http://sorsogon-pilot-elem-school.ccdisors-capstone2021.com/">go back</a>
            </div>
    </div>

    
<?php include_once('includes/footer_html.php'); ?>

<script> //Auto Complete Guardian Relationship
/*An array containing all the guardian relationship:*/
var relation = ["Father","Mother","Sister","Brother","Uncle","Aunt","Grandfather","Grandmother","Cousin"];
/*initiate the autocomplete function on the "relationship" element, and pass along the relationship array as possible autocomplete values:*/
autocomplete(document.getElementById("guardianrelate"), relation);
</script>

<script> //Auto Complete School
/*An array containing all the school names in the sorsogon:*/
var school = ["Osiao Elementary School","Sta Lucia Elementary School",
"Gatbo Elementary School","Canarum Elementary School",
"San Pascual Elementary School","Buenavista Elementary School",
"Cabarbuhan Elementary School","Bato Elementary School",
"Salvacion Elementary School","Bon-ot Elementary School",
        "Sawanga Elementary School","Balogo Elementary School",
        "Balogo Elementary School",
        "San Isidro Elementary School","San Ramon Elementary School",
        "Del Rosario Elementary School","Quidolog Elementary School",
        "Sto. Niño Elementary School","Nenita E. Oandasan Elementary School",
        "Calao Elementary School","Sta Lourdes Elementary School",
        "Rawis Elementary School","Sto.Domingo Elementary School",
        "Ulag Elementary School","Lupi Elementary School",
        "Bulawan Elementary School","San Juan Elementary School",
        "Bogna Integrated School",
        "Cogon Elementary School","Gubat Elementary School",
        "Manito Central School","Sorsogon Pilot Elementary School"];
/*initiate the autocomplete function on the "barangay" element, and pass along the barangay array as possible autocomplete values:*/
autocomplete(document.getElementById("A7"), school);
</script>

<script> //Auto Complete Last School-Year Completed
/*An array containing all possible school-year:*/
var schoolyear = ["2015-2016","2016-2017","2017-2018","2018-2019","2019-2020",
        "2020-2021","2021-2022","2022-2023"];
/*initiate the autocomplete function on the "lastschoolyear" element, and pass along the barangay array as possible autocomplete values:*/
autocomplete(document.getElementById("A6"), schoolyear);
</script>  

<script> //Auto Complete Barangay
    /*An array containing all the barangay names in the sorsogon:*/
var barangay = ["Abuyog","Almendras-Cogon","Balete","Balogo (Bacon District)","Balogo (Sorsogon East District)",
                "Barayong","Basud","Bato","Bibincahan","Bitan-o/Dalipay",
                "Bogña","Bon-ot","Bucalbucalan","Buenavista","Buenavista (Bacon District)",
                "Buhatan","Bulabog","Burabod","Cabarbuhan","Cabid-an",
                "Cambulaga","Capuy","Caricaran","Del Rosario","Gatbo",
                "Gimaloto","Guinlajon","Jamislagan","Macabog","Maricrum",
                "Marinas","Osiao","Pamurayan","Pangpang","Panlayaan",
                "Peñafrancia","Piot","Poblacion","Polvorista","Rawis",
                "Rizal","Salog","Salvacion","Salvacion (Bacon District)","Sampaloc",
                "San Isidro","San Isidro (Bacon District)","San Juan (Bacon District)","San Juan (Roro)","San Pascual",
                "San Ramon","San Roque","San Vicente","Santa Cruz","Santa Lucia","Santo Domingo",
                "Santo Niño","Sawanga","Sirangan","Sugod","Sulucan",
                "Talisay","Ticol","Tugos"];
/*initiate the autocomplete function on the "barangay" element, and pass along the barangay array as possible autocomplete values:*/
autocomplete(document.getElementById("barangay"), barangay);
</script>

<script> //Auto Complete Municipality
    /*An array containing all the Municipality names in the sorsogon:*/
var municipality = ["Barcelona","Bulan","Bulusan","Casiguran","Castilla",
                "Donsol","Gubat","Irosin","Juban","Magallanes",
                "Matnog","Pilar","Prieto Diaz","Santa Magdalena","Sorsogon City"];
/*initiate the autocomplete function on the "municipality" element, and pass along the Municipality array as possible autocomplete values:*/
autocomplete(document.getElementById("municipality"), municipality);
</script>

<script> //Auto Complete province
    /*An array containing all the province names in the sorsogon:*/
var province = ["Sorsogon"];
/*initiate the autocomplete function on the "province" element, and pass along the province array as possible autocomplete values:*/
autocomplete(document.getElementById("province"), province);
</script>

<!-- modal loading screen -->
<div class="modal fade bd-example-modal-lg thismodal" data-backdrop="static" data-keyboard="false" tabindex="-1">
<div class="modal-dialog modal-sm">
    <div class="modal-content" style="width: 100px">
        <span class="fa fa-spinner fa-spin fa-5x"></span>
    </div>
</div>
</div>

<script>//Modal Successfull
function modal(){
    $('.thismodal').modal('show');
    setTimeout(function () {
    //	console.log('hejsan');
        $('.thismodal').modal('hide');
    }, 3000);
    }
</script>

<!-- Modal Successfull Style -->
<style>
.bd-example-modal-lg .modal-dialog{
    display: table;
    position: relative;
    margin: 0 auto;
    top: calc(50% - 24px);
}

.bd-example-modal-lg .modal-dialog .modal-content{
    background-color: transparent;
    border: none;
}
</style>

<link rel="stylesheet" href="asset/css/bootstrap.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="asset/js/pdfexport/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="asset/js/bootstrap.min.js"></script>

<!-- Script for searching lrn -->
<script>
$(document).ready(function() {        
    $("#verifylrn").click(function() {
        
        // Must fixed value
        var A1 = $('#A1').val(); 
        var A4 = $('#A4').val(); 
        var A5 = $('#A5').val(); 
        var A11 = $('#A11').val(); 
        var A12 = $('#A12').val(); 
        var A13 = $('#A13').val(); 

        var selectType = document.getElementById("A00").value;
        var a = document.getElementsByClassName("myDiv");
        var x = document.getElementsByClassName("myDiv");
        var lrn = $('#search').val();  
        var message = $('#message'); 
        console.log(lrn);
        $.ajax({
                    type: "GET",
                    url: "getlevel.php?search="+lrn,
                    data: {},
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",                    
                    cache: false,                       
                    success: function(response) {     
                        /*       
                        https://programmingfields.com/jquery-ajax-example-for-loading-data-in-php/            
                        var trHTML = '';
                            $.each(response, function (i, item) {
                                trHTML +=    '<tr><td>' + item.first_name + '</td><td>' + item.last_name +
                            '</td><td>' + item.email + '</td><td>' + item.address + '</td><td>' + item.city +
                            '</td><td>' + item.state + '</td><td>' + item.zip_code + '</td></tr>';
                            });
                            $('#firstTable').append(trHTML);
                        */
                   
                            //school info
                            $('.withLrn').prop("checked", true);
                            $('#A3').val(response[0]['returning']); 
                            $('#A6').val(response[0]['SchoolYear']); 
                            $('#A7').val(response[0]['schooltoenroll']); 
                            $('#A8').val(response[0]['schoolid2']); 
                            $('#A9').val(response[0]['schooladdress2']); 
                            $('#A10').val(response[0]['schooltype']); 

                            //student info
                            $('#B1').val(response[0]['psa']); 
                            $('#B2').val(response[0]['lrn']);                                   
                            $('#B4').val(response[0]['firstname']); 
                            $('#B3').val(response[0]['lastname']); 
                            $('#B5').val(response[0]['middlename']); 
                            $('#B6').val(response[0]['extension']); 
                            $('#B7').val(response[0]['birthday']); 
                            $('#B8').val(response[0]['age']); 
                            $('#B9').val(response[0]['sex']); 
                            $('#B10').val(response[0]['ethnicgroup']); 
                            $('#B12').val(response[0]['mothertongue']); 
                            $('#religion').val(response[0]['religion']); 
                            $('#modality').val(response[0]['modality']); 
                            $('#4ps').val(response[0]['4Ps']); 

                            //Special Education Learner info
                            $('#B14').val(response[0]['spedneeds']); 
                            $('#B15').val(response[0]['specifyneeds']);  
                            
                            $('.B151').show();
                            $('.spedlink').show();
                            $('#B151').val(response[0]['specifyneeds2']);  
                                          
                            $('#B16').val(response[0]['assistivetech']); 
                            $('#B17').val(response[0]['specifyassistivetech']);

                            //Address info
                            $('#street').val(response[0]['street']); 
                            $('#barangay').val(response[0]['barangay']); 
                            $('#municipality').val(response[0]['municipality']); 
                            $('#province').val(response[0]['province']); 
                            $('#region').val(response[0]['region']); 

                            //Parents and Guardian info
                            $('#father').val(response[0]['fname']); 
                            $('#mother').val(response[0]['mname']); 
                            $('#guardian').val(response[0]['gname']); 

                            $('#fathereducattainment').val(response[0]['feducattain']); 
                            $('#mothereducattainment').val(response[0]['meducattain']); 
                            $('#guardianeducattainment').val(response[0]['geducattain']); 

                            $('#fatheremployment').val(response[0]['femploystatus']); 
                            $('#motheremployment').val(response[0]['memploystatus']); 
                            $('#guardianemployment').val(response[0]['gemploystatus']); 

                            $('#fatherWFH').val(response[0]['fwfh']); 
                            $('#motherWFH').val(response[0]['mwfh']); 
                            $('#guardianWFH').val(response[0]['gwfh']); 

                            $('#fathercontact').val(response[0]['fcontactno']); 
                            $('#mothercontact').val(response[0]['mcontactno']); 
                            $('#guardiancontact').val(response[0]['gcontactno']); 

                            $('#guardianrelate').val(response[0]['grelationship']); 

                            $('#stud_id').val(response[0]['student_id']); 

                            message.css("color", "blue");
                            message.html("Data is found.");    

                            for (var i = 0, len = x.length; i < len; i++) { 
                                x[i].style.display = "block";
                                $("#admit").hide(); 
                                $("#readmit").show(); 
                            }
                    },
                    error: function (x,e) {
                        message.css("color", "red");
                        message.html("Data is not found.");

                        if(selectType == "Regular"){
                            $('.spedlink').hide();
                            $('.myDiv').hide();
                        }
                        else{
                            $("#admit").show(); 
                            $("#readmit").hide(); 
                            $('.myDiv').show();
                        }
                        
                       
                        if (x.status==0) {
                            alert('You are offline!!\n Please Check Your Network.');
                        } else if(x.status==404) {
                            alert('Requested URL not found.');
                        } else if(x.status==500) {
                            alert('Internal Server Error.');
                        } else if(e=='parsererror') {
                            alert('Error, parsing JSON request failed.');
                        } else if(e=='timeout'){
                            alert('Request Time out.');
                        } else {
                            alert('Unknow Error.\n'+ x.responseText);
                        }

                       //$('.myDiv').find(':input').val('');
                       //$('.myDiv')[0].reset();
                        //reset fields 
                       $('.myDiv').find(':input').each(function() {
                        switch(this.type) {                              
                            case 'text':
                            case 'textarea':
                            case 'date':
                            case 'number':
                            case 'tel': 
                                jQuery(this).val('');
                                break;
                            case 'checkbox':
                            case 'radio':
                                this.checked = false;
                                break;                  
                            }
                        });
                            $('#B9').prop('selectedIndex',0);
                            $('#B10').prop('selectedIndex',0);
                            $('#B12').prop('selectedIndex',0);
                            $('#religion').prop('selectedIndex',0);
                            $('#modality').prop('selectedIndex',0);
                            $('#4ps').prop('selectedIndex',0);
                            $('#B14').prop('selectedIndex',0);
                            $('#B16').prop('selectedIndex',0);
                            $('#fathereducattainment').prop('selectedIndex',0);
                            $('#fatheremployment').prop('selectedIndex',0);
                            $('#fatherWFH').prop('selectedIndex',0);
                            $('#mothereducattainment').prop('selectedIndex',0);
                            $('#motheremployment').prop('selectedIndex',0);
                            $('#motherWFH').prop('selectedIndex',0);
                            $('#guardianeducattainment').prop('selectedIndex',0);
                            $('#guardianemployment').prop('selectedIndex',0);
                            $('#guardianWFH').prop('selectedIndex',0);
                            $('#A1').val(A1); 
                            $('#A4').val(A4); 
                            $('#A5').val(A5); 
                            $('#A11').val(A11); 
                            $('#A12').val(A12); 
                            $('#A13').val(A13); 
                                                                                    
                    }
            });                 
    });        
});
</script>


<!-- Script for checking lrn if already existing -->
<script>
$(document).ready(function(){
    $('.check_email').focusout(function (e){
        var lrn = $('.check_email').val();
        $.ajax({
            type:"POST",
            url: "getlevel.php",
            data: {checklrn:lrn},
            success: function (response){
          
                if (response.indexOf("Sorry, LRN is already in used.") > -1) 
                {
                   $('.feedback').text(response);
                   $('.check_email').val('');
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

<!-- For enrollment ended css design -->
<style>			
    * {
        -webkit-box-sizing: border-box;
                box-sizing: border-box;
     }

      #notfound {
        position: relative;
        height: 100vh;
        background-color: #f2f7ff;
      }
      
      #notfound .notfound {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
      }
      
      .notfound {
        max-width: 520px;
        width: 100%;
        text-align: center;
      }
      
      .notfound .notfound-bg {
        position: absolute;
        left: 0px;
        right: 0px;
        top: 50%;
        -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
                transform: translateY(-50%);
        z-index: -1;
      }
      
      .notfound .notfound-bg > div {
        width: 100%;
        background: #fff;
        border-radius: 90px;
        height: 150px;
      }
      
      .notfound .notfound-bg > div:nth-child(1) {
        -webkit-box-shadow: 5px 5px 0px 0px #f3f3f3;
                box-shadow: 5px 5px 0px 0px #f3f3f3;
      }
      
      .notfound .notfound-bg > div:nth-child(2) {
        -webkit-transform: scale(1.3);
            -ms-transform: scale(1.3);
                transform: scale(1.3);
        -webkit-box-shadow: 5px 5px 0px 0px #f3f3f3;
                box-shadow: 5px 5px 0px 0px #f3f3f3;
        position: relative;
        z-index: 10;
      }
      
      .notfound .notfound-bg > div:nth-child(3) {
        -webkit-box-shadow: 5px 5px 0px 0px #f3f3f3;
                box-shadow: 5px 5px 0px 0px #f3f3f3;
        position: relative;
        z-index: 90;
      }
      
      .notfound h1 {
        font-family: 'Quicksand', sans-serif;
        font-size: 86px;
        text-transform: uppercase;
        font-weight: 700;
        margin-top: 0;
        margin-bottom: 8px;
        color: #151515;
      }
      
      .notfound h2 {
        font-family: 'Quicksand', sans-serif;
        font-size: 26px;
        margin: 0;
        font-weight: 700;
        color: #151515;
      }
      .notfound h4 {
        font-family: 'Quicksand', sans-serif;
        font-size: 15px;
        margin: 0;
        font-weight: 700;
        color: #151515;
      }
      
      .notfound a {
        font-family: 'Quicksand', sans-serif;
        font-size: 14px;
        text-decoration: none;
        text-transform: uppercase;
        background: #18e06f;
        display: inline-block;
        padding: 15px 30px;
        border-radius: 5px;
        color: #fff;
        font-weight: 700;
        margin-top: 20px;
      }
      
      .notfound-social {
        margin-top: 20px;
      }
      
      .notfound-social>a {
        display: inline-block;
        height: 40px;
        line-height: 40px;
        width: 40px;
        font-size: 14px;
        color: #fff;
        background-color: #dedede;
        margin: 3px;
        padding: 0px;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
      }
      .notfound-social>a:hover {
        background-color: #18e06f;
      }
      
      @media only screen and (max-width: 767px) {
          .notfound .notfound-bg {
            width: 287px;
            margin: auto;
          }
      
          .notfound .notfound-bg > div {
            height: 150px;
        }
      }
      
      @media only screen and (max-width: 480px) {
        .notfound h1 {
          font-size: 10px;
        }
      
        .notfound h2 {
          font-size: 18px;
        }
      }
</style>


