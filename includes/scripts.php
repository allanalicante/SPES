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
?>