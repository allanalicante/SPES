<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>
<script src="https://cdn.lordicon.com/lusqsztk.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="asset/js/pdfexport/jquery-3.5.1.js"></script>



<script>
     $(document).ready(function () 
          {
            $('#studlist').hide();             
        });

    function display(){    
        var togglethis = document.getElementById("firsttoggle");
        if (togglethis.checked)
        {
            $('#studlist').show();
        }
        else
        {
            $('#studlist').hide();
        }
    }
</script>

<style>
        /* The switch - the box around the slider */
    .switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 24px;
    }

    /* Hide default HTML checkbox */
    .switch input {
    opacity: 0;
    width: 0;
    height: 0;
    }

    /* The slider */
    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

    input:checked + .slider {
    background-color: #2196F3;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    }
</style>
<?php
if (!isset($_SESSION["role"])){
  header('location: login.php');
  exit();
}



?>

<div class="page-heading" id="mainbody">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>RECORDS ANALYSIS<!-- <a href="#">
                            <i style="vertical-align:middle;" class="bi bi-info-circle"></i></a> --></h3>                          
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Records Analysis</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-12">  <!-------------------- Basic Statistics Row 1 -------------------------->
                    <div class="row ">
                                         
                        <div class="col-12 col-lg-2 col-sm-3" <?php echo($_SESSION['role']=='Admin')?'': 'hidden'?>>                                                                     
                                <h6 class="text-muted font-semibold">Select Grade</h6>                                                                     
                                    <div class="form-group">
                                            <select class="form-select" aria-label=".form-select-lg example" style="background-image: none;" name="A4" id="A4" onchange="myFunction(this.options[this.selectedIndex].value)" required>
                                            <option value="1">All</option>
                                            <option value="2">Kinder</option>
                                            <option value="3">Grade 1</option>
                                            <option value="4">Grade 2</option>
                                            <option value="5">Grade 3</option>
                                            <option value="6">Grade 4</option>
                                            <option value="7">Grade 5</option>
                                            <option value="8">Grade 6</option>
                                            </select>                                           
                                    </div>             
                        </div> 
                    <div> 
                <div>  
                <hr class="mt-0">

                <div id="result">     

                </div>                                      
</div>


               <!--------------------------------  FOR VIEWING PROFILE MODAL -------------------------->

<div id="modal">
  <div class="modal fade" id="viewStudentProfile" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-md" id="printthismodal">
        <div class="modal-content" style="box-shadow:unset;">
              <div style="height: 40px" class="modal-header text-center">
                <h5 style="color:Black" class="modal-title w-100" id="exampleModalLabel1">STUDENT PROFILE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <form action="printstudentpdf.php" method="POST">
                <div class="modal-body" id="studentDetails">  
                </div>
                                                               
                <div style="height: 48px; margin: 1px; padding:1px;" class="modal-footer">  
                <input type="hidden" id="printId" name="printId">   
                    <button type="submit" id="mybuttons" name="printstudent" class="btn btn-light-secondary">Print</button>
                </div>
            </form>
        </div>      
      </div>
    </div>
</div>



<!-- code to load form -->
<script>
    $(document).ready(function(){
        /* display All data */
                $('#result').load("All.php");
    });

    /* display data depending on the value of selected option */
    function myFunction(chosen) {
        if (chosen == 1){ $('#result').load("All.php"); }
        else if (chosen == 2){ $('#result').load("render-chart.php?id=1"); }
        else if (chosen == 3){ $('#result').load("render-chart.php?id=2"); }
        else if (chosen == 4){ $('#result').load("render-chart.php?id=3"); }
        else if (chosen == 5){ $('#result').load("render-chart.php?id=4"); }
        else if (chosen == 6){ $('#result').load("render-chart.php?id=5"); }
        else if (chosen == 7){ $('#result').load("render-chart.php?id=6"); }
        else if (chosen == 8){ $('#result').load("render-chart.php?id=7"); }
        else { $('#result').load("All.php"); }
        }
</script>