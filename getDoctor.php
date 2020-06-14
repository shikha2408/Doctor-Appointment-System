<?php
    include('DatabaseConnection.php');
    extract($_POST);
    $response = array();
    $sql ="select name,expertise,contact,email,address,fee from doctor where address='$address' and expertise='$exp'  ";
  

    $result = $conn->query($sql);
	$num =  $result->num_rows;
		
	if($num>1)
	{
		$row= $result->fetch_assoc();
		$response = $row;
	}
	echo json_encode($response);

?>