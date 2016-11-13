<?php 
	session_start();
	session_destroy();
	unset($_SESSION["user_name"]);  
	unset($_SESSION["nicename"]);  
	header("Location: login.php");
?>