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
<form action="ForgetPassVal.php" method="post">
<p id="p1" >Email</p>
<input type="email" name="cemail" id="email" placeholder="Enter Useremail" onblur="emailCkeck()" required autocomplete="off" />

<img src="Captcha.php" height="100px" width="250px" />
<input type="text"  id="captcha" onblur="validateCatcha()" placeholder="Enter number Captcha "/>
<h4 id="h1"></h4>


<br><input type="submit" id="submit" name="submit" value="login"><br/>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="index.html">Login</a>   
</form>
</div>

<script src="jquery.js"></script>
<script>
	var stF=0;
	$(document).ready(function(){
		$("#submit").click(function(){
			if(stF!=0)
			{
				return false;
			}
			
		});
	});
	
	// EmailCheck Function start
	function emailCkeck()
	{
		$(document).ready(function(){
			var email=$('#email').val();
			
			$.ajax({
				url:"EmailCheck.php",
				type:"post",
				data:{email:email},
				success:function(data,status)
				{
					if(data=="Email is already exites")
					{
						stF=0;
					}
					else
					{
						$("#p1").html("Email does't exist");
						$("#p1").css("color","red");
						stF=1;
						return false;
					}
					
				}
			});
			
		});
		
	}
	
	
	//Function End
	
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