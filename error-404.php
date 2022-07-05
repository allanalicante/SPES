<?php
if (!isset($_SESSION["role"])){
    header('location: login.php');
    exit();
}
?>
    <div id="error">
        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                <img class="img-error" style="text-align:center;" width="100%" height="auto" src="asset/images/samples/error-404.png" alt="Not Found">
                <div class="text-center">
                    <h1 class="error-title">NOT FOUND</h1>
                    <p class='fs-5 text-gray-600'>The page you are looking for is not found.</p>
                </div>
            </div>
        </div>
    </div>

