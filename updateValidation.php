<?php
	include('DatabaseConnection.php');
	if(isset($_POST['cemail']))
	{
		
		$response = array();
		$email=$_POST['cemail'];
		$query ="select name,gender,email,product_number,mobile,regdate from `registraion` where email='$email' ";
		$result = $conn->query($query);
		$num =  $result->num_rows;
		
		if($num==1)
		{
			$row= $result->fetch_assoc();
			$response = $row;
		}
		echo json_encode($response);
	}
	
	
	if(isset($_POST['rec']))
	{
		extract($_POST);
		$query = "update `registraion` set name='$name',email='$email',gender='$gender',product_number='$prod', mobile='$mobile' where email='$email' ";
		$result = $conn->query($query);
		if($result==1)
		{
			echo "Profile Updated";
		}
		else
		{
			echo "Profile Not Updated";
		}
	}
	
	if(isset($_POST['emi']))
	{
		extract($_POST);
		$pass = $_POST['pass'];
		$encpass = sha1($pass);
		$query = "update `registraion` set password='$encpass' where email='$emi' ";
		$result = $conn->query($query);
		if($result==1)
		{
			echo "Password Change";
		}
		else
		{
			echo "Password Not Change";
		}
	}


?>