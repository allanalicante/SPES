<?php

if (!isset($_SESSION["role"])){
    header('location: login.php');
    exit();
}

    error_reporting(0);

	include 'backup_function.php';

	if(isset($_POST['backupnow'])){
		
	
		$password = $_POST['password'];
		$dbname = $_POST['dbname'];

		
		backDb("localhost","root", $password, $dbname);

		exit();
		
	}
	else{
		echo 'Add All Required Field';
	}

?>