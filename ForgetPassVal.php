<?php
	session_start();
	if($_POST['submit'])
	{
		include('DatabaseConnection.php');
		extract($_POST);
		$query = "select email from `registraion` where email='$cemail' ";
		$result = $conn->query($query);
		$num =  $result->num_rows;
		$row = $result->fetch_assoc();
		if($row['email']==$cemail)
		{
			$_SESSION['email']=$cemail;
		}
		else
		{
			header('location:ForgotPassword.php');
		}
	}		
	
?>

<DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link href="cssIOT/login.css" rel="stylesheet">
<link href="useImage/realfileFiles.ico" type="image" rel="icon" />
<title>IOT</title>
<style>
::placeholder {
  color: #454545;
  opacity: 1; /* Firefox */
}
</style>
</head>
<body>
<div class="login-box">
<img src="avatar.png" class="avatar">
<h1>Forgot Password</h1>
<form action="ForgotValidation.php" method="post">
<p>New Password</p>
<input type="password" id="pass" name="pass" placeholder="Enter new password" required  />
<p>Confirm Password</p>
<input type="password" name="cpass" id="cpass" placeholder="Enter new password" required />
<p id="p3"></p>
<br><input type="submit" id="submit" name="submit" value="Reset Password"><br/>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="index.html">Login</a>   
</form>
</div>

<script src="jquery.js"></script>
<script>
	
	$(document).ready(function(){
		$('#submit').click(function(){
			var pass=$('#pass').val();
			var cpass=$('#cpass').val();
			
			
			if((pass.length >= 6 && pass.length < 13)==false && (pass.length >= 6 && pass.length < 13)==false)
			{
				alert("Password range between 6 to 13");
				return false;
			}
			
			if(pass!=cpass)
			{
				alert("Your Password not match");
				return false;
			}
			let numUpper = pass.search(/[A-Z]/g);
			let numLower = pass.search(/[a-z]/g);
			let spcal = pass.search(/[!`~@#$%^&*=+]/g);
			let digit = pass.search(/[0-9]/g);
			if(numUpper==-1)
			{
				$("#p3").html("Upper case letter missing");
				$("#p3").css("color","red");
				return false;
			}
			else if(numLower==-1)
			{
				$("#p3").html("Lower case letter missing");
				$("#p3").css("color","red");
				return false;
			}
			else if(spcal==-1)
			{
				$("#p3").html("Special character case letter missing");
				$("#p3").css("color","red");
				return false;
			}
			else if(digit==-1)
			{
				$("#p3").html("Digit letter missing");
				$("#p3").css("color","red");
				return false;
			}
			else
			{
				$("#p3").html("password success");
				("#p3").css("color","green");
			}
			
				
		});
	});

</script>


</body>
</html>



