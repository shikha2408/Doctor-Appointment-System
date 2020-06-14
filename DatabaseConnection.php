<?php
	$conn=mysqli_connect("localhost:3306","root","");
	mysqli_select_db($conn,"iotproject");
	if($conn)
	{
		
	}
	else
	{
		echo "data base connection is Failed ";
	}
?>