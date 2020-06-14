<DOCTYPE html>
<html>

<head >
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link href="cssIOT/registration.css" rel="stylesheet">
<link href="useImage/realfileFiles.ico" type="image" rel="icon" />
<title>IOT</title>
<style>
::placeholder {
  color: #454545;
  opacity: 1; /* Firefox */
  
}


</style>
</head>
<body >
<img src="image/reg.jpg" height="100%" width="100%" style="margin-top:10px;" />

	<div class="login-box">
<img src="avatar.png" class="avatar">
<h1>Register Here</h1>
<form id="form1" action="registrationValidation.php" method="post">
<p>User Name</p>
<input type="text" name="cname" id="uname" placeholder="Enter the username " autocomplete="off" required />
<p>Gender</p>
<select name="cgender" >
	<option>Enter the Gender</option>
	<option value="Male">Male</option>
	<option value="Female">Female</option>
	<option value="Transgender">Transgender</option>
</select>

<!--<input type="text" name="cgender" id="gender" placeholder="Enter the Gender " autocomplete="off" required /> -->
<p id="p1" >Email</p>
<input type="email" name="cemail" id="email" placeholder="Enter Useremail" required onblur="checkEmail()" autocomplete="on" required />
<p>Product Number</p>
<input type="text" name="cpronum" id="prono" placeholder="Enter the Product number " autocomplete="off" required />
<p id="p2" >Mobile Number</p>
<input type="number" name="cmobile" id="mobile" placeholder="Enter the Mobile Number " onblur="checkMobile()" autocomplete="off" required />
<p id="p3">Password</p>
<input type="password" name="cpassword" id="pass" placeholder="Enter your password" onblur="passwordCheck()" required />
<br><input type="submit"  value="Register"  id="submit" /><br/>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="index.html">Login</a>    &nbsp; &nbsp; &nbsp; &nbsp;<a href="ForgotPassword.php">Forget Password</a>
</form>
</div>


<script src="jquery.js"></script>
<script>
			var stopForm=0;
			$(document).ready(function(){
				
				$('#submit').click(function(){
				if(stopForm!=0)
				{
					return false;
				}
				
				var uname= $('#uname').val();
				var pronum=$('#prono').val();
					
				if(uname=="")
				{
					alert("Please enter the Username");
					return false;
				}
				var s=uname.substring(0,1);
				if(isNaN(s)==false)
				{
					alert("First Name should be Letter ");
					return false;
				}
				if(pronum.length==0)
				{
					alert("Enter the Product Number !!!!");
					return false;
				}

				});
				
				var count=0;
				$("#pass").click(function(){
					let p1=$("#pass").val();
					if(p1=="" && count==0)
					{
						count=count+1;
						alert("Enter the 1 Upper,1 Lower case char,1 Digit and 1 Sprcial char");
					}
				});
				
			});
			
			/// Function for mobile ,email and password 
				
			function checkEmail()
			{
				$(document).ready(function(){
				var email = $('#email').val();
				if(email.indexOf('@') <= 0)
				{
					alert("Invalid Email");
					return false;
				}
				if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.'))
				{
					alert("Invalid Email");
					return false;
				}
				$.ajax({
					url:"EmailCheck.php",
					type:"post",
					data:{email:email},
					success:function(data,status)
					{
						if(data=="Email success")
						{
							$("#p1").html(data);
							$("#p1").css("color","green");
						}
						else
						{
							$("#p1").html(data);
							$("#p1").css("color","red");
							return false;
						}
					}
					
				});

					
				});
			}
			//function Over
			
			
			function checkMobile()
			{
				
				$(document).ready(function(){
				var mobile = $('#mobile').val();
				if(mobile.length != 10)
				{
					alert("Enter only 10 digits Mobile number ");
					$("#p2").html("Enter only 10 digits Mobile numbers");
					$("#p2").css("color","red");
					return false;
				}
				var num=parseInt(mobile.substring(0,1));
				if(num <= 5)
				{
					alert("First digit of mobile number must be gerther the 5 ");
					$("#p2").html("First digit of mobile number must be gerther the 5");
					$("#p2").css("color","red");
					return false;
				}
				
				$.ajax({
					url:"EmailCheck.php",
					type:"post",
					data:{mobile:mobile},
					success:function(data,status)
					{
						if(data=="Mobile success")
						{
							$("#p2").html(data);
							$("#p2").css("color","green");
						}
						else
						{
							$("#p2").html(data);
							$("#p2").css("color","red");
							return false;
						}
						
					}
					
				});
				});
			}
			
			//MobileCheck function over
			
			function passwordCheck()
			{

				$(document).ready(function(){
				let password=$('#pass').val();
				if(password!="")
				{	
					let numUpper = password.search(/[A-Z]/g);
					let numLower = password.search(/[a-z]/g);
					let spcal = password.search(/[!`~@#$%^&*=+]/g);
					let digit = password.search(/[0-9]/g);
					
						if((password.length >= 6 && password.length < 13)==false)
						{
							alert("Password should be 6 to 12 words ");
							return false;
						}
						if(numUpper==-1)
						{
							$("#p3").html("Upper case letter missing");
							$("#p3").css("color","red");
							stopForm=1;
							return false;
						}
						else if(numLower==-1)
						{
							$("#p3").html("Lower case letter missing");
							$("#p3").css("color","red");
							stopForm=1;
							return false;
						}
						else if(spcal==-1)
						{
							$("#p3").html("Special character case letter missing");
							$("#p3").css("color","red");
							stopForm=1;
							return false;
						}
						else if(digit==-1)
						{
							$("#p3").html("Digit letter missing");
							$("#p3").css("color","red");
							stopForm=1;
							return false;
						}
						else
						{
							$("#p3").html("password success");
							$("#p3").css("color","green");
							stopForm=0;
						}
					}
				});
				
			}
			
</script>

</body>


</html>