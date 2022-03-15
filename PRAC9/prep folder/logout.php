<?php
	session_start();
	
	if (!isset($_SESSION['account-connected'])) 
		header("Location: login.php");
	else if(isset($_SESSION['account-connected'])!="") 
		header("Location: account.php");
	
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION);
		header("Location: login.php");
		exit;
	}
?>