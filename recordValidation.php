<?php
	include('DatabaseConnection.php');
	extract($_GET);
	
	$query = "insert into `reccords` (name,email,product_number,temp,mode,datetime) values ('$name','$email','$product_number','$temp','$mode','$datetime')";
	
	$result = mysqli_query($conn,$query); 
	
	if($result==1)
	{
		echo "Record is Inserted successfully ";
	}
	else
	{
		echo "Record is Not Inserted successfully";
	}

?>