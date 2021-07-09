        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p><?php echo date("Y"); ?>&copy; Student Regitration and Management System</p>
                </div>
                <div class="float-end">
                    <p>Powered by <a
                            href="http://www.ccdisorsogon.edu.ph">CCDI Sorsogon</a></p>
                </div>
            </div>
        </footer>
        </div>
</div> <!-- /app-->

    <script src="asset/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="asset/js/bootstrap.bundle.min.js"></script>

<?php
    if (isset($page) && $page=='dashboard'){
?>
    <script src="asset/vendors/apexcharts/apexcharts.js"></script>
    <script src="asset/js/pages/dashboard.js"></script>
    <script src="asset/js/main.js"></script>
    <script src="https://cdn.lordicon.com//libs/frhvbuzj/lord-icon-2.0.2.js"></script>
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
?>

</body>
</html>