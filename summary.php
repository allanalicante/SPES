<?php 
session_start();
include_once('includes/head_html.php'); 
include('connect.php'); 

if($_REQUEST == 'POST'){ 
        print_r(htmlentities($_POST));  
}
?>
<link href="asset/css/autocomplete.css" rel="stylesheet">
<script src="asset/js/jquery-1.9.1.js"></script>
<script src="asset/js/autocomplete.js"></script>

<!-- Script to hide combobox and divs -->
<script type="text/javascript">
          $(document).ready(function () 
          {
            var stud_id = document.getElementById("stud_id").value;
            var readmit = document.getElementById("readmit");
            var admit = document.getElementById("admit");

            console.log(stud_id);

            if(document.getElementById("stud_id").value == "")
            {
                $('#readmit').hide();    
                $('#admit').show();            
            }
            else
            {
                $('#readmit').show();
                $('#admit').hide();  
            }
             
        });
</script>

<script type="text/javascript">
          $(document).ready(function () 
          {
            if(document.getElementById("B14").value == "No")
            {
                $('.spedlink').hide(); 
                $('.B151').hide();
                $('#bb17').hide();            
            }
            else if(document.getElementById("B14").value == "Yes")
            {
                $('.spedlink').show(); 
                $('.B151').show();
                  

                if (document.getElementById("B16").value == "No") {
                $('#bb17').hide();  
                }
                else if (document.getElementById("B16").value == "Yes") {
                $('#bb17').show();
                }
            }  

            
             
        });
