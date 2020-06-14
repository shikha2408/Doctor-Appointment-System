<?php
	session_start();
	include('DatabaseConnection.php');
	extract($_POST);
	
	$cotp = rand(1000,9999);
	$subject = "For Testing Purpose Only";
	$body = "Hellow, Welcome to  the IOT your OTP is $cotp Thank You Have a nice day ";
	$headers = "From: gaurav19mca1072@gmail.com";
	if (mail($cemail, $subject, $body, $headers))
	{
		echo "Email successfully sent to $cemail...";
	} 
	else 
	{
		echo "Email sending failed...";
	}
	date_default_timezone_set('Asia/Kolkata');
	$date = date('d-m-y h:i:s');

	$query ="INSERT INTO `registraion`(`Name`, `Gender`, `Email`, `Product_Number`, `Mobile`, `password`,`otp`,`regDate`) VALUES (?,?,?,?,?,?,?,?) ";
	//$query = "call insertData(?,?,?,?,?,?,?,?)";
	$result =mysqli_prepare($conn,$query);
	$_SESSION['email']=$cemail;
	if($result)
	{
		$pass = $_POST['cpassword'];
		
		$encpass = sha1($pass);
		
		mysqli_stmt_bind_param($result,'ssssssss',$name,$gender,$email,$product_number,$mobile,$password,$otp,$regDate);
		$name = $cname;
		$gender = $cgender;
		$email = $cemail;
		$product_number = $cpronum;
		$mobile = $cmobile;
		$password = $encpass;
		$otp = $cotp;
		$regDate = $date;
			
		mysqli_stmt_execute($result);
			
		$num = mysqli_stmt_affected_rows($result);
		echo "Number of row is $num";
		if($num==1)
		{
			$codate=time()+(60*60*24*10);
			setcookie("NoOfHit",1,$codate);
			$n=1;
			$q="update registraion set cookie='$n',coExp='$codate' where email='$cemail' ";
			$res = $conn->query($q);
			header('location:otp.php');
		}
		else
		{
			header('location:Registration.php');
		}
	}
?>