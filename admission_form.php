<?php
if (!isset($_SESSION["role"])){
    header('location: login.php');
    exit();
}
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- Disable input fields script -->
<script>
    window.special = function () {
    console.log(document.getElementById("B14").value);
    if (document.getElementById("B14").value == "No") {
        document.getElementById("B15").readOnly = true;
    } else {
        document.getElementById("B15").readOnly = "";
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

<script>
    // Script for calculating age based from date input 
function ageCalculator() {
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
    //automatic display of last grade enroll
/* function gradeCalculator(){
        var currentgrade = document.getElementById("A4").value;
        if(currentgrade == 1){          
            document.querySelector("#A5").value = "";
            document.getElementById("A5").readOnly = true;
            document.getElementById("A6").readOnly = true;
            document.getElementById("A7").readOnly = true;
            document.getElementById("A8").readOnly = true;
            document.getElementById("A9").readOnly = true;
            document.getElementById("A10").disabled = true;
        }
        else if (currentgrade == 2){
            document.querySelector("#A5").readOnly = true;
            document.getElementById("A5").value = "Kinder";       
            document.getElementById("A6").readOnly = "";
            document.getElementById("A7").readOnly = "";
            document.getElementById("A8").readOnly = "";
            document.getElementById("A9").readOnly = "";
            document.getElementById("A10").disabled = "";
        }
        else if (currentgrade == 3){
            document.querySelector("#A5").readOnly = true;
            document.getElementById("A5").value = "Grade 1";       
            document.getElementById("A6").readOnly = "";
            document.getElementById("A7").readOnly = "";
            document.getElementById("A8").readOnly = "";
            document.getElementById("A9").readOnly = "";
            document.getElementById("A10").disabled = "";
        }
        else if (currentgrade == 4){
            document.querySelector("#A5").readOnly = true;
            document.getElementById("A5").value = "Grade 2";       
            document.getElementById("A6").readOnly = "";
            document.getElementById("A7").readOnly = "";
            document.getElementById("A8").readOnly = "";
            document.getElementById("A9").readOnly = "";
            document.getElementById("A10").disabled = "";
        }
        else if (currentgrade == 5){
            document.querySelector("#A5").readOnly = true;
            document.getElementById("A5").value = "Grade 3";       
            document.getElementById("A6").readOnly = "";
            document.getElementById("A7").readOnly = "";
            document.getElementById("A8").readOnly = "";
            document.getElementById("A9").readOnly = "";
            document.getElementById("A10").disabled = "";
        }else if (currentgrade == 6){
            document.querySelector("#A5").readOnly = true;
            document.getElementById("A5").value = "Grade 4";       
            document.getElementById("A6").readOnly = "";
            document.getElementById("A7").readOnly = "";
            document.getElementById("A8").readOnly = "";
            document.getElementById("A9").readOnly = "";
            document.getElementById("A10").disabled = "";
        }
        else if (currentgrade == 7){
            document.querySelector("#A5").readOnly = true;
            document.getElementById("A5").value = "Grade 5";       
            document.getElementById("A6").readOnly = "";
            document.getElementById("A7").readOnly = "";
            document.getElementById("A8").readOnly = "";
            document.getElementById("A9").readOnly = "";
            document.getElementById("A10").disabled = "";
        }


} */
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
              y.style.display = "none";
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
</script>
<!-- Script to hide combobox and divs -->
<script type="text/javascript">
          $(document).ready(function () {
            $('.myDiv').hide();    // just add this
            $('.searchdiv').hide();    // just add this
            $('.type').hide();    // just add this
            $('#readmit').hide();
        });
</script>

<div id="app">
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

    <form name="main" method="POST" action="MyCrud.php" enctype="multipart/form-data">
    
  

        <div class="page-heading"> <!-- HEADING -->
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
                            <h6>5. Fields with (*) symbols are required to be fill in.</h6><br>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="photo">Grade Level to enroll</label><span id="id"></span>
                                        <select class="form-select mb-3" aria-label=".form-select-lg example" onchange="displayform()" name="A0" id="A0" required>
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
                                            <label for="photo">Select Student Type</label>
                                            <select class="form-select mb-3" aria-label=".form-select-lg example" onchange="verifyType()" name="A00" id="A00">
                                            <option disabled selected >Open this select menu</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Transferee">Transferee</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="searchdiv">
                                            <label for="search lrn">Search LRN</label> 
                                                <div class="input-group mb-3">                                               
                                                    <input type="text" class="form-control" name="search" id="search" >
                                                        <button  class="btn btn-primary" type="submit" id="verifylrn" onclick="modal()">                                                       
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

    <!------------------------------------------------- GRADE LEVEL AND SCHOOL INFORMATION ---------------------------------------------------------->
            
                        <section class="section myDiv">
                            <div class="card logbrand">
                                <div style="background-color: lightgray" class="card-header">
                                    <h4 class="card-title">A. GRADE LEVEL AND SCHOOL INFORMATION</h4>
                                    <input type="text" id="stud_id" name="stud_id">                            
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
                                                    <label for="helpInputTop">A2. Check the appropriate boxes only <span style="color: red">  *</span></label>                                     
                                                    <div class="form-check form-check-inline" >
                                                        <input  class="form-check-input noLrn" type="radio" id="A2" name="A2" value="No LRN" onchange="myLrn()" required>
                                                        <label class="form-check-label" for="html">No LRN</label><br>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                         <input  class="form-check-input withLrn" type="radio" id="A2" name="A2" value="With LRN" onchange="myLrn()" required>
                                                        <label class="form-check-label" for="css">With LRN</label><br>
                                                    </div>
                                                 </div>  
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="photo">A3. Returning (Balik-aral) <span style="color: red">  *</span></label>
                                                    <select class="form-select mb-3" aria-label=".form-select-lg example" name="A3" id="A3" required>
                                                    <option value="">Open this select menu</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-3">
                                                 <div class="form-group">
                                                    <label for="photo">A4. Grade Level to enroll</label>
                                                    <select class="form-select mb-3" aria-label=".form-select-lg example" name="A4" id="A4" required>
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
                                                    <label for="basicInput">A5. Last grade level completed</label>
                                                    <input type="text" readonly class="form-control" name="A5" id="A5" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="basicInput">A6. Last school year completed</label>
                                                    <input type="text" class="form-control" name="A6" id="A6" >
                                                </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="basicInput">A7. Last school attended</label>
                                                    <input type="text" class="form-control" name="A7" id="A7" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="basicInput">A8. School ID</label>
                                                    <input type="number" class="form-control" name="A8" id="A8">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="basicInput">A9. School Address</label>
                                                    <input type="text" class="form-control" name="A9" id="A9">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                            <div class="form-group">
                                                    <label for="photo">A10. School Type <span style="color: red">  *</span></label>
                                                    <select class="form-select mb-3" aria-label=".form-select-lg example" name="A10" id="A10">
                                                    <option value="">Open this select menu</option>
                                                    <option value="PUBLIC">PUBLIC</option>
                                                    <option value="PRIVATE">PRIVATE</option>
                                                    </select>
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

      <!-------------------------------------------/ GRADE LEVEL AND SCHOOL INFORMATION /---------------------------------------------------------->

        <!--------------------------------------------------------- STUDENT INFORMATION --------------------------------------------------------------->

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
                                                <label for="basicInput">B1. PSA Birth Certificate No.</label>
                                                <input type="text" class="form-control" id="B1" name="B1">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="helpInputTop">B2. LRN</label>
                                                <small class="text-muted">(<i>Learners Reference No.</i>)</small><span style="color: red">  *</span>
                                                <input type="tel" maxlength="12" class="form-control" id="B2" name="B2" maxlength="12">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                                <label for="photo">Student Photo <span style="color: red">  *</span><!--  <i style="color: red; font-size: 12px"> (Note: Recommended file size: 1-5 mb.)</i> --></label>
                                                <input name="photo" type="file" class="form-control" id="photo" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="helpInputTop">Name <span style="color: red">  *</span></label>
                                        <div class="col-md-3">                                    
                                            <input type="text" class="form-control" id="B3" name="B3" placeholder="B3. Last Name" required>  
                                        </div>
                                        <div class="col-md-3">    
                                            <input type="text" class="form-control"id="B4" name="B4" placeholder="B4. First Name" required>                                        
                                        </div>
                                        <div class="col-md-3">    
                                            <input type="text" class="form-control" id="B5" name="B5" placeholder="B5. Middle Name" required>                                        
                                        </div>
                                        <div class="col-md-2">    
                                            <input type="text" class="form-control" id="B6" name="B6" placeholder="B6. Jr., II" >                                        
                                        </div>
                                    </div>
                                    
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label for="basicInput">B7. Birthday <span style="color: red">  *</span></label>
                                                <input type="date" class="form-control" id="B7" name="B7" onchange="ageCalculator()" required>
                                            </div>
                                        </div>
                            
                                        <div class="col-md-1">
                                            <div class="form-group ">
                                                <label for="basicInput">B8. Age <span style="color: red">  *</span></label>
                                                <input type="tel" maxlength="2" class="form-control" id="B8" name="B8" required>
                                            </div>
                                        </div>
                                     
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="basicInput">B9. Sex <span style="color: red">  *</span></label>
                                                <select class="form-control" name="B9" id="B9" required>   
                                                    <option value="">Select</option>                                         
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>                                           
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group ">
                                            <label for="helpInputTop">B10. Indigenous Group <span style="color: red">  *</span></label>
                                                <small class="text-muted">(<i>Ethnic Group</i>)</small>
                                                <select class="form-control" name="B10" id="B10">   
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
                                                </select>
                                            </div>
                                        </div>                      
                                    </div>

                                    <div class="row">                                       
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label for="basicInput">B12. Mother Tongue <span style="color: red">  *</span></label>
                                                <input type="text" class="form-control" id="B12" name="B12" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label for="helpInputTop">Religion <span style="color: red">  *</span></label>
                                                <select class="form-control" name="religion" id="religion" required>   
                                                    <option value="">Select</option>                                         
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
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label for="helpInputTop">Learning Mode <span style="color: red">  *</span></label>
                                                <select class="form-control" name="modality" id="modality" required>   
                                                    <option value="">Select</option>                                         
                                                    <option value="Modular">Modular</option>
                                                    <option value="Online Class">Online Class</option>                                                                                      
                                                    <option value="Online Class">Flexible</option>                                                                                      
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label for="helpInputTop">4Ps Member <span style="color: red">  *</span></label>
                                                <select class="form-control" name="4ps" id="4ps" required>   
                                                    <option value="">Select</option>                                         
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>                                                                                                                                                                           
                                                </select>
                                            </div>
                                        </div>
                                    </div>                                 
                                </div>
                            </div>

                     </section>

     <!-------------------------------------------FOR LEARNERS WITH SPECIAL EDUCATION NEEDS ------------------------------------------------------>

                     <section id="basic-vertical-layouts" class="myDiv">
                        <div class="row match-height">
                           <div class="col-md-7 col-12">
                                <div class="card logbrand">
                                    <div style="background-color: lightgray" class="card-header">
                                        <h4 class="card-title">For Learners with Special Education Needs </h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="form form-vertical">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                            <label for="select-special-type">B14. Does the learner have special education needs?<span style="color: red">  *</span></label>
                                                                <select class="form-select mb-3" aria-label=".form-select-lg example" id="B14" name="B14" onchange="special()" required>
                                                                <option value="">Open this select menu</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="specify-info-vertical">B15. If yes, please specify</label>
                                                                <input type="text" class="form-control" id="B15" name="B15">
                                                            </div>
                                                        </div>                      
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                            <label for="select-assistive-type">B16. Do you have any assistive technology available at home? 
                                                                (i.e. screen reader, Braille, DAISY) <span style="color: red">  *</span></label>
                                                                <select class="form-select mb-3" aria-label=".form-select-lg example" id="B16" name="B16" onchange="assistive()" required>
                                                                <option value="">Open this select menu</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="specify2-info-vertical">B17. If yes, please specify</label>
                                                                <input type="text" class="form-control" id="B17" name="B17">
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
    <!------------------------------------------------------------- ADDRESS INFORMATION ------------------------------------------------------>
                            <div class="col-md-5 col-12">
                                <div class="card logbrand"><!----------------- ADDRESS CARD --------------------------->
                                    <div style="background-color: lightgray" class="card-header">
                                        <h4 class="card-title">ADDRESS</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="form form-vertical">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="house-info-vertical">House No. and Street <span style="color: red">  *</span></label>
                                                                <input type="text" class="form-control" id="street" name="street" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="barangay-info-vertical">Barangay <span style="color: red">  *</span></label>
                                                                <input type="text" class="form-control" id="barangay" name="barangay" required>                                                                 
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="city-info-vertical">City / Municipality <span style="color: red">  *</span></label>
                                                                <input type="text" class="form-control" id="municipality" name="municipality" required>                                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="province-info-vertical">Province <span style="color: red">  *</span></label>
                                                                <input type="text" class="form-control" id="province" name="province" required>
                                                            </div>    
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="Region-info-vertical">Region <span style="color: red">  *</span></label>
                                                                <input type="text" class="form-control" id="region" name="region" required> 
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

    <!-------------------------------------------------------------/ ADDRESS INFORMATION /--------------------------------------------------------------->


    <!-------------------------------------------------------------PARENT / GUARDIAN INFORMATION--------------------------------------------------------------->

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
                                            <label for="fathername">Father's Full Name <span style="color: red">  *</span></label>
                                            <input type="text" class="form-control" id="father" name="father" >
                                        </div>
                                    </div>
                                    <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group ">
                                            <label for="mothername">Mother's Full Name <span style="color: red">  *</span></label>
                                            <input type="text" class="form-control" id="mother" name="mother" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="guardianname">Guardian's Full Name <span style="color: red">  *</span></label>
                                            <input type="text" class="form-control" id="guardian" name="guardian" required>
                                        </div>
                                    </div>
                            </div>
                            <!-- =-------------------------------------------------------------------------------------------------------- -->
                            <div class="row">                                          
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group">
                                                <label for="fathereducation">Highest Educational Attainment</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example" id="fathereducattainment" name="fathereducattainment" >
                                                <option selected>Open this select menu</option>
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
                                                <label for="mothereducation">Highest Educational Attainment</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example" id="mothereducattainment" name="mothereducattainment" >
                                                <option selected>Open this select menu</option>
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
                                                <label for="guardianeducation">Highest Educational Attainment <span style="color: red">  *</span></label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example" id="guardianeducattainment" name="guardianeducattainment" required>
                                                <option selected>Open this select menu</option>
                                                <option value="Elementary Graduate">Elementary Graduate</option>
                                                <option value="High School Graduate">High School Graduate</option>
                                                <option value="College Graduate">College Graduate</option>
                                                <option value="Vocational">Vocational</option>
                                                <option value="Master's/Doctorate Degree">Master's/Doctorate Degree</option>
                                                <option value="Did not attent school">Did not attent school</option>
                                                </select>
                                            </div>
                                 </div>                                  
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------  -->
                            <div class="row">                                          
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group">
                                                <label for="fatheremployment">Employment Status</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example" id="fatheremployment" name="fatheremployment" >
                                                <option selected>Open this select menu</option>
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
                                                <label for="motheremployment">Employment Status</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example" id="motheremployment" name="motheremployment" >
                                                <option selected>Open this select menu</option>
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
                                                <label for="guardianemployment">Employment Status <span style="color: red">  *</span></label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example" id="guardianemployment" name="guardianemployment" required>
                                                <option selected>Open this select menu</option>
                                                <option value="Full Time">Full Time</option>
                                                <option value="Part Time">Part Time</option>
                                                <option value="Self-Employed (i.e family business)">Self-Employed (i.e family business)</option>
                                                <option value="Unemployed due to ECQ">Unemployed due to ECQ</option>
                                                <option value="Not Working">Not Working</option>
                                                </select>
                                            </div>
                                 </div>                                   
                            </div>    
                            <!-- ------------------------------------------------------------------------------------------------ -->
                            
                            <div class="row">                                          
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group">
                                                <label for="fatherWFH">Working from home due to ECQ?</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example" id="fatherWFH" name="fatherWFH" >
                                                <option selected>Open this select menu</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                </select>
                                         </div>
                                 </div>
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group">
                                                <label for="motherWFH">Working from home due to ECQ?</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example" id="motherWFH" name="motherWFH" >
                                                <option selected>Open this select menu</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                </select>
                                         </div>
                                 </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                                <label for="guardianWFH">Working from home due to ECQ? <span style="color: red">  *</span></label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example" id="guardianWFH" name="guardianWFH" >
                                                <option selected>Open this select menu</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                </select>
                                         </div>
                                 </div>
                            </div>
                            <!-- ------------------------------------------------------------------------------------------------------------- -->

                            <div class="row">
                                    <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group ">
                                            <label for="fathercontact">Contact Number/s (cellphone/telephone)</label>
                                            <input type="tel" maxlength="11" class="form-control" id="fathercontact" name="fathercontact" >
                                        </div>
                                    </div>
                                    <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group ">
                                            <label for="mothercontact">Contact Number/s (cellphone/telephone)</label>
                                            <input type="tel" maxlength="11" class="form-control" id="mothercontact" name="mothercontact" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="guardiancontact">Contact Number/s (cellphone/telephone) <span style="color: red">  *</span></label>
                                            <input type="tel" maxlength="11" class="form-control" id="guardiancontact" name="guardiancontact" required>
                                            <br>
                                            <label for="guardiancontact">Relationship to the Guardian <span style="color: red">  *</span></label>
                                            <input type="text" class="form-control" id="guardianrelate" name="guardianrelate" required>
                                        </div>
                                    </div>
                            </div>
                          
                        </div>
                        </div>
                       </section>


    <!-------------------------------------------------------------/PARENT / GUARDIAN INFORMATION/--------------------------------------------------------------->


    <!------------------------------------------------------------- HOUSEHOLD CAPACITY AND ACCESS TO DISTANCE LEARNING--------------------------------------------------------------->

                    <section class="section myDiv">
                      <div class="card logbrand">
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
                                                                <input class="form-check-input" type="checkbox"  name="D1[]" value="Walking">
                                                                <label class="form-check-label" for="inlineCheckbox1">Walking</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"  name="D1[]" value="Public Commute (land/water)">
                                                                <label class="form-check-label" for="inlineCheckbox1">Public Commute (land/water)</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"  name="D1[]" value="Family-owned vehicle">
                                                                <label class="form-check-label" for="inlineCheckbox1">Family-owned vehicle</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"  name="D1[]" value="School Service">
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
                                                                <input class="form-check-input" type="checkbox" name="D3[]" value="Parents/Guardians">
                                                                <label class="form-check-label" for="inlineCheckbox1">Parents/Guardians</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D3[]" value="Elder siblings">
                                                                <label class="form-check-label" for="inlineCheckbox1">Elder siblings</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D3[]" value="Grandparents">
                                                                <label class="form-check-label" for="inlineCheckbox1">Grandparents</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D3[]" value="Extended members of the family">
                                                                <label class="form-check-label" for="inlineCheckbox1">Extended members of the family</label>
                                                            </div> 
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D3[]" value="Others(tutor, house helper)">
                                                                <label class="form-check-label" for="inlineCheckbox1">Others(tutor, house helper)</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D3[]" value="none">
                                                                <label class="form-check-label" for="inlineCheckbox1">none</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D3[]" value="able to do independent learning">
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
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 1</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]"> 
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 2</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 3</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 4</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                        </div>

                                                        <div class="col">
                                                        <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 5</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 6</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 7</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 8</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 9</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="col ">
                                                        <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 10</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 11</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]"> 
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 12</span>
                                                                <input type="tel" maxlength="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm"><i>Others</i></span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
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
                                                                <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="cable tv">
                                                                <label class="form-check-label" for="inlineCheckbox1">cable tv</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="non-cable tv">
                                                                <label class="form-check-label" for="inlineCheckbox1">non-cable tv</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="basic cellphone">
                                                                <label class="form-check-label" for="inlineCheckbox1">basic cellphone</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="smartphone">
                                                                <label class="form-check-label" for="inlineCheckbox1">smartphone</label>
                                                            </div> 
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="tablet">
                                                                <label class="form-check-label" for="inlineCheckbox1">tablet</label>
                                                            </div> 
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="radio">
                                                                <label class="form-check-label" for="inlineCheckbox1">radio</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="desktop computer">
                                                                <label class="form-check-label" for="inlineCheckbox1">desktop computer</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="laptop">
                                                                <label class="form-check-label" for="inlineCheckbox1">laptop</label>
                                                            </div>                                             
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D4[]" id="inlineCheckbox1" value="none">
                                                                <label class="form-check-label" for="inlineCheckbox1">none</label>
                                                            </div>                                             
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm"><i>Others</i></span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D4[]">
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
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D5[]" id="inlineCheckbox1" value="Yes">
                                                                <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D5[]" id="inlineCheckbox1" value="No">
                                                                <label class="form-check-label" for="inlineCheckbox1">No. (if No, proceed to D7)</label>
                                                            </div>
                                                    </div>
                                                    <div class="col form-group">
                                                            <label for="basicInput">D6. How do you connect to the internet? Choose all that applies.
                                                            </label>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="D6[]" id="inlineCheckbox1" value="own mobile data">
                                                                    <label class="form-check-label" for="inlineCheckbox1">own mobile data</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="D6[]" id="inlineCheckbox1" value="own broadband (DSL, wireless fiber, satellite)">
                                                                    <label class="form-check-label" for="inlineCheckbox1">own broadband (DSL, wireless fiber, satellite)</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="D6[]" id="inlineCheckbox1" value="computer shop">
                                                                    <label class="form-check-label" for="inlineCheckbox1">computer shop</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="D6[]" id="inlineCheckbox1" value="other places outside the home with internet connection">
                                                                    <label class="form-check-label" for="inlineCheckbox1">other places outside the home with internet connection</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="D6[]" id="inlineCheckbox1" value="none">
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
                                                                <input class="form-check-input" type="checkbox" name="D7[]" id="inlineCheckbox1" value="online learning">
                                                                <label class="form-check-label" for="inlineCheckbox1">online learning</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D7[]" id="inlineCheckbox1" value="television">
                                                                <label class="form-check-label" for="inlineCheckbox1">television</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D7[]" id="inlineCheckbox1" value="radio">
                                                                <label class="form-check-label" for="inlineCheckbox1">radio</label>
                                                            </div>
                                                        
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D7[]" id="inlineCheckbox1" value="modular learning">
                                                                <label class="form-check-label" for="inlineCheckbox1">modular learning</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D7[]" id="inlineCheckbox1" value="combination of face to face with other modalities">
                                                                <label class="form-check-label" for="inlineCheckbox1">combination of face to face with other modalities</label>
                                                            </div>                                                                                             
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm"><i>Others</i></span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D7[]">
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
                                                                <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="lack of available gadgets/equipment">
                                                                <label class="form-check-label" for="inlineCheckbox1">lack of available gadgets/equipment</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="insufficient load/data allowance">
                                                                <label class="form-check-label" for="inlineCheckbox1">insufficient load/data allowance</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="unstable internet connection">
                                                                <label class="form-check-label" for="inlineCheckbox1">unstable internet connection</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="existing health condition">
                                                                <label class="form-check-label" for="inlineCheckbox1">existing health condition</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="difficulty in independent learning">
                                                                <label class="form-check-label" for="inlineCheckbox1">difficulty in independent learning</label>
                                                            </div> 
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="conflict with other activities">
                                                                <label class="form-check-label" for="inlineCheckbox1">conflict with other activities</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="high electrical consumption">
                                                                <label class="form-check-label" for="inlineCheckbox1">high electrical consumption</label>
                                                            </div>                                                                                             
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8[]" id="inlineCheckbox1" value="distractions (i.e. social media, noise)">
                                                                <label class="form-check-label" for="inlineCheckbox1">distractions (i.e. social media, noise)</label>
                                                            </div>                                                                                             
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm"><i>Others</i></span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D8[]">
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

                 <section class="myDiv">
                    <div class="col-12 d-flex justify-content-end reset-btn">         
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1" >Reset</button>
                        <button type="submit" id="readmit" name="readmitstudent" class="btn btn-success me-1 mb-1">Done</button>
                        <button type="submit" id="admit" name="manueladmit" class="btn btn-primary me-1 mb-1">Done</button>
                    </div>
                 </section>
         </form>
            
        
            <?php include_once('includes/footer_html.php');?>
            </div> 
        </div>
</div> 


<!-- modal loading screen -->
<div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="width: 100px">
            <span class="fa fa-spinner fa-spin fa-5x"></span>
        </div>
    </div>
</div>

<script>
function modal(){
       $('.modal').modal('show');
       setTimeout(function () {
       //	console.log('hejsan');
       	$('.modal').modal('hide');
       }, 3000);
    }
</script>
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
<script src="asset/vendors/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="asset/js/bootstrap.bundle.min.js"></script>




<!-- Script for searching lrn -->

<script>
    $(document).ready(function() {        
        $("#verifylrn").click(function() {
            
            var a = document.getElementsByClassName("myDiv");
            var x = document.getElementsByClassName("myDiv");
            var lrn = $('#search').val();  
            var message = $('#message'); 

            $.ajax({
                        type: "GET",
                        url: "./getlevel.php?search="+lrn,
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
                                $('#A6').val(response[0]['schoolyear']); 
                                $('#A7').val(response[0]['schooltoenroll']); 
                                $('#A8').val(response[0]['schoolid2']); 
                                $('#A9').val(response[0]['schooladdress2']); 
                                $('#A10').val(response[0]['schooltype']); 


                                //student info
                                $('#B1').val(response[0]['psa']); 
                                $('#B2').val(response[0]['lrn']);                                   
                                $('#B4').val(response[0]['firstname']); 
                                $('#B3').val(response[0]['lastname']); 
                                $('#B4').val(response[0]['firstname']); 
                                $('#B5').val(response[0]['middlename']); 
                                $('#B6').val(response[0]['extension']); 
                                $('#B7').val(response[0]['birthday']); 
                                $('#B8').val(response[0]['age']); 
                                $('#B9').val(response[0]['sex']); 
                                $('#B10').val(response[0]['ethnicgroup']); 
                                $('#B12').val(response[0]['mothertongue']); 
                                $('#religion').val(response[0]['religion']); 
                                $('#modality').val(response[0]['modality']); 

                                //Special Education Learner info
                                $('#B14').val(response[0]['spedneeds']); 
                                $('#B15').val(response[0]['specifyneeds']);                  
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


                                $('#stud_id').val(response[0]['stud_id']); 


                                message.css("color", "blue");
                                message.html("Data is found.");    

                                for (var i = 0, len = x.length; i < len; i++) { 
                                    x[i].style.display = "block";
                                    $("#admit").hide(); 
                                    $("#readmit").show(); 
                            }
                        },
                        error: function (e) {
                            
                            message.css("color", "red");
                            message.html("Data is not found.");

                             //school info
                             $('.withLrn').prop("checked", true);
                                $('#A3').val(''); 
                                $('#A6').val(''); 
                                $('#A7').val(''); 
                                $('#A8').val(''); 
                                $('#A9').val(''); 

                                //student info
                                $('#B1').val(''); 
                                $('#B2').val('');                                   
                                $('#B4').val(''); 
                                $('#B3').val(''); 
                                $('#B4').val(''); 
                                $('#B5').val(''); 
                                $('#B6').val(''); 
                                $('#B7').val(''); 
                                $('#B8').val(''); 
                                $('#B9').val(''); 
                                $('#B10').val(''); 
                                $('#B12').val(''); 
                                $('#religion').val(''); 
                                $('#modality').val(''); 

                                //Special Education Learner info
                                $('#B14').val(''); 
                                $('#B15').val('');                  
                                $('#B16').val(''); 
                                $('#B17').val('');

                                //Address info
                                $('#street').val(''); 
                                $('#barangay').val(''); 
                                $('#municipality').val(''); 
                                $('#province').val(''); 
                                $('#region').val(''); 

                                //Parents and Guardian info
                                $('#father').val(''); 
                                $('#mother').val(''); 
                                $('#guardian').val(''); 

                                $('#fathereducattainment').val(''); 
                                $('#mothereducattainment').val(''); 
                                $('#guardianeducattainment').val(''); 

                                $('#fatheremployment').val(''); 
                                $('#motheremployment').val(''); 
                                $('#guardianemployment').val(''); 

                                $('#fatherWFH').val(''); 
                                $('#motherWFH').val(''); 
                                $('#guardianWFH').val(''); 

                                $('#fathercontact').val(''); 
                                $('#mothercontact').val(''); 
                                $('#guardiancontact').val(''); 

                                $('#guardianrelate').val(''); 


                                $('#stud_id').val(''); 
                                                    
                            for (var i = 0, len = a.length; i < len; i++) { 
                                    a[i].style.display = "block";
                                    $("#admit").show(); 
                                    $("#readmit").hide(); 
                              
                            }
                           
                           // $('#LastName').val("Data not found");                      
                        }
                });                 
        });        
    });
</script>