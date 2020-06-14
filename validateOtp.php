<?php
	session_start();
	include('DatabaseConnection.php');
	$cotp = $_POST['ccotp'];
	$email = $_SESSION['email'];
	$qer = "SELECT `otp` FROM `registraion` where email='$email' ";
	$result=mysqli_prepare($conn,$qer);
	mysqli_stmt_bind_result($result,$otp);
	mysqli_stmt_execute($result);
	mysqli_stmt_fetch($result);
	
	if($cotp==$otp)
	{
		header('location:index.html');
	}
	else
	{
		header('location:otp.php');
	}
?>