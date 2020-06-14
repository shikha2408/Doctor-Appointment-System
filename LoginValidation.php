<?php
	include('DatabaseConnection.php');
	extract($_POST);
	
	$pass = $_POST['cpassword'];
	
	$encpass = sha1($pass);
	$query ="select name,email,image,coExp from `registraion` where email='$cemail' and password='$encpass' ";
	
	$result = $conn->query($query);
	$num =  $result->num_rows;
	if($num ==1)
	{
		session_start();
		session_unset();
		session_destroy();
	
		$row = $result->fetch_assoc();
		session_start();
		$_SESSION['email']=$row['email'];
		$_SESSION['Name']=$row['name'];
		$image=$row['image'];
		if($image!=null)
		{
			$_SESSION['image']=$image;
		}
		if(isset($_COOKIE["NoOfHit"]))
		{
			$d =(int) $row['coExp'];
			$num = $_COOKIE['NoOfHit'];
			$num++;
			setcookie("NoOfHit",$num,$d);
			$email=$_SESSION['email'];
			$q="update `registraion` set cookie='$num' where email='$email' ";
			$res = $conn->query($q);
		}
		else
		{
			setcookie("NoOfHit",1,time()+(60*60*24*30));
		}	
		header('location:Home.php');
	}
	else
	{
		header('location:ErrorIndex.html');
	}
?>