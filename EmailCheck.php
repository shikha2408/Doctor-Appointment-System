<?php
	include('DatabaseConnection.php');
	
	if(isset($_POST['email']))
	{
		$eemail = $_POST['email'];
		$query = "select email from `registraion` where email='$eemail' ";
		$result = $conn->query($query);
		$num =  $result->num_rows;
		if($num==1)
		{
			echo "Email is already exites";
		}
		else
		{
			echo "Email success";
		}	
		
	}
	
	
	
	
	
	if(isset($_POST['mobile']))
	{
		$emobile = $_POST['mobile'];
	
		$query = "select mobile from `registraion` where mobile='$emobile' ";
	
		$result = $conn->query($query);
		$num =  $result->num_rows;
		if($num==1)
		{
			echo "Mobile Number is already exites ";
		}
		else
		{
			echo "Mobile success";
		}	
	}
	
	
?>