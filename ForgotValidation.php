<?php
	session_start();
	include('DatabaseConnection.php');
	extract($_POST);
	$email = $_SESSION['email'];
	$pass = $_POST['pass'];
	
	$encpass = sha1($pass);
	$query = "UPDATE `registraion` SET `password`='$encpass' where email='$email' ";
	$result = $conn->query($query);
	if($result==1)
	{
		header('location:index.html');
	}
	else
	{
		header('location:ForgetPassVal.php');
	}
?>