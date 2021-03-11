<?php
  session_start();
	$username=$_POST["username"];
	$password=$_POST["password"];

		if ($username == "admin" && $password == "admin") {
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;
			$_SESSION['login']=$login;
			header('Location:admin.php');
			exit();
		}
		else {
			header('Location:index.php');
			exit();
		}

	
?>