<?php
	include('DatabaseConnection.php');
	extract($_POST);
	
	$cotp = rand(1000,9999);
	$subject = "For Testing Purpose Only";
	$body = "Hellow, Welcome the IOT your OTP is $cotp Thank You Have a nice day ";
	$headers = "From: gaurav19mca1072@gmail.com";
	if (mail($cemail, $subject, $body, $headers))
	{
		echo "Email successfully sent to $cemail...";
	} 
	else 
	{
		echo "Email sending failed...";
	}
	function insertData()
	{
		echo  "hellow Gaurav Kumar ";
		echo "$cgender  $cpronum $cmobile $cpassword ";
		$query ="INSERT INTO `registraion`(`Name`, `Gender`, `Email`, `Product_Number`, `Mobile`, `password`,`otp`) VALUES (?,?,?,?,?,?,?) ";
		$result =mysqli_prepare($conn,$query);
		
		if($result)
		{
			mysqli_stmt_bind_param($result,'sssssss',$name,$gender,$email,$product_number,$mobile,$password);
			$name = $cname;
			$gender = $cgender;
			$email = $cemail;
			$product_number = $cpronum;
			$mobile = $cmobile;
			$password = $cpassword;
			$otp = $cotp;
			
			mysqli_stmt_execute($result);
			
			$num = mysqli_stmt_affected_rows($result);
			echo "<br> Number of row is   $num";
		}
		return $num;
	}
	
	echo "name is $cname <br>" ; 
	echo "email id is $cemail <br>";
	
	//header('location:otp.php');
?>