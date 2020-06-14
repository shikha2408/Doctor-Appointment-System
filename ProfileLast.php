<?php
	session_start();
	$image="";
	$email="";
	if(isset($_SESSION['email']))
	{
		$email=$_SESSION['email'];
		$name =$_SESSION['Name'];
		include('DatabaseConnection.php');
		//$email=$_SESSION['email'];
	
		$query ="select name,gender,email,product_number,mobile,regdate,image from `registraion` where email='$email' ";
	
		$result = $conn->query($query);
		$num =  $result->num_rows;
		if($num==1)
		{
			$row = $result->fetch_assoc();
			$name = $row['name'];
			$gender = $row['gender'];
			$ema = $row['email'];
			$pro = $row['product_number'];
			$mob = $row['mobile'];
			$regD = $row['regdate'];
			$image = $row['image'];
			if($image!=null)
			{
				$image = 'profileImage/'.$image;
			}
		}
	}
	else
	{
		header('location:index.html');
	}
	
	
	// User upload image section
	if(isset($_POST['submit']))
	{
		$img = $email.'.jpg';
		$sql = "update `registraion` set image='$img' WHERE email='$email' ";
		//$insert = "insert into images (name,imagename) values ('$name','$img') ";
		if(mysqli_query($conn,$sql))
		{
			move_uploaded_file($_FILES['profileImage']['tmp_name'],"profileImage/$img");
			echo "<script>alert('image is uploaded')</script>";
		}
		else
		{
			echo "<script>alert('image Does not is uploaded To folder ')</script>";
		}
	}

	

?>


<!DOCTYPE html>

<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="cssIOT/deshbord.css">
	<title>IOT</title>
	</head>
	<body>
	<div class="container-fluid header">
		<div class="row" >
			<div class="col-sm-2 headerlogo" >
				<div>
					<img src="image/iot.jpg" height="50px" width="200px" style="margin-top:10px;" />
				</div>
			</div>
			<div class="col-sm-10 headerdete" >
				<div style="margin: 15px 0 0px 1000px;">
					<a href="logout.php"><img src="image/logout.svg" height="40px" width="200px" /></a>
				</div>
			</div>
		</div>
	</div>

	
	
	<div class="container-fluid">
			<div class="row ">
				
				<div class="col-sm-2 colheight1">
					<div class="navbar">
						<div style="border-radius:100%">
						<?php
							if($image!=null)
							{
							?>
								<img src="<?php echo $image; ?>" height="80px" width="80px" style="border-radius:100%;"/><br><br> 
							<?php
							}
							else
							{
								echo '<img src="image\profile.jpg" height="80px" width="80px" style="border-radius:100%;"/><br><br>';
							}
						?>
						<label style="color:white"><b><?php echo $name; ?></b></label>;
						</div>
						<div style="margin-top:100px;">
							<img src="image/home.jpg" height="18px" width="18px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="Home.php">Home</a>
						</div><br>
						<div>
							<img src="image/user.jpg" height="18px" width="18px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="Profile.php">Profile</a>
						</div><br>
						<div>
							<img src="image/recored.jpg" height="18px" width="18px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="Records.php">Records</a>
						</div><br>
						<div>
							<img src="image/about.jpg" height="18px" width="18px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="AboutUs.php">AboutUs</a>
						</div><br>
						<div>
							<img src="image/feedback.jpg" height="18px" width="18px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="Feedback.php">FeedBack</a>
						</div><br>
						<div>
							<img src="image/logout.jpg" height="18px" width="18px" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="Logout.php" class="text-center">Log out</a>
						</div>
					</div>
				</div>
				
				
				<div class="col-md-10 colheight2"> 
				<div class="container-fluid">
					<div class="row">
					<div class="col-md-8" >
					<div class="ProfileContent">
					<label>User Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><?php echo $name; ?></label><br>
					<label>Email id</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><?php echo $ema; ?></label><br>
					<label>Gender</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><?php echo $gender; ?></label><br>
					<label>Product No</label>&nbsp;&nbsp;&nbsp;<label><?php echo $pro; ?></label><br>
					<label>Mobile</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><?php echo $mob; ?></label><br>
					<label>Reg Date</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><?php echo $regD; ?></label><br>
					<br>
					<script>var emi = "<?php echo $ema ?>"; </script>
					<button class="btn btn-info" width="200px;" data-target="#update_user_model" data-toggle="modal"  onclick="getUserDetails(emi);">Edit</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-info" width="200px;" data-target="#passwordChange" data-toggle="modal" onclick="">Change Password</button>
					<p id="upadteShow"></p>
					</div>
					
					</div>
					
					<div class="col-md-4 image">
						<div class="photo" style="margin-top:110px;">
							<!--<img src="image/user.jpg" height="200px" width="200px" /><br> -->
							<form action="ProfileLast.php" method="post" enctype="multipart/form-data" >
							<?php
							if($image!=null)
							{
							?>
								<img src="<?php echo $image; ?>" onclick="triggerClick()" id="profiledisplay" height="200px" width="200px" style="border-radius:100%;" /><br>
							
							<?php
							}
							else
							{
								echo '<img src="image/user.jpg" onclick="triggerClick()" id="profiledisplay" height="200px" width="200px" style="border-radius:100%;" /><br>';
							}
							
							?>
							
							<input type="file" name="profileImage" onchange="displayImage(this)" id="profileImage" style="display:none;">
							<button type="submit" name="submit" class="btn btn-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Set Photo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>

							
						</form>
						</div>
					</div>
					
					
					</div>
					
				</div>
				</div>
				
				
			</div>
		</div>
		
