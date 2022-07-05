<?php include_once('includes/head_html.php');

session_start();
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


 
    
        <div id="main" style="margin-left:20px">
            <section class="section">
                            <div style="width: auto;"class="card">
                                <div style="background-color: lightgray" class="card-header">
                                    <h4 class="card-title">STUDENT STATUS</h4>
                                    <p class="card-title">In this page, you can check your admission status using your assigned LRN (Learner Reference Number). <br>
                                    or by using your personal information formatted as first name, last name, birthday (yyyy-mm-dd).<br>
                                    Ex. Juan Dela Cruz 2010-01-31
                                    </p>
                                </div>
                                <br>
                                <div style="padding-top: .2rem;" class="card-body">
                                    <div class="row">
                                        <div class="col-md-2 col-lg-4">
                                            <div class="form-group">
                                                <div class="searchdiv">
                                                    <label for="search lrn">Search Data</label> 
                                                        <div class="input-group mb-3">                                               
                                                            <input type="text" class="form-control" name="search_lrn" id="search_lrn" 
                                                            required oninvalid="this.setCustomValidity('Please enter your first and last name separated by a space (e.g. Jane Miller)');" onchange="try{setCustomValidity('')}catch(e){};" x-moz-errormessage="Please enter your first and last name separated by a space (e.g. Jane Miller)">
                                                                <button  class="btn btn-primary" type="submit" id="verifylrn2">                                                       
                                                                <i class="bi bi-search"></i></button><br>
                                                        </div>
                                                                <span id= "message2"></span>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>

                                    <div class="card-body brand">
                                        <div class="table-responsive container"> 
                                            <div id="result">

                                            </div>
                                        </div>
                                    </div>
                                         <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                <a href="enroll-now.php"><button type="button" class="btn btn-light-secondary">Go Back</button></a>      
                                                </div>
                                            </div>                                   
                                        </div>   
                                </div>
                            </div>
                     </section>
                </div>
      
            <?php include_once('includes/footer_html.php');?>
            </div> 
        </div>
</div> 

<script>
    $(document).ready(function(){
        $('#verifylrn2').click(function(){
            var message = $('#message2'); 
            var txt = $('#search_lrn').val();
             if(txt!='')
             {
                $('#result').html('');
                $.ajax({
                    url:"getlevel.php", 
                    method:"post",
                    data:{search2:txt},
                    dataType:"text",
                    success:function(data)
                    {
                        $('#result').html(data);
                    }
                })              
                message.html("");
                $('#result').show();
             }
             else
             {
                message.css("color", "red");
                message.html("Field is empty.");
                $('#result').hide();
             }
        });
    });
</script>

    

