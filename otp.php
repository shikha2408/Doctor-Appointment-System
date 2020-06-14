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
<div class="login-box" style="height:600px;width:350px">
<img src="avatar.png" class="avatar">
<h1>OTP</h1>
<p>Otp is given to your email and mobile number</p>
<form action="validateOtp.php" method="post">
<p>Enter the OTP </p>
<input type="password" name="ccotp" placeholder="Enter OTP" required />


<img src="Captcha.php" height="100px" width="250px" />
<input type="text"  id="captcha" onblur="validateCatcha()" placeholder="Enter number Captcha "/>
<h4 id="h1"></h4>
<br><input type="submit" name="submit" value="Submit"><br/>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="Registration.php">Registration</a>

</form>
</div>
<script src="jquery.js"></script>
<script>
	function validateCatcha()
	{
		$(document).ready(function(){
			var capta=$('#captcha').val();
			if(capta!="")
			{
				$.ajax({
					url:"CaptchaTest.php",
					type:"post",
					data:{capta:capta},
					success:function(data,status)
					{
						if(data=="Incorrect Captcha")
						{
							$('#h1').html(data);
							$('#h1').css("color","red");
							return false;	
						}
						else
						{
							$('#h1').html("Captcha OK");
							$('#h1').css("color","green");	
						}
					}
				
				});
			}
		
		
	});
	}

</script>
</body>
</html>