<!-- Update Part start-->		
<div class="modal" id="update_user_model">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Profile</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
			<label>User Name:</label>
			<input type="text" name="" id="update_username" class="form-control" placeholder="Enter the First Name">
		</div>
		
		 <div class="form-group">
			<label>Email:</label>
			<input type="email" name="" id="update_email" class="form-control" placeholder="Enter the Email">
		</div>
		
		 <div class="form-group">
			<label>Gender</label>
			<input type="email" name="" id="update_gender" class="form-control" placeholder="Enter the Gender">
		</div>
		
		 <div class="form-group">
			<label>Product No</label>
			<input type="text" name="" id="update_pro" class="form-control" placeholder="Enter the product Number">
		</div>
		
		 <div class="form-group">
			<label>Mobile</label>
			<input type="text" name="" id="update_mobile" class="form-control" placeholder="Enter the mobile Number">
		</div>
		
		
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
		 <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="updateData()">Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		<input type="hidden" name="" id="hidden_user_id" />
      </div>

    </div>
  </div>
</div>

<!-- Change password start-->	

<div class="modal" id="passwordChange">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Change Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
			<input type="password" name="" id="password" class="form-control" placeholder="Enter the new Password">
		</div>
		
		 <div class="form-group">
			<input type="password" name="" id="cpassword" class="form-control" placeholder="Enter the confirm password">
		</div>
		
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
		 <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="changePassword(emi)">Set Password</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		<input type="hidden" name="" id="hidden_user_id" />
      </div>

    </div>
  </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="jquery.js"></script>
<script>
	function getUserDetails(email)
	{
		//alert("Function is call "+email);
		$(document).ready(function(){
			$.post("updateValidation.php",{cemail:email},function(data,status){
				var user = JSON.parse(data);				
				$('#update_username').val(user.name);
				$('#update_email').val(user.email);
				$('#update_gender').val(user.gender);
				$('#update_pro').val(user.product_number);
				$('#update_mobile').val(user.mobile);
				$('#update_regDate').val(user.regdate);
			});
			$('#update_user_model').modal('show');
		});
	}
	
	
	function updateData()
	{
		var name=$('#update_username').val();
		var email=$('#update_email').val();
		var gender=$('#update_gender').val();
		var prod=$('#update_pro').val();
		var mobile=$('#update_mobile').val();
		if(mobile.length!=10)
		{
			alert("Mobile number must be 10 digit number");
			return false;
		}
		var num=parseInt(mobile.substring(0,1));
		if(num < 5)
		{
			alert("First letter of mobile number must be gerther the 5 ");
			return false;
		}
					
		if(name=="")
		{
			alert("Please enter the Username");
			return false;
		}
		var s=name.substring(0,1);
		if(isNaN(s)==false)
		{
			alert("First Name should be Letter ");
			return false;
		}
		if(prod.length==0)
		{
			alert("Enter the Product Number !!!!");
			return false;
		}
		
		$.post("updateValidation.php",{
			rec:'update',
			name:name,
			email:email,
			gender:gender,
			prod:prod,
			mobile:mobile
		},function(data,status)
		{
			$('#upadteShow').html(data);
			$('#upadteShow').css("color","green");
			location.reload(true);
		}
		);
	}
	
	
	function changePassword(emi)
	{
		var pass=$('#password').val();
		var cpass=$('#cpassword').val();
		if(pass!=cpass)
		{
			$('#upadteShow').html("Password Not Matched");
			$('#upadteShow').css("color","red");
			return false;
		}
		if((pass.length >= 6 && pass.length < 13)==false && (pass.length >= 6 && pass.length < 13)==false)
		{
			alert("Password range between 6 to 13");
			return false;
		}
		let numUpper = pass.search(/[A-Z]/g);
		let numLower = pass.search(/[a-z]/g);
		let spcal = pass.search(/[!`~@#$%^&*=+]/g);
		let digit = pass.search(/[0-9]/g);
		if(numUpper==-1)
		{
			$("#upadteShow").html("Upper case letter missing");
			$("upadteShow").css("color","red");
			return false;
		}
		else if(numLower==-1)
		{
			$("#upadteShow").html("Lower case letter missing");
			$("#upadteShow").css("color","red");
			return false;
		}
		else if(spcal==-1)
		{
			$("#upadteShow").html("Special character case letter missing");
			$("#upadteShow").css("color","red");
			return false;
		}
		else if(digit==-1)
		{
			$("#upadteShow").html("Digit letter missing");
			$("#upadteShow").css("color","red");
			return false;
		}

		$.post("updateValidation.php",{emi:emi,pass:pass},
		function(data,status)
		{
			$('#upadteShow').html(data);
			$('#upadteShow').css("color","green");
		}
		);
	}
</script>


<script>

    function triggerClick(){

         document.querySelector("#profileImage").click();
    }

    function displayImage(e){
        if(e.files[0]){
            var reader = new FileReader();
            
            reader.onload = function(e) {
                
                document.querySelector("#profiledisplay").setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>




	</body>
</html>