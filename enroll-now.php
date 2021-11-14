<?php include_once('includes/head_html.php'); 
session_start();
?>
 
<div id="app">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
    if(isset($_SESSION['admitStudentsuccess']))
    {
  ?>
    <script>
           swal({
            title: "Good Job!",
            text: "Successfully Added!",
            icon: "success",
            button: "Continue",
        });
   </script>
   <?php
   unset($_SESSION['admitStudentsuccess']);
   }
   elseif(isset($_SESSION['admitStudentError']))
   {
       ?>
         <script>
           swal({
            title: "Error!",
            text: "Failed to Add!",
            icon: "warning",
            button: "Continue",
        });
   </script>

   <?php
   unset($_SESSION['admitStudentError']);
   }
   ?>

<script>
    window.special = function () {
    console.log(document.getElementById("B14").value);
    if (document.getElementById("B14").value == "No") {
        document.getElementById("B15").disabled = "disabled";
    } else {
        document.getElementById("B15").disabled = "";
    }
    return true;
}
    window.assistive = function () {
        console.log(document.getElementById("B14").value);
        if (document.getElementById("B16").value == "No") {
            document.getElementById("B17").disabled = "disabled";
        } else {
            document.getElementById("B17").disabled = "";
        }
        return true;
}
    window.myLrn = function () {
            console.log(document.getElementById("A2").value);
            if (document.getElementById("A2").checked == true) {
                document.getElementById("B2").disabled = "disabled";
            } else {
                document.getElementById("B2").disabled = "";
            }
            return true;
    }

</script>


