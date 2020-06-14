<?php
	session_start();
	$image="";
	if(isset($_SESSION['email']))
	{
		$name =$_SESSION['Name'];
		if(isset($_SESSION['image']))
		{
			$image=$_SESSION['image'];
		}	
	}
	else
	{
		header('location:index.html');
	}
?>


<!DOCTYPE html>

<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="cssIOT/deshbord.css">
	<title>IOT</title>
	</head>
	<body>
	<div class="container-fluid header">
		<div class="row" >
			<div class="col-md-2 headerlogo" >
				<div>
					<img src="image/iot.jpg" height="50px" width="200px" style="margin-top:10px;" /><br>
				</div>
			</div>
			<div class="col-md-10 headerdete" >
				<!--<div style="margin: 15px 0 0px 1000px;">
					<a href="logout.php"><img src="image/logout.svg" height="40px" width="200px" /></a>
				</div>-->
			</div>
		</div>
	</div>

	
	
	<div class="container-fluid">
			<div class="row ">
				
				<div class="col-md-2 colheight1">
					<div class="navbar">
						<div>
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
							<label style="color:white"><b><?php echo $name; ?></b></label>
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
							<a href="Records.php">Appointments</a>
						</div><br>
						<div>
							<img src="image/about.jpg" height="18px" width="18px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="#">AboutUs</a>
						</div><br>
						<div>
							<img src="image/feedback.jpg" height="18px" width="18px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="Feedback.php">FeedBack</a>
						</div><br>
						<div>
							<img src="image/calendar.png" height="18px" width="18px" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="calendar.html" class="text-center">Google Calendar</a>
						</div>
						<div>
							<img src="image/logout.jpg" height="18px" width="18px" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="Logout.php" class="text-center">Log out</a>
						</div>
					</div>
				</div>
				
				
				<div class="col-md-10 colheight2"> 
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12 bigImage">
								<img src="image/group.jpg" height="100%" width="100%"/>
							</div>
						</div>
					
					</div>
					
					
					
				</div>
				
				
			</div>
		</div>
	</body>
</html>