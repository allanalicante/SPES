        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p><?php echo date("Y"); ?>&copy; Student Registration and Management System</p>
                </div>
                <div class="float-end">
                    <p>Powered by <a
                            href="http://www.ccdisorsogon.edu.ph">CCDI Sorsogon</a></p>
                </div>
            </div>
        </footer>
        </div>
</div> <!-- /app-->
    <script src="asset/vendors/jquery/jquery.min.js"></script>
    <script src="asset/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="asset/js/bootstrap.bundle.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src=" https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
   

<?php
    if (isset($page) && $page=='dashboard'){
?>
    <script src="asset/vendors/apexcharts/apexcharts.js"></script>
    <script src="asset/js/pages/dashboard.js"></script>

    <script src="asset/js/main.js"></script>
    <script src="https://cdn.lordicon.com//libs/frhvbuzj/lord-icon-2.0.2.js"></script>
  
<?php }
elseif (isset($data) && ($data=='student-list')){
    ?>
         <script src="asset/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
      
 <?php }
    elseif(isset($data) && ($data =='admission-list')){ ?>
    <script src="asset/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
<?php
    }
    elseif(isset($data) && ($data =='section-list')){?>
 <script src="asset/vendors/simple-datatables/simple-datatables.js"></script>
 <script src="asset/vendors/jquery/jquery.min.js"></script>
 <script src="asset/js/bootstrap.bundle.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
    $('#table1').DataTable();
} );
</script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click','.editBtn',function(){
                 
                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#editlevel').val(data[1]);
                $('#editsection').val(data[2]);
                $('#editadvisory').val(data[4]);
            });  
        });
    </script>

<?php
    }
    elseif(isset($data) && ($data =='teacher-list')){ ?>
    <script src="asset/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
<?php
    }
?>
    <script src="asset/vendors/jquery/jquery.min.js"></script>
     <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/main.js"></script>
</body>
</html>