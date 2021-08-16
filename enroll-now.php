<?php include_once('includes/head_html.php'); ?>

<div id="app">
   
    
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
                           <!--  <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="?page=records&data=admission-list">Admission</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">New</li>
                                </ol>
                            </nav> -->
                        </div>
                    </div>
                </div>

    <!------------------------------------------------- GRADE LEVEL AND SCHOOL INFORMATION ---------------------------------------------------------->
                    <section class="section">
                            <div class="card">
                                <div style="background-color: lightgray" class="card-header">
                                    <h4 class="card-title">A. GRADE LEVEL AND SCHOOL INFORMATION</h4>                          
                                </div>
                                <br>
                            
                                <div class="card-body">
                                    <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label for="basicInput">A1. School Year</label>
                                                    <input type="text" class="form-control" id="basicInput">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="helpInputTop">A2. Check the appropriate boxes only</label>                                      
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">No LRN</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                        <label class="form-check-label" for="inlineCheckbox2">With LRN</label>
                                                        </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                            <div class="form-group">
                                                    <label for="photo">A3. Returning (Balik-aral)</label>
                                                    <select class="form-select  mb-3" aria-label=".form-select-lg example">
                                                    <option selected>Open this select menu</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label for="basicInput">A4. Grade Level to enroll</label>
                                                    <input type="text" class="form-control" id="basicInput">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="basicInput">A5. Last grade level completed</label>
                                                    <input type="text" class="form-control" id="basicInput">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="basicInput">A6. Last school year completed</label>
                                                    <input type="text" class="form-control" id="basicInput">
                                                </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label for="basicInput">A7. Last school attended</label>
                                                    <input type="text" class="form-control" id="basicInput">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="basicInput">A8. School ID</label>
                                                    <input type="text" class="form-control" id="basicInput">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="basicInput">A9. School Address</label>
                                                    <input type="text" class="form-control" id="basicInput">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                            <div class="form-group">
                                                    <label for="photo">A10. School Type</label>
                                                    <select class="form-select  mb-3" aria-label=".form-select-lg example">
                                                    <option selected>Open this select menu</option>
                                                    <option value="1">Public</option>
                                                    <option value="2">Private</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label for="basicInput">A11. School to enroll in</label>
                                                    <input type="text" class="form-control" id="basicInput">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="basicInput">A12. School ID</label>
                                                    <input type="text" class="form-control" id="basicInput">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="basicInput">A13. School Address</label>
                                                    <input type="text" class="form-control" id="basicInput">
                                                </div>
                                            </div>
                                    </div>                       
                            </div>
                        </div>
                    </section>

    <!-------------------------------------------------/ GRADE LEVEL AND SCHOOL INFORMATION /---------------------------------------------------------->

    <!------------------------------------------------------------- STUDENT INFORMATION --------------------------------------------------------------->

                    <section class="section">
                            <div class="card">
                                <div style="background-color: lightgray" class="card-header">
                                    <h4 class="card-title">B. STUDENT INFORMATION</h4>
                                </div>
                                <br>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label for="basicInput">B1. PSA Birth Certificate No.</label>
                                                <input type="text" class="form-control" id="basicInput">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="helpInputTop">B2. LRN</label>
                                                <small class="text-muted">(<i>Learners Reference No.</i>)</small>
                                                <input type="text" class="form-control" id="helpInputTop">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                                <label for="photo">Student Photo</label>
                                                <input name="photo" type="file" class="form-control" id="photo" required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="helpInputTop">Name</label>
                                        <div class="col-3">                                    
                                            <input type="text" class="form-control" id="basicInput" placeholder="B3. Last Name">  
                                        </div>
                                        <div class="col-3">    
                                            <input type="text" class="form-control" id="basicInput" placeholder="B4. First Name">                                        
                                        </div>
                                        <div class="col-3">    
                                            <input type="text" class="form-control" id="basicInput" placeholder="B5. Middle Name">                                        
                                        </div>
                                        <div class="col-1">    
                                            <input type="text" class="form-control" id="basicInput" placeholder="B6. Jr., II">                                        
                                        </div>
                                    </div>
                                    
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label for="basicInput">B7. Birthday</label>
                                                <input type="date"  id="birth-date" class="form-control" name="birthday" placeholder="">
                                            </div>
                                        </div>
                            

                                        <div class="col-md-1">
                                            <div class="form-group ">
                                                <label for="basicInput">B8. Age</label>
                                                <input type="text" id="age-count" class="form-control" name="age" placeholder="0">
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="basicInput">B9. Sex</label>
                                                <select class="form-control" name="sex" id="sex">   
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
                                                <input type="text" class="form-control" id="ethnicity" placeholder="if you belong to indigenous group, please specifiy">
                                            </div>
                                        </div>
                                       
                                    </div>

                                    <div class="row">
                                        
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label for="basicInput">B12. Mother Tongue</label>
                                                <input type="text" id="" class="form-control" name="" placeholder="" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label for="helpInputTop">Religion</label>
                                                <input type="text" class="form-control" id="religion">
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
                                <div class="card">
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
                                                                <select class="form-select mb-3" aria-label=".form-select-lg example">
                                                                <option selected>Open this select menu</option>
                                                                <option value="1">Yes</option>
                                                                <option value="2">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="specify-info-vertical">B15. If yes, please specify</label>
                                                                <input type="text" id="specify-info-vertical"
                                                                    class="form-control" name="specify-needs"
                                                                    placeholder="">
                                                            </div>
                                                        </div>                      
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                            <label for="select-assistive-type">B16. Do you have any assistive technology available at home? 
                                                                (i.e. screen reader, Braille, DAISY)</label>
                                                                <select class="form-select mb-3" aria-label=".form-select-lg example">
                                                                <option selected>Open this select menu</option>
                                                                <option value="1">Yes</option>
                                                                <option value="2">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="specify2-info-vertical">B17. If yes, please specify</label>
                                                                <input type="text" id="specify2-info-vertical"
                                                                    class="form-control" name="specify2-needs"
                                                                    placeholder="">
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
                                <div class="card"><!----------------- ADDRESS CARD --------------------------->
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
                                                                <input type="text" id="house-info-vertical"
                                                                    class="form-control" name="house-number-street"
                                                                    placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="barangay-info-vertical">Barangay</label>
                                                                <input type="text" id="barangay-info-vertical"
                                                                    class="form-control" name="barangay"
                                                                    placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="city-info-vertical">City / Municipality</label>
                                                                <input type="text" id="city-info-vertical"
                                                                    class="form-control" name="city-municipality"
                                                                    placeholder="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="province-info-vertical">Province</label>
                                                                <input type="text" id="province-info-vertical"
                                                                    class="form-control" name="province-municipality"
                                                                    placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="Region-info-vertical">Region</label>
                                                                <input type="text" id="Region-info-vertical"
                                                                    class="form-control" name="Region"
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
                         <div class="card">
                        <div style="background-color: lightgray" class="card-header">
                            <h4 class="card-title">C. PARENT  / GUARDIAN INFORMATION</h4>                          
                        </div>
                        <br>
                      
                        <div class="card-body">
                            <div class="row">
                                    <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group ">
                                            <label for="fathername">Father's Full Name</label>
                                            <input type="text" class="form-control" id="fathername">
                                        </div>
                                    </div>
                                    <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group ">
                                            <label for="mothername">Mother's Full Name</label>
                                            <input type="text" class="form-control" id="mothername">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="guardianname">Guardian's Full Name</label>
                                            <input type="text" class="form-control" id="guardianname">
                                        </div>
                                    </div>
                            </div>
                            <!-- =-------------------------------------------------------------------------------------------------------- -->
                            <div class="row">                                          
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group">
                                                <label for="fathereducation">Highest Educational Attainment</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">Elementary Graduate</option>
                                                <option value="2">High School Graduate</option>
                                                <option value="3">College Graduate</option>
                                                <option value="4">Vocational</option>
                                                <option value="5">Master's/Doctorate Degree</option>
                                                <option value="6">Did not attent school</option>
                                                </select>
                                            </div>
                                 </div>
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group">
                                                <label for="mothereducation">Highest Educational Attainment</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">Elementary Graduate</option>
                                                <option value="2">High School Graduate</option>
                                                <option value="3">College Graduate</option>
                                                <option value="4">Vocational</option>
                                                <option value="5">Master's/Doctorate Degree</option>
                                                <option value="6">Did not attent school</option>
                                                </select>
                                            </div>
                                 </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                                <label for="guardianeducation">Highest Educational Attainment</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">Elementary Graduate</option>
                                                <option value="2">High School Graduate</option>
                                                <option value="3">College Graduate</option>
                                                <option value="4">Vocational</option>
                                                <option value="5">Master's/Doctorate Degree</option>
                                                <option value="6">Did not attent school</option>
                                                </select>
                                            </div>
                                 </div>                                  
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------  -->
                            <div class="row">                                          
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group">
                                                <label for="fatheremployment">Employment Status</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">Full Time</option>
                                                <option value="2">Part Time</option>
                                                <option value="3">Self-Employed (i.e family business)</option>
                                                <option value="4">Unemployed due to ECQ</option>
                                                <option value="5">Not Working</option>
                                                </select>
                                            </div>
                                 </div>
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group">
                                                <label for="motheremployment">Employment Status</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">Full Time</option>
                                                <option value="2">Part Time</option>
                                                <option value="3">Self-Employed (i.e family business)</option>
                                                <option value="4">Unemployed due to ECQ</option>
                                                <option value="5">Not Working</option>
                                                </select>
                                            </div>
                                 </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                                <label for="guardianemployment">Employment Status</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">Full Time</option>
                                                <option value="2">Part Time</option>
                                                <option value="3">Self-Employed (i.e family business)</option>
                                                <option value="4">Unemployed due to ECQ</option>
                                                <option value="5">Not Working</option>
                                                </select>
                                            </div>
                                 </div>                                   
                            </div>    
                            <!-- ------------------------------------------------------------------------------------------------ -->
                            
                            <div class="row">                                          
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group">
                                                <label for="fatherWFH">Working from home due to ECQ?</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                                </select>
                                         </div>
                                 </div>
                                <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group">
                                                <label for="motherWFH">Working from home due to ECQ?</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                                </select>
                                         </div>
                                 </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                                <label for="guardianWFH">Working from home due to ECQ?</label>
                                                <select class="form-select  mb-3" aria-label=".form-select-lg example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                                </select>
                                         </div>
                                 </div>
                            </div>
                            <!-- ------------------------------------------------------------------------------------------------------------- -->

                            <div class="row">
                                    <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group ">
                                            <label for="fathercontact">Contact Number/s (cellphone/telephone)</label>
                                            <input type="text" class="form-control" id="fathercontact">
                                        </div>
                                    </div>
                                    <div style="border-right: solid 1px gray" class="col-md-4">
                                        <div class="form-group ">
                                            <label for="mothercontact">Contact Number/s (cellphone/telephone)</label>
                                            <input type="text" class="form-control" id="mothercontact">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="guardiancontact">Contact Number/s (cellphone/telephone)</label>
                                            <input type="text" class="form-control" id="guardiancontact">
                                        </div>
                                    </div>
                            </div>
                          
                        </div>
                        </div>
                       </section>


    <!-------------------------------------------------------------/PARENT / GUARDIAN INFORMATION/--------------------------------------------------------------->


    <!------------------------------------------------------------- HOUSEHOLD CAPACITY AND ACCESS TO DISTANCE LEARNING--------------------------------------------------------------->

                    <section class="section">
                      <div class="card">
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
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Walking</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Public Commute (land/water)</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Family-owned vehicle</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
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
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Parents/Guardians</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Elder siblings</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Grandparents</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Extended members of the family</label>
                                                            </div> 
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Others(tutor, house helper)</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">none</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
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
                                                <label for="basicInput">D2. How many of your household members (including the enrolle) are
                                                    studying in the current School Year? Please specify each.
                                                </label>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Kinder</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 1</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 2</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 3</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 4</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                                </div>
                                                        </div>

                                                        <div class="col">
                                                        <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 5</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 6</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 7</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 8</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 9</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="col ">
                                                        <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 10</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 11</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Grade 12</span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                                </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm"><i>Others</i></span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
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
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">cable tv</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">non-cable tv</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">basic cellphone</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">smartphone</label>
                                                            </div> 
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">tablet</label>
                                                            </div> 
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">radio</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">desktop computer</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">laptop</label>
                                                            </div>                                             
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">none</label>
                                                            </div>                                             
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm"><i>Others</i></span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
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
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">No. (if No, proceed to D7)</label>
                                                            </div>
                                                    </div>
                                                    <div class="col form-group">
                                                            <label for="basicInput">D6. How do you connect to the internet? Choose all that applies.
                                                            </label>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                    <label class="form-check-label" for="inlineCheckbox1">own mobile data</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                    <label class="form-check-label" for="inlineCheckbox1">own broadband (DSL, wireless fiber, satellite)</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                    <label class="form-check-label" for="inlineCheckbox1">computer shop</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                    <label class="form-check-label" for="inlineCheckbox1">other places outside the home with internet connection</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
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
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">online learning</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">television</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">radio</label>
                                                            </div>
                                                        
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">modular learning</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">combination of face to face with other modalities</label>
                                                            </div>                                                                                             
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm"><i>Others</i></span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
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
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">lack of available gadgets/equipment</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">insufficient load/data allowance</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">unstable internet connection</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">existing health condition</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">difficulty in independent learning</label>
                                                            </div> 
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">conflict with other activities</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">high electrical consumption</label>
                                                            </div>                                                                                             
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">distractions (i.e. social media, noise)</label>
                                                            </div>                                                                                             
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm"><i>Others</i></span>
                                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
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
                         <button type="reset"
                        class="btn btn-light-secondary me-1 mb-1" >Reset</button>
                        <button class="btn btn-primary me-1 mb-1" style="background-color: #009933; border-color: #009933;" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Add</button>
                        
                 </div> 
                 <?php include_once('includes/footer_html.php');  ?>
            </div> 
        </div>
      
    </div> 


  


      <!----------------------------------------------- FOR MODAL --------------------------------------------------------------------->
      <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
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
</div>