<form method="POST" action="MyCrud.php">
    
    <div id="main" style="margin-left:20px">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

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
                            <h6>3. For questions / clarifications, please ask for the assistance of the teacher / person-in-charge.</h6><br>
                            <hr>
                                            
                        </div>
                         <div class="col-12 col-md-4 order-md-2 order-first">

                        </div>
                    </div>
                </div>
            </div>

    <!------------------------------------------------- GRADE LEVEL AND SCHOOL INFORMATION ---------------------------------------------------------->
            
                        <section class="section">
                            <div class="card logbrand">
                                <div style="background-color: lightgray" class="card-header">
                                    <h4 class="card-title">A. GRADE LEVEL AND SCHOOL INFORMATION</h4>                          
                                </div>
                                <br>
                            
                                <div class="card-body">
                                    <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label for="basicInput">A1. School Year</label>
                                                    <input type="text" class="form-control" id="basicInput" name="A1" id="A1" required>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="helpInputTop">A2. Check the appropriate boxes only</label>                                     
                                                    <div class="form-check form-check-inline" >
                                                        <input  class="form-check-input" type="radio" id="A2" name="A2" value="No LRN" onchange="myLrn()">
                                                        <label class="form-check-label" for="html">No LRN</label><br>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                         <input  class="form-check-input" type="radio" id="A2" name="A2" value="With LRN" onchange="myLrn()">
                                                        <label class="form-check-label" for="css">With LRN</label><br>
                                                    </div>
                                            </div>  
                                            </div>
                                            
                                            <div class="col-md-3">
                                            <div class="form-group">
                                                    <label for="photo">A3. Returning (Balik-aral)</label>
                                                    <select class="form-select mb-3" aria-label=".form-select-lg example" name="A3" id="A3" required>
                                                    <option disabled selected>Open this select menu</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-2">
                                            <div class="form-group">
                                                    <label for="photo">A4. Grade Level to enroll</label>
                                                    <select class="form-select mb-3" aria-label=".form-select-lg example" name="A4" id="A4" required>
                                                    <option disabled selected>Open this select menu</option>
                                                    <option value="Kinder">Kinder</option>
                                                    <option value="Grade 1">Grade 1</option>
                                                    <option value="Grade 2">Grade 2</option>
                                                    <option value="Grade 3">Grade 3</option>
                                                    <option value="Grade 4">Grade 4</option>
                                                    <option value="Grade 5">Grade 5</option>
                                                    <option value="Grade 6">Grade 6</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="basicInput">A5. Last grade level completed</label>
                                                    <select class="form-select mb-3" aria-label=".form-select-lg example" name="A5" id="A5" required>
                                                    <option disabled selected>Open this select menu</option>
                                                    <option value="Kinder">Kinder</option>
                                                    <option value="Grade 1">Grade 1</option>
                                                    <option value="Grade 2">Grade 2</option>
                                                    <option value="Grade 3">Grade 3</option>
                                                    <option value="Grade 4">Grade 4</option>
                                                    <option value="Grade 5">Grade 5</option>
                                                    <option value="Grade 6">Grade 6</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="basicInput">A6. Last school year completed</label>
                                                    <input type="text" class="form-control" id="basicInput" name="A6" id="A6" required>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label for="basicInput">A7. Last school attended</label>
                                                    <input type="text" class="form-control" id="basicInput" name="A7" id="A7" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="basicInput">A8. School ID</label>
                                                    <input type="text" class="form-control" id="basicInput" name="A8" id="A8" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="basicInput">A9. School Address</label>
                                                    <input type="text" class="form-control" id="basicInput" name="A9" id="A10" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                            <div class="form-group">
                                                    <label for="photo">A10. School Type</label>
                                                    <select class="form-select mb-3" aria-label=".form-select-lg example" name="A10" id="A10" required>
                                                    <option disabled selected>Open this select menu</option>
                                                    <option value="Public">Public</option>
                                                    <option value="Private">Private</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label for="basicInput">A11. School to enroll in</label>
                                                    <input type="text" class="form-control" id="basicInput" name="A11" id="A11" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="basicInput">A12. School ID</label>
                                                    <input type="text" class="form-control" id="basicInput" name="A12" id="A12" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="basicInput">A13. School Address</label>
                                                    <input type="text" class="form-control" id="basicInput" name="A13" id="A13" required>
                                                </div>
                                            </div>
                                    </div>                       
                            </div>
                        </div>
                    </section>

      <!-------------------------------------------/ GRADE LEVEL AND SCHOOL INFORMATION /---------------------------------------------------------->

        <!--------------------------------------------------------- STUDENT INFORMATION --------------------------------------------------------------->

                    <section class="section">
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
                                                <input type="text" class="form-control" id="B1" name="B1" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="helpInputTop">B2. LRN</label>
                                                <small class="text-muted">(<i>Learners Reference No.</i>)</small>
                                                <input type="text" class="form-control" id="B2" name="B2" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                                <label for="photo">Student Photo</label>
                                                <input name="photo" type="file" class="form-control" id="photo" name="photo" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="helpInputTop">Name</label>
                                        <div class="col-3">                                    
                                            <input type="text" class="form-control" id="B3" name="B3" placeholder="B3. Last Name" required>  
                                        </div>
                                        <div class="col-3">    
                                            <input type="text" class="form-control"id="B4" name="B4" placeholder="B4. First Name" required>                                        
                                        </div>
                                        <div class="col-3">    
                                            <input type="text" class="form-control" id="B5" name="B5" placeholder="B5. Middle Name" required>                                        
                                        </div>
                                        <div class="col-1">    
                                            <input type="text" class="form-control" id="B6" name="B6" placeholder="B6. Jr., II" >                                        
                                        </div>
                                    </div>
                                    
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label for="basicInput">B7. Birthday</label>
                                                <input type="date"  id="birth-date" class="form-control" id="B7" name="B7" placeholder="" required>
                                            </div>
                                        </div>
                            

                                        <div class="col-md-1">
                                            <div class="form-group ">
                                                <label for="basicInput">B8. Age</label>
                                                <input type="text" id="age-count" class="form-control" id="B8" name="B8" required>
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="basicInput">B9. Sex</label>
                                                <select class="form-control" name="B9" id="B9" required>   
                                                    <option value="" disabled selected>Select</option>                                         
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>                                           
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group ">
                                            <label for="helpInputTop">B10. IP</label>
                                                <small class="text-muted">(<i>Ethnic Group</i>)</small>
                                                <input type="text" class="form-control" id="B10" name="B10" placeholder="if you belong to indigenous group, please specifiy" required>
                                            </div>
                                        </div>
                                       
                                    </div>

                                    <div class="row">
                                        
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label for="basicInput">B12. Mother Tongue</label>
                                                <input type="text" id="" class="form-control" id="B12" name="B12" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label for="helpInputTop">Religion</label>
                                                <input type="text" class="form-control" id="religion" name="religion" required>
                                            </div>
                                        </div>
                                    </div>
                                    


                                    
                                </div>
                            </div>

                     </section>

     <!-------------------------------------------FOR LEARNERS WITH SPECIAL EDUCATION NEEDS ------------------------------------------------------>

                     <section id="basic-vertical-layouts">
                        <div class="row match-height">
                        <div class="col-md-7 col-12">
                                <div class="card logbrand">
                                    <div style="background-color: lightgray" class="card-header">
                                        <h4 class="card-title">For Learners with Special Education Needs</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form form-vertical">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                            <label for="select-special-type">B14. Does the learner have special education needs?</label>
                                                                <select class="form-select mb-3" aria-label=".form-select-lg example" id="B14" name="B14" onchange="special()">
                                                                <option selected>Open this select menu</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="specify-info-vertical">B15. If yes, please specify</label>
                                                                <input type="text" class="form-control" id="B15" name="B15" placeholder="">
                                                            </div>
                                                        </div>                      
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                            <label for="select-assistive-type">B16. Do you have any assistive technology available at home? 
                                                                (i.e. screen reader, Braille, DAISY)</label>
                                                                <select class="form-select mb-3" aria-label=".form-select-lg example" id="B16" name="B16" onchange="assistive()">
                                                                <option selected>Open this select menu</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="specify2-info-vertical">B17. If yes, please specify</label>
                                                                <input type="text" class="form-control" placeholder="" id="B17" name="B17">
                                                                    <br>
                                                            </div>
                                                        </div>                                                                           
                                                    </div>
                                                </div>
                                            </form>
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
                                            <form class="form form-vertical">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="house-number-vertical">House Number and Street</label>
                                                                <input type="text" id="house"
                                                                    class="form-control" name="house"
                                                                    placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="barangay-info-vertical">Barangay</label>
                                                                <input type="text" id="barangay"
                                                                    class="form-control" name="barangay"
                                                                    placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="city-info-vertical">City / Municipality</label>
                                                                <input type="text" id="city"
                                                                    class="form-control" name="city"
                                                                    placeholder="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="province-info-vertical">Province</label>
                                                                <input type="text" id="province"
                                                                    class="form-control" name="province"
                                                                    placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="Region-info-vertical">Region</label>
                                                                <input type="text" id="region"
                                                                    class="form-control" name="region"
                                                                    placeholder="">
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



    <!-------------------------------------------------------------/ STUDENT INFORMATION /--------------------------------------------------------------->


    <!-------------------------------------------------------------PARENT / GUARDIAN INFORMATION--------------------------------------------------------------->

                     <section class="section">
                         <div class="card logbrand">
                        <div style="background-color: lightgray" class="card-header">
                            <h4 class="card-title">C. PARENT  / GUARDIAN INFORMATION</h4>                          
                        </div>
                        <br>
                      
                        <div class="card-body">
                            <div class="row">
                                    <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group ">
                                            <label for="fathername">Father's Full Name</label>
                                            <input type="text" class="form-control" id="father" name="father">
                                        </div>
                                    </div>
                                    <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group ">
                                            <label for="mothername">Mother's Full Name</label>
                                            <input type="text" class="form-control" id="mother" name="mother">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="guardianname">Guardian's Full Name</label>
                                            <input type="text" class="form-control" id="guardian" name="guardian">
                                        </div>
                                    </div>
                            </div>
                            <!-- =-------------------------------------------------------------------------------------------------------- -->
                            <div class="row">                                          
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group">
                                                <label for="fathereducation">Highest Educational Attainment</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example" id="fathereducattainment" name="fathereducattainment">
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
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example" id="mothereducattainment" name="mothereducattainment">
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
                                                <label for="guardianeducation">Highest Educational Attainment</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example" id="guardianeducattainment" name="guardianeducattainment">
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
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example" id="fatheremployment" name="fatheremployment">
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
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example" id="motheremployment" name="motheremployment">
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
                                                <label for="guardianemployment">Employment Status</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example" id="guardianemployment" name="guardianemployment">
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
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example" id="fatherWFH" name="fatherWFH">
                                                <option selected>Open this select menu</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                </select>
                                         </div>
                                 </div>
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group">
                                                <label for="motherWFH">Working from home due to ECQ?</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example" id="motherWFH" name="motherWFH">
                                                <option selected>Open this select menu</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                </select>
                                         </div>
                                 </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                                <label for="guardianWFH">Working from home due to ECQ?</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example" id="guardianWFH" name="guardianWFH">
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
                                            <input type="text" class="form-control" id="fathercontact" name="fathercontact" >
                                        </div>
                                    </div>
                                    <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group ">
                                            <label for="mothercontact">Contact Number/s (cellphone/telephone)</label>
                                            <input type="text" class="form-control" id="mothercontact" name="mothercontact">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="guardiancontact">Contact Number/s (cellphone/telephone)</label>
                                            <input type="text" class="form-control" id="guardiancontact" name="guardiancontact">
                                        </div>
                                    </div>
                            </div>
                          
                        </div>
                        </div>
                       </section>


    <!-------------------------------------------------------------/PARENT / GUARDIAN INFORMATION/--------------------------------------------------------------->


    <!------------------------------------------------------------- HOUSEHOLD CAPACITY AND ACCESS TO DISTANCE LEARNING--------------------------------------------------------------->

                    <section class="section">
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
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 1</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]"> 
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 2</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 3</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 4</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                        </div>

                                                        <div class="col">
                                                        <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 5</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 6</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 7</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 8</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 9</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="col ">
                                                        <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 10</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 11</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]"> 
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 12</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D2[]">
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
                                                                <input class="form-check-input" type="checkbox" name="D8" id="inlineCheckbox1" value="lack of available gadgets/equipment">
                                                                <label class="form-check-label" for="inlineCheckbox1">lack of available gadgets/equipment</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8" id="inlineCheckbox1" value="insufficient load/data allowance">
                                                                <label class="form-check-label" for="inlineCheckbox1">insufficient load/data allowance</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8" id="inlineCheckbox1" value="unstable internet connection">
                                                                <label class="form-check-label" for="inlineCheckbox1">unstable internet connection</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8" id="inlineCheckbox1" value="existing health condition">
                                                                <label class="form-check-label" for="inlineCheckbox1">existing health condition</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8" id="inlineCheckbox1" value="difficulty in independent learning">
                                                                <label class="form-check-label" for="inlineCheckbox1">difficulty in independent learning</label>
                                                            </div> 
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8" id="inlineCheckbox1" value="conflict with other activities">
                                                                <label class="form-check-label" for="inlineCheckbox1">conflict with other activities</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8" id="inlineCheckbox1" value="high electrical consumption">
                                                                <label class="form-check-label" for="inlineCheckbox1">high electrical consumption</label>
                                                            </div>                                                                                             
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="D8" id="inlineCheckbox1" value="distractions (i.e. social media, noise)">
                                                                <label class="form-check-label" for="inlineCheckbox1">distractions (i.e. social media, noise)</label>
                                                            </div>                                                                                             
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm"><i>Others</i></span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="D8">
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
                 
                 <div class="col-12 d-flex justify-content-end reset-btn">         
                 <button type="reset" class="btn btn-light-secondary me-1 mb-1" >Reset</button>
                 <button type="submit" name="admitstudent" class="btn btn-success me-1 mb-1" style="background-color: #009933; border-color: #009933;">Add</button>          
                 </div>
            </form>
                
            <?php include_once('includes/footer_html.php');  ?>
            </div> 
        </div>
</div> 



      <!----------------------------------------------- FOR MODAL --------------------------------------------------------------------->
   <!--    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to send a request and admit this student?
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Request has been sent to the School Admin. <br>
        Please wait for about 1-2 days for your text confirmation.

      </div>
      <div class="modal-footer">
        <a href="login.php"><button class="btn btn-primary">Done</button></a>
      </div>
    </div>
  </div>
</div> -->


