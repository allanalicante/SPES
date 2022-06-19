        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="text-center">
                    <p><?php echo date("Y"); ?>&copy; Student Registration and Management System
                - Powered by <a href="http://www.ccdisorsogon.edu.ph">CCDI Sorsogon</a></p>
                </div>
            </div>
        </footer>
        </div>
</div> <!-- /app-->

   <?php
if (isset($page) && ($page=='dashboard')){
    ?>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/pages/dashboard.js"></script>
    <script src="asset/js/main.js"></script>
    <script src="asset/js/extensions/lord-icon-2.0.2.js"></script>
    <?php 
}
elseif (isset($data) && ($data=='student-list')){   
    ?>
        <script src="asset/js/pdfexport/jquery-3.5.1.js"></script>
        <script src="asset/js/pdfexport/jquery.dataTables.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.buttons.min.js"></script>
        <script src="asset/js/pdfexport/buttons.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/jszip.min.js"></script>
        <script src="asset/js/pdfexport/pdfmake.min.js"></script>
        <script src="asset/js/pdfexport/vfs_fonts.js"></script>
        <script src="asset/js/pdfexport/buttons.html5.min.js"></script>
        <script src="asset/js/pdfexport/buttons.print.min.js"></script>
        <script src="asset/js/pdfexport/buttons.colVis.min.js"></script>
        <script src="asset/js/extensions/sweetalert.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function (){
                var dataTable = $('#table1').DataTable( {
                    lengthChange: true,
                    order: [[1, 'asc']],
                    buttons: [
                            {
                                extend: 'copy',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'excel',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'pdf',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            'colvis'
                        ],
                });
                dataTable.buttons().container()
                    .appendTo( '#table1_wrapper .col-md-6:eq(0)');

                $('#secondfilter, #thirdfilter, #fourthfilter, #fifthfilter').on('change', function (){
                    var gender = $('#secondfilter').val();
                    var barangay = $('#thirdfilter').val();
                    var modality = $('#fourthfilter').val();
                    var grade = $('#fifthfilter').val();
                    var role = $('#role').val();
                    $.ajax({
                        url:"ajaxfile2.php",
                        type:"POST",
                        data: 
                        {
                            gender:gender,
                            barangay:barangay,
                            modality:modality,
                            grade:grade,
                            role:role
                        },
                        success:function(data){
                            $(".container").html(data);
                        }
                    });
                });
            
            });
        </script>
    <?php
        if(isset($_SESSION['status']) && $_SESSION['status'] !='')
        {
            ?>      
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
    <script>
            // Script for Simple Datatable with pagination and search enabled
        /*    let table1 = document.querySelector('#table1');
            let dataTable = new simpleDtatables.DataTable(table1); */
            //Script for displaying modal for editing student section
            $(document).ready(function() {
            $(document).on('click','.editStudentSection',function(){  
                      
                $('#editStudentSection').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#editstud_id').val(data[0]);
                 /* $('#updateimage').val(data[1]); */ 
                $('#editlrn').val(data[3]);
                $('#editfirstname').val(data[5]);
                $('#editmiddlename').val(data[6]);
                $('#editlastname').val(data[7]);

                $('#editlevelsectionid1').val(data[9]);
                var grade = data[9];   
                console.log(grade);
                 $.ajax({
                    data:{grade:grade},
                    method: "POST",
                    url: "getlevel.php",
                    success: function(data)
                    {
                        $('#editGradeSection').html(data)
                        console.log(data);
                    }
                  }) 
                });  
             });

              //Script for displaying modal for admin editing student section
            $(document).ready(function() {
            $(document).on('click','.admineditStudentSection',function(){  
                      
                $('#admineditStudentSection').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#admineditstud_id').val(data[0]);
                 /* $('#updateimage').val(data[1]); */ 
                $('#admineditfirstname').val(data[4]);
                });  
             });

             // Script for display sweetalern information for registration
            $(document).on('click','.showInfo',function(){             
                $('#showInfo').modal('show');
                }); 
       
             //Script for displaying student information
            $(document).ready(function(){
            $(document).on('click','.viewStudentProfile',function(){
                var studentDetails = $(this).attr("id");
                $.ajax({
                url:"getlevel.php",
                method:"post",
                data: {studentDetails:studentDetails},
                success:function(data){
                    $('#studentDetails').html(data);
                    $('#printId').val(studentDetails);
                    $('#viewStudentProfile').modal('show');
                      }
                    });         
                });
             });  
             
    </script> 
 <?php 
}
elseif(isset($data) && ($data=='pending-student')){
    ?>       
        <script src="asset/js/pdfexport/jquery-3.5.1.js"></script>
        <script src="asset/js/pdfexport/jquery.dataTables.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.buttons.min.js"></script>
        <script src="asset/js/pdfexport/buttons.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/jszip.min.js"></script>
        <script src="asset/js/pdfexport/pdfmake.min.js"></script>
        <script src="asset/js/pdfexport/vfs_fonts.js"></script>
        <script src="asset/js/pdfexport/buttons.html5.min.js"></script>
        <script src="asset/js/pdfexport/buttons.print.min.js"></script>
        <script src="asset/js/pdfexport/buttons.colVis.min.js"></script>
        <script src="asset/js/extensions/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#table1').DataTable( {
                    lengthChange: true,
                  /*   buttons: [
                        {
                            extend: 'copy', 
                            split: [ 'csv', 'excel', 'pdf', 'print'],
                        },
                        'colvis'
                    ] */
                } );          
               /*  table.buttons().container()
                    .appendTo( '#table1_wrapper .col-md-6:eq(0)' ); */
            } );
        </script>
    <?php
     if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
        ?>      
        <script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                text: "<?php echo $_SESSION['text']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Continue",
            });
        </script>
        <?php
        unset($_SESSION['status']);
        }
    ?>
        <script>
            // Script to open a modal for editing and assigning class
            $(document).ready(function() {
            $(document).on('click','.assignGradeLevel',function(){         
                $('#assignGradeLevel').modal('show');

                $('.Decline').hide();

                //$('.Accepted').prop('checked',true);
                $('#declinepending').hide();   
                $('.Accept').hide();
                $('#updatepending').show(); 
                    
        
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#pendingId').val(data[0]);
                $('#pendingname').val(data[4]);
                $('#level').val(data[7]);
                $('#contact').val(data[9]);
                var grade = data[7];
                console.log(grade);
                 $.ajax({
                    data:{grade:grade},
                    method: "POST",
                    url: "getlevel.php",
                    success: function(data)
                    {
                        $('#GradeSection').html(data)
                        console.log(data);
                    }
                    }) 
                }); 

            });
   
            // Script to open a modal for removing student    
            $(document).ready(function() {
            $(document).on('click','.removeStudent',function(){   
                $('#removeStudent').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#removeStudentID').val(data[0]);
                $('#removename').text(data[4]);             
                });  
                });

            // Script for display sweetalern information for registration
            $(document).on('click','.showInfo',function(){             
                $('#showInfo').modal('show');
                }); 
                
            //Script for displaying modal for verifying student information
            $(document).ready(function(){
            $(document).on('click','.verifyModal',function(){
            var verifyStudents = $(this).attr("id");
            $.ajax({
            url:"getlevel.php",
            method:"post",
            data: {verifyStudents:verifyStudents},
            success:function(data){
                $('#verifyStudents').html(data);
                $('#printId').val(verifyStudents);
                $('#verifyModal').modal('show');
            }
            });         
            });
            });
        </script>
    <?php 
}
elseif(isset($data) && ($data =='section-list')){
    ?>
      <script src="asset/js/pdfexport/jquery-3.5.1.js"></script>
        <script src="asset/js/pdfexport/jquery.dataTables.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.buttons.min.js"></script>
        <script src="asset/js/pdfexport/buttons.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/jszip.min.js"></script>
        <script src="asset/js/pdfexport/pdfmake.min.js"></script>
        <script src="asset/js/pdfexport/vfs_fonts.js"></script>
        <script src="asset/js/pdfexport/buttons.html5.min.js"></script>
        <script src="asset/js/pdfexport/buttons.print.min.js"></script>
        <script src="asset/js/pdfexport/buttons.colVis.min.js"></script>
        <script src="asset/js/extensions/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#table1').DataTable( {
                    lengthChange: true,
                    order: [[1, 'asc']],
                  /*   buttons: [
                        {
                            extend: 'copy', 
                            split: [ 'csv', 'excel', 'pdf', 'print'],
                        },
                        'colvis'
                    ] */
                } );          
               /*  table.buttons().container()
                    .appendTo( '#table1_wrapper .col-md-6:eq(0)' ); */
            } );
        </script>

    <script>
            $(document).ready(function() {
                var table = $('#table2').DataTable( {
                    lengthChange: true,
                    order: [[1, 'asc']],
                  /*   buttons: [
                        {
                            extend: 'copy', 
                            split: [ 'csv', 'excel', 'pdf', 'print'],
                        },
                        'colvis'
                    ] */
                } );          
               /*  table.buttons().container()
                    .appendTo( '#table1_wrapper .col-md-6:eq(0)' ); */
            } );
    </script>
  <?php
     if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
        ?>      
        <script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                text: "<?php echo $_SESSION['text']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Continue",
            });
        </script>
   
   <?php
   unset($_SESSION['status']);
   }
   ?>
    <script>

                //Script for displaying modal for classes modification
                $(document).ready(function() {
                $(document).on('click','.editLevel',function(){          
                    $('#editmodallevel').modal('show');
                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();
                    console.log(data);
                    $('#update_id').val(data[0]);
                    $('#editlevel').val(data[2]);
                    $('#editsection').val(data[3]);
                    $('#editadvisory').val(data[5]);
                    $('#editgradeid').val(data[6]);
                    var gradeadvisor = data[2];             
                    console.log(gradeadvisor);
                            $.ajax({
                                data:{gradeadvisor:gradeadvisor},
                                method: "POST",
                                url: "getlevel.php",
                                success: function(data)
                                {
                                    $('#editadvisor').html(data)
                                    console.log(data);
                                }
                            })       
                            });  
                            });


                //Script for removing class with modal
                $(document).ready(function(){
                $(document).on('click','.removeLevel',function(){          
                    $('#removemodallevel').modal('show');
                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();
                    console.log(data);
                    $('#removeId').val(data[0]);
                    $('#totalstudents').val(data[5]);
                });  
                });

                //Script for displaying section details
                $(document).ready(function(){
                $(document).on('click','.tableModal',function(){
                    var sectionid = $(this).attr("id");                 
                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function() {
                    return $(this).text();
                    }).get();
                    console.log(data);
                    $('#sectioner').val(data[0]);
                    $('#gradelevel').val(data[2]);
                    $('#gradesection').val(data[3]);
                    $('#advisorcheck').val(data[4]);
                    $('#male').val(data[7]);
                    $('#female').val(data[8]);
                    $('#total').val(data[9]);
                    $.ajax({
                    url:"getlevel.php",
                    method:"post",
                    data: {sectionid:sectionid},
                    success:function(data){
                        
                        $('#sectiondetails').html(data);
                        $('#tableModal').modal('show');
                    }
                    });          
                    });
                    });

               

           
                
                //Script for adding teacher per class
                $(document).ready(function() {
                $(document).on('click','.addTeacherClass',function(){                
                $('#addModal').modal('show');           
            });  
            });
    </script>
 <?php
}
elseif(isset($data) && ($data =='teacher-list')){
    ?>
        <script src="asset/js/pdfexport/jquery-3.5.1.js"></script>
        <script src="asset/js/pdfexport/jquery.dataTables.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.buttons.min.js"></script>
        <script src="asset/js/pdfexport/buttons.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/jszip.min.js"></script>
        <script src="asset/js/pdfexport/pdfmake.min.js"></script>
        <script src="asset/js/pdfexport/vfs_fonts.js"></script>
        <script src="asset/js/pdfexport/buttons.html5.min.js"></script>
        <script src="asset/js/pdfexport/buttons.print.min.js"></script>
        <script src="asset/js/pdfexport/buttons.colVis.min.js"></script>
        <script src="asset/js/extensions/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#table1').DataTable( {
                    lengthChange: true,
                } );          

            } );
        </script>
  <?php
     if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
        ?>      
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
    <script>

        // Script for displaying modal for adding teacher/user
        $(document).ready(function() {
            $(document).on('click','.ManageTeacher',function(){               
                $('#editTeacherModal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#updateid').val(data[0]);
                $('#updateimage').val(data[2]);
                $('#updatename').val(data[3]);
                $('#updatecontactno').val(data[4]);
                $('#updateaddress').val(data[5]);
                $('#updategradetohandle').val(data[6]);
                $('#updatestatus').val(data[7]);
                $('#updateusername').val(data[8]);
                $('#updatepassword').val(data[9]);
            });  
            });      
        // Script for displaying modal for removing or deleting teacher
        $(document).ready(function() {
            $(document).on('click','.removeteacher',function(){          
                $('#deletemodalteacher').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#deleteteacherid').val(data[0]);
            });  
        });
    </script>
    <?php
}
elseif(isset($data) && ($data =='student-report-list')){
    ?>
        <script src="asset/js/pdfexport/jquery-3.5.1.js"></script>
        <script src="asset/js/pdfexport/jquery.dataTables.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.buttons.min.js"></script>
        <script src="asset/js/pdfexport/buttons.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/jszip.min.js"></script>
        <script src="asset/js/pdfexport/pdfmake.min.js"></script>
        <script src="asset/js/pdfexport/vfs_fonts.js"></script>
        <script src="asset/js/pdfexport/buttons.html5.min.js"></script>
        <script src="asset/js/pdfexport/buttons.print.min.js"></script>
        <script src="asset/js/pdfexport/buttons.colVis.min.js"></script>
        <script src="asset/js/extensions/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#table1').DataTable( {
                    lengthChange: false,
                    buttons: [
                            {
                                extend: 'copy',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'excel',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'pdf',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            'colvis'
                        ],
                } );          
                table.buttons().container()
                    .appendTo( '#table1_wrapper .col-md-6:eq(0)' );
            } );
        </script>
 
    <?php
}
elseif(isset($data) && ($data =='class-report-list')){
    ?>
        <script src="asset/js/pdfexport/jquery-3.5.1.js"></script>
        <script src="asset/js/pdfexport/jquery.dataTables.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.buttons.min.js"></script>
        <script src="asset/js/pdfexport/buttons.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/jszip.min.js"></script>
        <script src="asset/js/pdfexport/pdfmake.min.js"></script>
        <script src="asset/js/pdfexport/vfs_fonts.js"></script>
        <script src="asset/js/pdfexport/buttons.html5.min.js"></script>
        <script src="asset/js/pdfexport/buttons.print.min.js"></script>
        <script src="asset/js/pdfexport/buttons.colVis.min.js"></script>
        <script src="asset/js/extensions/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#table1').DataTable( {
                    lengthChange: true,
                    order: [[1, 'asc']],
                    buttons: [
                        {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                    ]
                } );          
                table.buttons().container()
                    .appendTo( '#table1_wrapper .col-md-6:eq(0)' );

                    $('#A4').on('change', function (){
                    var value = $(this).val();
                    
                    $.ajax({
                        url:"getlevel.php",
                        type:"POST",
                        data: {gradelevelfilter:value},
                        success:function(data){
                            $(".container").html(data);
                        }
                        });
                    });
                        });
        </script>
    <?php
}
elseif(isset($data) && ($data =='SPED-report-list')){
    ?>
       <script src="asset/js/pdfexport/jquery-3.5.1.js"></script>
        <script src="asset/js/pdfexport/jquery.dataTables.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.buttons.min.js"></script>
        <script src="asset/js/pdfexport/buttons.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/jszip.min.js"></script>
        <script src="asset/js/pdfexport/pdfmake.min.js"></script>
        <script src="asset/js/pdfexport/vfs_fonts.js"></script>
        <script src="asset/js/pdfexport/buttons.html5.min.js"></script>
        <script src="asset/js/pdfexport/buttons.print.min.js"></script>
        <script src="asset/js/pdfexport/buttons.colVis.min.js"></script>
        <script src="asset/js/extensions/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#table1').DataTable( {
                    lengthChange: false,
                    buttons: [
                            {
                                extend: 'copy',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'excel',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'pdf',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            'colvis'
                        ],
                } );          
                table.buttons().container()
                    .appendTo( '#table1_wrapper .col-md-6:eq(0)' );


                       //Script for displaying student information
            $(document).ready(function(){
            $(document).on('click','.viewStudentProfile',function(){
                var studentDetails = $(this).attr("id");
                $.ajax({
                url:"getlevel.php",
                method:"post",
                data: {studentDetails:studentDetails},
                success:function(data){
                    $('#studentDetails').html(data);
                    $('#printId').val(studentDetails);
                    $('#viewStudentProfile').modal('show');
                      }
                    });         
                });
             });  
            } );
        </script>

        
    <?php
}
elseif(isset($data) && ($data =='graduate-list')){
    ?>
        <script src="asset/js/pdfexport/jquery-3.5.1.js"></script>
        <script src="asset/js/pdfexport/jquery.dataTables.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.buttons.min.js"></script>
        <script src="asset/js/pdfexport/buttons.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/jszip.min.js"></script>
        <script src="asset/js/pdfexport/pdfmake.min.js"></script>
        <script src="asset/js/pdfexport/vfs_fonts.js"></script>
        <script src="asset/js/pdfexport/buttons.html5.min.js"></script>
        <script src="asset/js/pdfexport/buttons.print.min.js"></script>
        <script src="asset/js/pdfexport/buttons.colVis.min.js"></script>
        <script src="asset/js/extensions/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#table1').DataTable( {
                    lengthChange: true,
                    buttons: [
                        {
                            extend: 'copy', 
                            split: [ 'csv', 'excel', 'pdf', 'print'],
                        }
                    ]
                } );          
                table.buttons().container()
                    .appendTo( '#table1_wrapper .col-md-6:eq(0)' );
            } );
        </script>
    <?php
}
elseif(isset($data) && ($data =='dropout-list')){
    ?>
     <script src="asset/js/pdfexport/jquery-3.5.1.js"></script>
        <script src="asset/js/pdfexport/jquery.dataTables.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.buttons.min.js"></script>
        <script src="asset/js/pdfexport/buttons.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/jszip.min.js"></script>
        <script src="asset/js/pdfexport/pdfmake.min.js"></script>
        <script src="asset/js/pdfexport/vfs_fonts.js"></script>
        <script src="asset/js/pdfexport/buttons.html5.min.js"></script>
        <script src="asset/js/pdfexport/buttons.print.min.js"></script>
        <script src="asset/js/pdfexport/buttons.colVis.min.js"></script>
        <script src="asset/js/extensions/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#table1').DataTable( {
                    lengthChange: true,
                    buttons: [
                        {
                            extend: 'copy', 
                            split: [ 'csv', 'excel', 'pdf', 'print'],
                        }
                    ]
                } );          
                table.buttons().container()
                    .appendTo( '#table1_wrapper .col-md-6:eq(0)' );
            } );
        </script>
    <?php
}
elseif(isset($data) && ($data =='transferred-list')){
    ?>
      <script src="asset/js/pdfexport/jquery-3.5.1.js"></script>
        <script src="asset/js/pdfexport/jquery.dataTables.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.buttons.min.js"></script>
        <script src="asset/js/pdfexport/buttons.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/jszip.min.js"></script>
        <script src="asset/js/pdfexport/pdfmake.min.js"></script>
        <script src="asset/js/pdfexport/vfs_fonts.js"></script>
        <script src="asset/js/pdfexport/buttons.html5.min.js"></script>
        <script src="asset/js/pdfexport/buttons.print.min.js"></script>
        <script src="asset/js/pdfexport/buttons.colVis.min.js"></script>
        <script src="asset/js/extensions/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#table1').DataTable( {
                    lengthChange: true,
                    buttons: [
                        {
                            extend: 'copy', 
                            split: [ 'csv', 'excel', 'pdf', 'print'],
                        }
                    ]
                } );          
                table.buttons().container()
                    .appendTo( '#table1_wrapper .col-md-6:eq(0)' );
            } );
        </script>
    <?php
}
elseif(isset($page) && $page=='schoolyear'){
      ?>
        <script src="asset/js/pdfexport/jquery-3.5.1.js"></script>
        <script src="asset/js/pdfexport/jquery.dataTables.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.buttons.min.js"></script>
        <script src="asset/js/pdfexport/buttons.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/jszip.min.js"></script>
        <script src="asset/js/pdfexport/pdfmake.min.js"></script>
        <script src="asset/js/pdfexport/vfs_fonts.js"></script>
        <script src="asset/js/pdfexport/buttons.html5.min.js"></script>
        <script src="asset/js/pdfexport/buttons.print.min.js"></script>
        <script src="asset/js/pdfexport/buttons.colVis.min.js"></script>
        <script src="asset/js/extensions/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#table1').DataTable( {
                    lengthChange: true
 
                } );          

            } );
        </script>
      <?php
         if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
            ?>      
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
        <script>

            //Script for displaying modal for editing active school year
            $(document).ready(function() {
                $(document).on('click','.EditSchoolYear',function(){             
                    $('#editmodalschoolyear').modal('show');
                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();
                    console.log(data);
                    $('#editschoolyearid').val(data[0]);
                    $('#editSchoolYear').val(data[1]);
                    $('#editSchoolHead').val(data[2]);
                    $('#editStatus').val(data[3]);
                    $('#editprocess').val(data[4]);
                });  
                });
            
            //Script for displaying modal for deleting active school year
            $(document).ready(function() {
                $(document).on('click','.DeleteSchoolYear',function(){                 
                    $('#deletemodalschoolyear').modal('show');
                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();
                      console.log(data);
                    $('#deleteschoolyearid').val(data[0]);
                });  
            });


            //Script for displaying modal for editing admin            
            $(document).ready(function() {
                $(document).on('click','.EditAdmin',function(){             
                    $('#EditAdmin').modal('show');
                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();
                    console.log(data);
                    $('#editID').val(data[1]);
                    $('#editname').val(data[2]);
                    $('#editcontact').val(data[3]);
                    $('#editaddress').val(data[4]);
                    $('#editusername').val(data[5]);
                    $('#editpassword').val(data[6]);
                });  
                });
        </script>
    <?php
}
elseif(isset($page) && $page=='profile'){
    ?>
        <script src="asset/js/bootstrap.min.js"></script>
        <script src="asset/js/pdfexport/jquery-3.5.1.js"></script>
        <script src="asset/vendors/simple-datatables/simple-datatables.js"></script>
        <script src="asset/js/extensions/sweetalert.min.js"></script>
    <?php
     if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
        ?>      
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

}
elseif(isset($page) && $page=='section'){
    ?>
      <script src="asset/js/pdfexport/jquery-3.5.1.js"></script>
        <script src="asset/js/pdfexport/jquery.dataTables.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/dataTables.buttons.min.js"></script>
        <script src="asset/js/pdfexport/buttons.bootstrap4.min.js"></script>
        <script src="asset/js/pdfexport/jszip.min.js"></script>
        <script src="asset/js/pdfexport/pdfmake.min.js"></script>
        <script src="asset/js/pdfexport/vfs_fonts.js"></script>
        <script src="asset/js/pdfexport/buttons.html5.min.js"></script>
        <script src="asset/js/pdfexport/buttons.print.min.js"></script>
        <script src="asset/js/pdfexport/buttons.colVis.min.js"></script>
        <script src="asset/js/extensions/sweetalert.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function (){
                var dataTable = $('#table1').DataTable( {
                    lengthChange: true,
                    buttons: [
                            {
                                extend: 'copy',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'excel',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'pdf',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            'colvis'
                        ],
                });
                dataTable.buttons().container()
                    .appendTo( '#table1_wrapper .col-md-6:eq(0)');

                $('#secondfilter, #thirdfilter, #fourthfilter, #fifthfilter').on('change', function (){
                    var gender = $('#secondfilter').val();
                    var barangay = $('#thirdfilter').val();
                    var modality = $('#fourthfilter').val();
                    var sectionid = $('#sectioner').val();
                    $.ajax({
                        url:"ajaxfile.php",
                        type:"POST",
                        data: 
                        {
                            gender:gender,
                            barangay:barangay,
                            modality:modality,
                            sectionid:sectionid
                        },
                        success:function(data){
                            $(".container").html(data);
                        }
                    });
                });
            
            });
        </script>
    <script>
        //Script for displaying student information
        $(document).ready(function(){
            $(document).on('click','.viewStudentProfile',function(){
                var studentDetails = $(this).attr("id");
                $.ajax({
                url:"getlevel.php",
                method:"post",
                data: {studentDetails:studentDetails},
                    success:function(data){
                        $('#studentDetails').html(data);
                        $('#printId').val(studentDetails);
                        $('#viewStudentProfile').modal('show');
                    }
                });         
            });

            $(document).on('click','.editStudentSection',function(){  
                      
                      $('#editStudentSection').modal('show');
                      $tr = $(this).closest('tr');
                      var data = $tr.children("td").map(function() {
                          return $(this).text();
                      }).get();
                      console.log(data);
                      $('#editstud_id').val(data[11]);
                       /* $('#updateimage').val(data[1]); */ 
                      $('#editlrn').val(data[1]);
                      $('#editfirstname').val(data[3]);
                      $('#editmiddlename').val(data[4]);
                      $('#editlastname').val(data[5]);
      
                      $('#editlevelsectionid1').val(data[7]);
                      var grade = data[7];   
                      console.log(grade);
                       $.ajax({
                          data:{grade:grade},
                          method: "POST",
                          url: "getlevel.php",
                          success: function(data)
                          {
                              $('#editGradeSection').html(data)
                              console.log(data);
                          }
                        }) 
                      }); 
        });
    </script>
    <?php  
}
?>
        <script src="asset/js/main.js"></script>
        <script src="asset/js/bootstrap.min.js"></script>  
</body>
</html>