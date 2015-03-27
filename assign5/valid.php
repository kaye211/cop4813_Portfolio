<?php
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];

	$_SESSION['username'] = $username;

	if($username == "Alan" && $password == "Turing")
	{
		header("Location: admin.php");
		
	}else{
		header("Location: index.php?error=1");
	}


?>