</script>
<!-- Disable input fields script in sped area-->
<script>
    window.special = function () {
    var b15 = document.getElementsByClassName("spedlink");
    
    if (document.getElementById("B14").value == "No") {
        $('.spedlink').hide();
        $('.B151').hide();
        $('#bb17').hide();  
    } else if (document.getElementById("B14").value == "Yes") {
        $('.spedlink').show();
        $('.spedlink').show(); 
        $('.B151').show();
        $('#bb17').show();  
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
    function enable(){
        var check = document.getElementById("check");
        var admit = document.getElementById("admit");
        var readmit = document.getElementById("readmit");

        if(check.checked){
            $('#readmit').prop('disabled', false);
            $('#admit').prop('disabled', false);
        }
        else {
            $('#readmit').prop('disabled', true);
            $('#admit').prop('disabled', true);
        }
    }
    function thisenable(){
        if ($('.checkothers').is(':checked')) {
	// this checkbox is checked
        $('.B151').show();  
        }
        else{
            $('.B151').hide();   
        }
    }    
    
</script>
<!-- Print -->
<script>
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("mybuttons");
            //Set the print button visibility to 'hidden' 
            printButton.style.visibility = 'hidden';
            //Print the page content
            window.print()
            printButton.style.visibility = 'visible';
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


<form autocomplete="off" name="main" method="POST" action="MyCrud.php" enctype="multipart/form-data">
    
        <div id="main" style="margin-left:20px">
            <header class="mb-3">
            <h3 style="text-align: center">SUMMARY OF LEARNER'S</h3>
            <h3 style="text-align: center">ENROLLMENT AND SURVEY FORM</h3>
            </header>

        
  <!-------------------------------------GRADE LEVEL AND SCHOOL INFORMATION ---------------------------------------------------------->     
            <section class="section myDiv">
                   <div class="card ">
                        <div style="background-color: lightgray" class="card-header">
                            <h4 class="card-title">A. GRADE LEVEL AND SCHOOL INFORMATION</h4>
                            <input type="text" id="stud_id" name="stud_id" value="<?php echo isset($_POST['stud_id']) ? $_POST['stud_id'] : ""?>">                            
                        </div>
                        <br>
                    
                        <div class="card-body">
                            <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label for="basicInput">A1. School Year</label>
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

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="helpInputTop">A2. LRN <span style="color: red; font-weight: 900">  *</span></label>                                     
                                            <input  class="form-control" type="text" id="A2" name="A2" value="<?php echo isset($_POST['A2']) ? $_POST['A2'] : ""?>" onchange="myLrn()" required>
                                        </div>  
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="photo">A3. Returning (Balik-aral) <span style="color: red; font-weight: 900;">  *</span></label>
                                            <input type="text" class="form-control" name="A3" id="A3" value="<?php echo isset($_POST['A3']) ? $_POST['A3'] : ""?>" required>   
                                        </div>
                                    </div>
                            </div>

                            <div class="row">
                                    <div class="col-md-3">
                                            <div class="form-group">
                                            <label for="photo">A4. Grade Level to enroll</label>
                                            <select class="form-select mb-3" aria-label=".form-select-lg example" name="A4" id="A4"  required>
                                            <option disabled selected >Open this select menu</option>
                                                <?php    
                                                $query = "SELECT * FROM `gradelevel_tbl`";
                                                $query_run = mysqli_query($connection, $query);
                                                
                                                while($row=$query_run->fetch_assoc()){  

                                                ?>     
                                                <option value="<?php echo $row['id']?>" <?php echo isset($_POST['A4']) &&  $_POST['A4']==$row['id']?'selected':'' ?> ><?php echo $row['grade'];?></option>
                                                <?php  
                                                }
                                                ?>  
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label for="basicInput">A5. Last grade level completed</label>
                                            <input type="text" readonly class="form-control" name="A5" id="A5" value="<?php echo isset($_POST['A5']) ? $_POST['A5'] : ""?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label for="basicInput">A6. Last school year completed</label>
                                            <input type="text" class="form-control" name="A6" id="A6" value="<?php echo isset($_POST['A6']) ? $_POST['A6'] : ""?>">
                                        </div>
                                    </div>
                                </div>

                            <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label for="basicInput">A7. Last school attended</label>
                                            <input type="text" class="form-control" name="A7" id="A7" value="<?php echo isset($_POST['A7']) ? $_POST['A7'] : ""?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label for="basicInput">A8. School ID</label>
                                            <input type="number" class="form-control" name="A8" id="A8" value="<?php echo isset($_POST['A8']) ? $_POST['A8'] : ""?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label for="basicInput">A9. School Address</label>
                                            <input type="text" class="form-control" name="A9" id="A9" value="<?php echo isset($_POST['A9']) ? $_POST['A9'] : ""?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="photo">A10. School Type <span style="color: red; font-weight: 900;">  *</span></label>
                                            <input type="text" class="form-control" name="A10" id="A10" value="<?php echo isset($_POST['A10']) ? $_POST['A10'] : ""?>" required>
                                        </div>
                                    </div>
                            </div>

                            <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label for="basicInput">A11. School to enroll in</label>
                                            <input type="text" class="form-control" name="A11" id="A11" 
                                            value ="Sorsogon Pilot Elementary School" placeholder="Sorsogon Pilot Elementary School" 
                                            readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label for="basicInput">A12. School ID</label>
                                            <input type="text" class="form-control" name="A12" id="A12"
                                            value="114581" placeholder="114581" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label for="basicInput">A13. School Address</label>
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
                <!-----------------------------STUDENT INFORMATION --------------------------------------------------------------->
            <section class="section myDiv">
                    <div class="card ">
                        <div style="background-color: lightgray" class="card-header">
                            <h4 class="card-title">B. STUDENT INFORMATION</h4>
                        </div>
                        <br>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="basicInput">B1. PSA Birth Certificate No.</label>
                                        <input type="text" class="form-control" id="B1" name="B1" value="<?php echo isset($_POST['B1']) ? $_POST['B1'] : ""?>">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="helpInputTop">B2. LRN</label>
                                        <small class="text-muted">(<i>Learners Reference No.</i>)</small><span style="color: red; font-weight: 900;">  *</span>
                                        <input type="tel" class="form-control" id="B2" name="B2" maxlength="12" value="<?php echo isset($_POST['B2']) ? $_POST['B2'] : ""?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                        <label for="photo">Student Photo <span style="color: red; font-weight: 900;">  *</span><!-- <i style="color: red; font-size: 12px"> (Note: Recommended file size: 1-5 mb.)</i> --></label>
                                        <input name="photo" type="file" class="form-control" id="photo" value="<?php echo isset($_POST['photo']) ? $_POST['photo'] : ""?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="helpInputTop">Name<span style="color: red; font-weight: 900;">  *</span></label>
                                <div class="col-md-3">                                    
                                    <input type="text" class="form-control" id="B3" name="B3" placeholder="B3. Last Name" value="<?php echo isset($_POST['B3']) ? $_POST['B3'] : ""?>" required>  
                                </div>
                                <div class="col-md-3">    
                                    <input type="text" class="form-control"id="B4" name="B4" placeholder="B4. First Name" value="<?php echo isset($_POST['B4']) ? $_POST['B4'] : ""?>" required>                                        
                                </div>
                                <div class="col-md-3">    
                                    <input type="text" class="form-control" id="B5" name="B5" placeholder="B5. Middle Name" value="<?php echo isset($_POST['B5']) ? $_POST['B5'] : ""?>" required>                                        
                                </div>
                                <div class="col-md-2">    
                                    <input type="text" class="form-control" id="B6" name="B6" placeholder="B6. Jr., II" value="<?php echo isset($_POST['B6']) ? $_POST['B6'] : ""?>">                                        
                                </div>
                            </div>
                            
                            <br/>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="basicInput">B7. Birthday <span style="color: red; font-weight: 900;">  *</span></label>
                                        <input type="date" class="form-control" id="B7" name="B7" onchange="ageCalculator()" value="<?php echo isset($_POST['B7']) ? $_POST['B7'] : ""?>" required>
                                    </div>
                                </div>
                    
                                <div class="col-md-1">
                                    <div class="form-group ">
                                        <label for="basicInput">B8. Age <span style="color: red; font-weight: 900;">  *</span></label>
                                        <input type="tel" maxlength="2" class="form-control" id="B8" name="B8" value="<?php echo isset($_POST['B8']) ? $_POST['B8'] : ""?>"required>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="basicInput">B9. Sex <span style="color: red; font-weight: 900;">  *</span></label>
                                        <input type="text" class="form-control" id="B9" name="B9" value="<?php echo isset($_POST['B9']) ? $_POST['B9'] : ""?>" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group ">
                                    <label for="helpInputTop">B10. Indigenous Group <span style="color: red; font-weight: 900;">  *</span></label>
                                        <small class="text-muted">(<i>Ethnic Group</i>)</small>
                                        <input type="text" class="form-control" id="B10" name="B10" value="<?php echo isset($_POST['B10']) ? $_POST['B10'] : ""?>" required>
                                    </div>
                                </div>                      
                            </div>

                            <div class="row">                                       
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="basicInput">B12. Mother Tongue <span style="color: red; font-weight: 900;">  *</span></label>
                                        <input type="text" class="form-control" id="B12" name="B12" value="<?php echo isset($_POST['B12']) ? $_POST['B12'] : ""?>" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="helpInputTop">Religion <span style="color: red; font-weight: 900;">  *</span></label>
                                        <input type="text" class="form-control" id="religion" name="religion" value="<?php echo isset($_POST['religion']) ? $_POST['religion'] : ""?>" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group ">
                                        <label for="helpInputTop">Learning Mode <span style="color: red; font-weight: 900;">  *</span></label>
                                        <input type="text" class="form-control" id="modality" name="modality" value="<?php echo isset($_POST['modality']) ? $_POST['modality'] : ""?>" required> 
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group ">
                                        <label for="helpInputTop">4Ps Member <span style="color: red; font-weight: 900;">  *</span></label>
                                        <input type="text" class="form-control" id="4ps" name="4ps" value="<?php echo isset($_POST['4ps']) ? $_POST['4ps'] : ""?>" required>
                                    </div>
                                </div>
                            </div>                                 
                        </div>
                    </div>
            </section>
        <!----------------------------------FOR LEARNERS WITH SPECIAL EDUCATION NEEDS ------------------------------------------------------>
            <section id="basic-vertical-layouts" class="myDiv">
                    <div class="row match-height">
                        <div class="col-md-7 col-12">
                            <div class="card ">
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
                                                        <label for="select-special-type">B14. Does the learner have special education needs? <span style="color: red; font-weight: 900;">  *</span></label>
                                                            <div class="col-6">
                                                            <select class="form-select mb-3" aria-label=".form-select-lg example" id="B14" name="B14" onchange="special()" required>
                                                            <option value="No" <?php echo isset($_POST['B14']) &&  $_POST['B14']=="No" ? 'selected': ""?>>No</option>  
                                                            <option value="Yes" <?php echo isset($_POST['B14']) &&  $_POST['B14']=="Yes" ? 'selected': ""?>>Yes</option>                
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-12">
                                                        <div class="form-group spedlink">
                                                                <label for="basicInput">B15. If yes, Choose all that applies.
                                                                </label>  
                                                                    <div class="row">                                                                                                                        
                                                                        <div class="col">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input checkothers" type="checkbox" name="B15[]" value="Mental Retardation" onclick="thisenable()" <?php echo isset($_POST['B15']) && (in_array('Mental Retardation',$_POST['B15'])) ? 'checked':""?>>
                                                                                <label class="form-check-label" >Mental Retardation</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input checkothers" type="checkbox" name="B15[]" value="Hearing Impairment" onclick="thisenable()" <?php echo isset($_POST['B15']) && (in_array('Hearing Impairment',$_POST['B15'])) ? 'checked':""?>>
                                                                                <label class="form-check-label" >Hearing Impairment</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input checkothers" type="checkbox" name="B15[]" value="Visual Impairmentlexia" onclick="thisenable()" <?php echo isset($_POST['B15']) && (in_array('Visual Impairmentlexia',$_POST['B15'])) ? 'checked':""?>>
                                                                                <label class="form-check-label" >Visual Impairment</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input checkothers" type="checkbox" name="B15[]" value="Autism" onclick="thisenable()" <?php echo isset($_POST['B15']) && (in_array('Autism',$_POST['B15'])) ? 'checked':""?>>
                                                                                <label class="form-check-label" >Autism</label>
                                                                            </div> 
                                                                        
                                                                        </div>

                                                                        <div class="col">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input checkothers" type="checkbox" name="B15[]" value="Multiple Disabilities" onclick="thisenable()" <?php echo isset($_POST['B15']) && (in_array('Multiple Disabilities',$_POST['B15'])) ? 'checked':""?>>
                                                                                <label class="form-check-label" >Multiple Disabilities</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input checkothers" type="checkbox" name="B15[]" value="Physical Disabilities & Health Impairment" onclick="thisenable()" <?php echo isset($_POST['B15']) && (in_array('Physical Disabilities & Health Impairment',$_POST['B15'])) ? 'checked':""?>>
                                                                                <label class="form-check-label" >Physical Disabilities & Health Impairment</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input checkothers" type="checkbox" name="B15[]" value="Giftedness" onclick="thisenable()" <?php echo isset($_POST['B15']) && (in_array('Giftedness',$_POST['B15'])) ? 'checked':""?>>
                                                                                <label class="form-check-label" >Giftedness</label>
                                                                            </div>     
                                                                            <div class="form-check">
                                                                                <input class="form-check-input checkothers" type="checkbox" name="B15[]" value="Others" onclick="thisenable()" <?php echo isset($_POST['B15']) && (in_array('Others',$_POST['B15'])) ? 'checked':""?>>
                                                                                <label class="form-check-label" >Others</label>
                                                                            </div>                                          
                                                                        </div>  
                                                                    </div>                                                                  
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group B151">
                                                            <label for="specify2-info-vertical">Please specify</label>
                                                            <input type="text" class="form-control" id="B151" name="B151" value="<?php echo isset($_POST['B151']) ? $_POST['B151'] : ""?>">
                                                                
                                                        </div>
                                                    </div>  
                                                                                            
                                                    <div class="col-12">
                                                        <div class="form-group spedlink">
                                                        <label for="select-assistive-type">B16. Do you have any assistive technology available at home? 
                                                            (i.e. Screen Reader, Braille, Daisy) <span style="color: red; font-weight: 900;">  *</span></label>
                                                            <div class="col-6">
                                                            <select class="form-select mb-3" aria-label=".form-select-lg example" id="B16" name="B16" onchange="assistive(); special2();" value="<?php echo isset($_POST['B16']) ? $_POST['B16'] : ""?>" required>
                                                            <option value="No">No</option>
                                                            <option value="Yes">Yes</option>
                                                            
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group Bb17" id="bb17">
                                                            <label for="specify2-info-vertical">B17. If yes, please specify</label>
                                                            <input type="text" class="form-control" id="B17" name="B17" value="<?php echo isset($_POST['B17']) ? $_POST['B17'] : ""?>">
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
        <!-----------------------------------ADDRESS INFORMATION ------------------------------------------------------>
                    <div class="col-md-5 col-12">
                            <div class="card "><!----------------- ADDRESS CARD --------------------------->
                                <div style="background-color: lightgray" class="card-header">
                                    <h4 class="card-title">ADDRESS</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form form-vertical">
                                            <div class="form-body ">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="house-info-vertical">House No. and Street</label>
                                                            <input type="text" class="form-control" id="street" name="street" value="<?php echo isset($_POST['street']) ? $_POST['street'] : ""?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group autocomplete">
                                                            <label for="barangay-info-vertical">Barangay <span style="color: red; font-weight: 900;">  *</span></label>
                                                            <input type="text" class="form-control" id="barangay" name="barangay" value="<?php echo isset($_POST['barangay']) ? $_POST['barangay'] : ""?>" required>                                                                 
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group autocomplete">
                                                            <label for="city-info-vertical">City / Municipality <span style="color: red; font-weight: 900;">  *</span></label>
                                                            <input type="text" class="form-control" id="municipality" name="municipality" value="<?php echo isset($_POST['municipality']) ? $_POST['municipality'] : ""?>" required>                                                                                
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group autocomplete">
                                                            <label for="province-info-vertical">Province <span style="color: red; font-weight: 900;">  *</span></label>
                                                            <input type="text" class="form-control" id="province" name="province" value="<?php echo isset($_POST['province']) ? $_POST['province'] : ""?>" required>
                                                        </div>    
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="Region-info-vertical">Region <span style="color: red; font-weight: 900;">  *</span></label>
                                                            <input type="text" value="V" placeholder="V" readonly class="form-control" id="region" name="region" required>    
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
                    </div>
            </section>
        <!--------------------------------------PARENT / GUARDIAN INFORMATION--------------------------------------------------------------->
            <section class="section myDiv">
                    <div class="card ">
                        <div style="background-color: lightgray" class="card-header">
                            <h4 class="card-title">C. PARENT  / GUARDIAN INFORMATION</h4>                          
                        </div>
                        <br>
                      
                        <div class="card-body">
                            <div class="row">
                                    <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group ">
                                            <label for="fathername">Father's Full Name <span style="color: red; font-weight: 900;">  *</span></label>
                                            <input type="text" class="form-control" id="father" name="father" value="<?php echo isset($_POST['father']) ? $_POST['father'] : ""?>" >
                                        </div>
                                    </div>
                                    <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group ">
                                            <label for="mothername">Mother's Full Name <span style="color: red; font-weight: 900;">  *</span></label>
                                            <input type="text" class="form-control" id="mother" name="mother" value="<?php echo isset($_POST['mother']) ? $_POST['mother'] : ""?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="guardianname">Guardian's Full Name <span style="color: red; font-weight: 900;">  *</span></label>
                                            <input type="text" class="form-control" id="guardian" name="guardian" value="<?php echo isset($_POST['guardian']) ? $_POST['guardian'] : ""?>"required>
                                        </div>
                                    </div>
                            </div>
                            <!-- =-------------------------------------------------------------------------------------------------------- -->
                            <div class="row">                                          
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group">
                                                <label for="fathereducation">Highest Educational Attainment</label>
                                                <input type="text" class="form-control" id="fathereducattainment" name="fathereducattainment" value="<?php echo isset($_POST['fathereducattainment']) ? $_POST['fathereducattainment'] : ""?>">
                                            </div>
                                 </div>
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group">
                                                <label for="mothereducation">Highest Educational Attainment</label>
                                                <input type="text" class="form-control" id="mothereducattainment" name="mothereducattainment" value="<?php echo isset($_POST['mothereducattainment']) ? $_POST['mothereducattainment'] : ""?>">
                                            </div>
                                 </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                                <label for="guardianeducation">Highest Educational Attainment <span style="color: red; font-weight: 900;">  *</span></label>
                                                <input type="text" class="form-control" id="guardianeducattainment" name="guardianeducattainment" value="<?php echo isset($_POST['guardianeducattainment']) ? $_POST['guardianeducattainment'] : ""?>" required>
                                            </div>
                                 </div>                                  
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------  -->
                            <div class="row">                                          
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group">
                                                <label for="fatheremployment">Employment Status</label>
                                                <input type="text" class="form-control" id="fatheremployment" name="fatheremployment" value="<?php echo isset($_POST['fatheremployment']) ? $_POST['fatheremployment'] : ""?>">
                                            </div>
                                 </div>
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group">
                                                <label for="motheremployment">Employment Status</label>
                                                <input type="text" class="form-control" id="motheremployment" name="motheremployment" value="<?php echo isset($_POST['motheremployment']) ? $_POST['motheremployment'] : ""?>">
                                            </div>
                                 </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                                <label for="guardianemployment">Employment Status <span style="color: red; font-weight: 900;">  *</span></label>
                                                <input type="text" class="form-control" id="guardianemployment" name="guardianemployment" value="<?php echo isset($_POST['guardianemployment']) ? $_POST['guardianemployment'] : ""?>" required>
                                            </div>
                                 </div>                                   
                            </div>    
                            <!-- ------------------------------------------------------------------------------------------------ -->
                            
                            <div class="row">                                          
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group">
                                                <label for="fatherWFH">Working from home due to ECQ?</label>
                                                <input type="text" class="form-control" id="fatherWFH" name="fatherWFH" value="<?php echo isset($_POST['fatherWFH']) ? $_POST['fatherWFH'] : ""?>">
                                         </div>
                                 </div>
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group">
                                                <label for="motherWFH">Working from home due to ECQ?</label>
                                                <input type="text" class="form-control" id="motherWFH" name="motherWFH" value="<?php echo isset($_POST['motherWFH']) ? $_POST['motherWFH'] : ""?>">
                                         </div>
                                 </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                                <label for="guardianWFH">Working from home due to ECQ? <span style="color: red; font-weight: 900;">  *</span></label>
                                                <input type="text" class="form-control" id="guardianWFH" name="guardianWFH" value="<?php echo isset($_POST['guardianWFH']) ? $_POST['guardianWFH'] : ""?>" required>
                                         </div>
                                 </div>
                            </div>
                            <!-- ------------------------------------------------------------------------------------------------------------- -->

                            <div class="row">
                                    <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group ">
                                            <label for="fathercontact">Contact Number/s (cellphone/telephone)</label>
                                            <input type="tel" maxlength="11" class="form-control" id="fathercontact" name="fathercontact" value="<?php echo isset($_POST['fathercontact']) ? $_POST['fathercontact'] : ""?>">
                                        </div>
                                    </div>
                                    <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group ">
                                            <label for="mothercontact">Contact Number/s (cellphone/telephone)</label>
                                            <input type="tel" maxlength="11" class="form-control" id="mothercontact" name="mothercontact" value="<?php echo isset($_POST['mothercontact']) ? $_POST['mothercontact'] : ""?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="guardiancontact">Contact Number/s (cellphone/telephone) <span style="color: red; font-weight: 900;">  *</span></label>
                                            <input type="tel" maxlength="11" class="form-control" id="guardiancontact" name="guardiancontact" value="<?php echo isset($_POST['guardiancontact']) ? $_POST['guardiancontact'] : ""?>" required>
                                            <br>
                                            <label for="guardiancontact">Relationship to the Guardian <span style="color: red; font-weight: 900;">  *</span></label>
                                            <input type="text" class="form-control" id="guardianrelate" name="guardianrelate" value="<?php echo isset($_POST['guardianrelate']) ? $_POST['guardianrelate'] : ""?>" required>
                                        </div>
                                    </div>
                            </div>
                          
                        </div>
                        </div>
            </section>
        <!-------------------------------------- HOUSEHOLD CAPACITY AND ACCESS TO DISTANCE LEARNING--------------------------------------------------------------->
            <section class="section myDiv">
                      <div class="card "><!-- Household Survey -->
                        <div style="background-color: lightgray" class="card-header">
                            <h4 class="card-title">D. HOUSEHOLD CAPACITY AND ACCESS TO DISTANCE LEARNING</h4>                          
                         </div>
                                <br>        
                                <div class="card-body">
                                    <div class="row">            

                                        <!-- D1 & D3 -->
                                        <div style="border-right: solid 1px gray" class="col-md-6">
                                            <div class="form-group">
                                                <label for="helpInputTop">D1. How does your child go to school? Choose all that applies.</label>                                      
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"  name="D1[]" value="Walking" <?php echo isset($_POST['D1']) && (in_array('Walking',$_POST['D1'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">Walking</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"  name="D1[]" value="Public Commute (land/water)" <?php echo isset($_POST['D1']) && (in_array('Public Commute (land/water)',$_POST['D1'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">Public Commute (land/water)</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"  name="D1[]" value="Family-owned vehicle" <?php echo isset($_POST['D1']) && (in_array('Family-owned vehicle',$_POST['D1'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">Family-owned vehicle</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"  name="D1[]" value="School Service" <?php echo isset($_POST['D1']) && (in_array('School Service',$_POST['D1'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">School Service</label>
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">D3. Who among the household members can provide instructional support
                                                    to the child's distance learning? Choose all that applies.
                                                </label>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D3[]" value="Parents/Guardians" <?php echo isset($_POST['D3']) && (in_array('Parents/Guardians',$_POST['D3'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">Parents/Guardians</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D3[]" value="Elder siblings" <?php echo isset($_POST['D3']) && (in_array('Elder siblings',$_POST['D3'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">Elder siblings</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D3[]" value="Grandparents" <?php echo isset($_POST['D3']) && (in_array('Grandparents',$_POST['D3'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">Grandparents</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D3[]" value="Extended members of the family" <?php echo isset($_POST['D3']) && (in_array('Extended members of the family',$_POST['D3'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">Extended members of the family</label>
                                                            </div> 
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D3[]" value="Others(tutor, house helper)" <?php echo isset($_POST['D3']) && (in_array('Others(tutor, house helper)',$_POST['D3'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">Others(tutor, house helper)</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D3[]" value="none" <?php echo isset($_POST['D3']) && (in_array('none',$_POST['D3'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">none</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D3[]" value="able to do independent learning" <?php echo isset($_POST['D3']) && (in_array('able to do independent learning',$_POST['D3'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">able to do independent learning</label>
                                                            </div>                                             
                                                        </div> 

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- D2 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="basicInput">D2. How many of your household members (including the Enrollee) are
                                                    studying in the current School Year? Please specify each.
                                                </label>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Kinder</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]" value="<?php echo isset($_POST['D2']) ? ($_POST['D2'])[0] : ""?>">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 1</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]" value="<?php echo isset($_POST['D2']) ? ($_POST['D2'])[1] : ""?>"> 
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 2</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]" value="<?php echo isset($_POST['D2']) ? ($_POST['D2'])[2] : ""?>">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 3</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]" value="<?php echo isset($_POST['D2']) ? ($_POST['D2'])[3] : ""?>">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 4</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]" value="<?php echo isset($_POST['D2']) ? ($_POST['D2'])[4] : ""?>">
                                                                </div>
                                                        </div>

                                                        <div class="col">
                                                        <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 5</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]" value="<?php echo isset($_POST['D2']) ? ($_POST['D2'])[5] : ""?>">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 6</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]" value="<?php echo isset($_POST['D2']) ? ($_POST['D2'])[6] : ""?>">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 7</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]" value="<?php echo isset($_POST['D2']) ? ($_POST['D2'])[7] : ""?>">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 8</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]" value="<?php echo isset($_POST['D2']) ? ($_POST['D2'])[8] : ""?>">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 9</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]" value="<?php echo isset($_POST['D2']) ? ($_POST['D2'])[9] : ""?>">
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="col ">
                                                        <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 10</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]" value="<?php echo isset($_POST['D2']) ? ($_POST['D2'])[10] : ""?>">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 11</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]" value="<?php echo isset($_POST['D2']) ? ($_POST['D2'])[11] : ""?>"> 
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 12</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]" value="<?php echo isset($_POST['D2']) ? ($_POST['D2'])[12] : ""?>">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm"><i>Others</i></span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]" value="<?php echo isset($_POST['D2']) ? ($_POST['D2'])[13] : ""?>">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                            <label class="form-check-label" for="inlineCheckbox1"><i>(i.e college, vocational, etc.)</i></label>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        
                                        <!-- D4 -->
                                        <div style="border-right: solid 1px gray" class="col-md-6">
                                            <div class="form-group">
                                                <label for="basicInput">D4. What devices are available at home that the learner can use for learning?
                                                    Check all that applies.
                                                </label>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="cable tv" <?php echo isset($_POST['D4']) && (in_array('cable tv',$_POST['D4'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">cable tv</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="non-cable tv" <?php echo isset($_POST['D4']) && (in_array('non-cable tv',$_POST['D4'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">non-cable tv</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="basic cellphone" <?php echo isset($_POST['D4']) && (in_array('basic cellphone',$_POST['D4'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">basic cellphone</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="smartphone" <?php echo isset($_POST['D4']) && (in_array('smartphone',$_POST['D4'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">smartphone</label>
                                                            </div> 
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="tablet" <?php echo isset($_POST['D4']) && (in_array('tablet',$_POST['D4'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">tablet</label>
                                                            </div> 
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="radio" <?php echo isset($_POST['D4']) && (in_array('radio',$_POST['D4'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">radio</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="desktop computer" <?php echo isset($_POST['D4']) && (in_array('desktop computer',$_POST['D4'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">desktop computer</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="laptop" <?php echo isset($_POST['D4']) && (in_array('laptop',$_POST['D4'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">laptop</label>
                                                            </div>                                             
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="none" <?php echo isset($_POST['D4']) && (in_array('none',$_POST['D4'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">none</label>
                                                            </div>                                             
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm"><i>Others</i></span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D4[]" value="<?php echo isset($_POST['D4']) ? end($_POST['D4']) : ""?>">
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
                                                        <label for="basicInput">D5. Do you have a way to connect to the internet?
                                                        </label>
                                                            <div class="input-group">
                                                                <input class="form-control" type="text" name="D5" id="D5" value="<?php echo isset($_POST['D5']) ? $_POST['D5'] : ""?>">                                                               
                                                            </div>
                                                    </div>
                                                    <div class="col form-group">
                                                            <label for="basicInput">D6. How do you connect to the internet? Choose all that applies.
                                                            </label>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="D6[]" id="inlineCheckbox1" value="own mobile data" <?php echo isset($_POST['D6']) && (in_array('own mobile data',$_POST['D6'])) ? 'checked':""?>>
                                                                    <label class="form-check-label" for="inlineCheckbox1">own mobile data</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="D6[]" id="inlineCheckbox1" value="own broadband (DSL, wireless fiber, satellite)" <?php echo isset($_POST['D6']) && (in_array('own broadband (DSL, wireless fiber, satellite',$_POST['D6'])) ? 'checked':""?>>
                                                                    <label class="form-check-label" for="inlineCheckbox1">own broadband (DSL, wireless fiber, satellite)</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="D6[]" id="inlineCheckbox1" value="computer shop" <?php echo isset($_POST['D6']) && (in_array('computer shop',$_POST['D6'])) ? 'checked':""?>>
                                                                    <label class="form-check-label" for="inlineCheckbox1">computer shop</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="D6[]" id="inlineCheckbox1" value="other places outside the home with internet connection" <?php echo isset($_POST['D6']) && (in_array('other places outside the home with internet connection',$_POST['D6'])) ? 'checked':""?>>
                                                                    <label class="form-check-label" for="inlineCheckbox1">other places outside the home with internet connection</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="D6[]" id="inlineCheckbox1" value="none" <?php echo isset($_POST['D6']) && (in_array('none',$_POST['D6'])) ? 'checked':""?>>
                                                                    <label class="form-check-label" for="inlineCheckbox1">none</label>
                                                                </div>
                                                    </div>
                                                </div>
                                                    
                                            </div>
                                        </div>
                                    


                                        <!-- D7 -->
                                        <div style="border-right: solid 1px gray" class="col-md-6">
                                         <div class="form-group">
                                                <label for="basicInput">D7. What distance learning modalities do you prefer for 
                                                    your child? Choose all that applies.
                                                </label>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D7[]" id="inlineCheckbox1" value="online learning" <?php echo isset($_POST['D7']) && (in_array('online learning',$_POST['D7'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">online learning</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D7[]" id="inlineCheckbox1" value="television" <?php echo isset($_POST['D7']) && (in_array('television',$_POST['D7'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">television</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D7[]" id="inlineCheckbox1" value="radio" <?php echo isset($_POST['D7']) && (in_array('radio',$_POST['D7'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">radio</label>
                                                            </div>
                                                        
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D7[]" id="inlineCheckbox1" value="modular learning" <?php echo isset($_POST['D7']) && (in_array('modular learning',$_POST['D7'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">modular learning</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D7[]" id="inlineCheckbox1" value="combination of face to face with other modalities" <?php echo isset($_POST['D7']) && (in_array('combination of face to face with other modalities',$_POST['D7'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">combination of face to face with other modalities</label>
                                                            </div>                                                                                             
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm"><i>Others</i></span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D7[]" value="<?php echo isset($_POST['D7']) ? end($_POST['D7']) : ""?>">
                                                                </div>                                            
                                                        </div> 

                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                


                                        <!-- D8 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="basicInput">D8. What are the challenges that may affect your child's learning process
                                                    through distance education? Choose all that applies.
                                                </label>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="lack of available gadgets/equipment" <?php echo isset($_POST['D8']) && (in_array('lack of available gadgets/equipment',$_POST['D8'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">lack of available gadgets/equipment</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="insufficient load/data allowance" <?php echo isset($_POST['D8']) && (in_array('insufficient load/data allowance',$_POST['D8'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">insufficient load/data allowance</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="unstable internet connection" <?php echo isset($_POST['D8']) && (in_array('unstable internet connection',$_POST['D8'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">unstable internet connection</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="existing health condition" <?php echo isset($_POST['D8']) && (in_array('existing health condition',$_POST['D8'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">existing health condition</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="difficulty in independent learning" <?php echo isset($_POST['D8']) && (in_array('difficulty in independent learning',$_POST['D8'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">difficulty in independent learning</label>
                                                            </div> 
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="conflict with other activities" <?php echo isset($_POST['D8']) && (in_array('conflict with other activities',$_POST['D8'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">conflict with other activities</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="high electrical consumption" <?php echo isset($_POST['D8']) && (in_array('high electrical consumption',$_POST['D8'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">high electrical consumption</label>
                                                            </div>                                                                                             
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="distractions (i.e. social media, noise)" <?php echo isset($_POST['D8']) && (in_array('distractions (i.e. social media, noise)',$_POST['D8'])) ? 'checked':""?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">distractions (i.e. social media, noise)</label>
                                                            </div>                                                                                             
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm"><i>Others</i></span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D8[]" value="<?php echo isset($_POST['D8']) ? end($_POST['D8']) : ""?>">
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
        <!---------------------------------------Reset / Submit / Resubmit buttons----------------------------- -->                                          
                <section class="">
                    <div class="col-12 d-flex justify-content-end reset-btn" id="mybuttons">         
                        <a href="javascript:history.back()"><button type="button" class="btn btn-light-secondary me-1 mb-1">Back</button></a>
                        <button type="submit" id="readmit" name="readmitstudent" class="btn btn-success me-1 mb-1">Submit</button>
                        <button type="submit" id="admit" name="admitstudent" class="btn btn-primary me-1 mb-1">Submit</button>   
                        <button type="button" value="print" onclick="printpage()" class="btn btn-info me-1 mb-1">Print</button>     
                    </div>
                </section>
</form>