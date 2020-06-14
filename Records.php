<?php
	session_start();
	$image="";
	if(isset($_SESSION['email']))
	{
		$email=$_SESSION['email'];
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
	<style>
		.my-custom-scrollbar
		{
			position: relative;
			height: 90%;
			overflow: auto;
		}
		.table-wrapper-scroll-y {
		display: block;
		}

	</style>
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
				<div style="margin: 15px 0 0px 1000px;">
					<a href="logout.php"><img src="image/logout.svg" height="40px" width="200px" /></a>
				</div>
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
							<a href="FeedBack.php">FeedBack</a>
						</div><br>

						<div>
							<img src="image/calendar.png" height="18px" width="18px" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="calendar.html" class="text-center"  target="_parent" >Google Calendar</a>
						</div>
						<div>
							<img src="image/logout.jpg" height="18px" width="18px" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="Logout.php" class="text-center">Log out</a>
						</div>
					</div>
				</div>
				
				
				<div class="col-md-10 colheight2"> 
					<div style="width:100%"> 
					<table><tr><td><h2 class="text-danger">All Records </h2></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type="button"  class="btn btn-primary" id="btnExport" value="Print Pdf" onclick="Export()" /></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder="Search......" style="width:300px;height:35px" /></td></tr></table>
					</div>
					
					<div class="table-wrapper-scroll-y my-custom-scrollbar mytable">
						

						<div>
							<table class="table table-bordered table-striped mb-0" id="tblCustomers" >
								<tr>
								<th>S.no</th>
								<th>Name</th>
								<th>Email</th>
								<th>Contact</th>
								<th>Expertise in </th>
								<th>Address</th>
								<th>Fees</th>
								<th>Book</th>
								</tr>
								<tr>
									<td id="1">1</td>
									<td ><label id="name2"></label></td>
									<td id="email2"></td>
									<td id="contact2"></td>
									<td id="expertisedoc2"></td>
									<td id="add2"></td>
									<td id="fee2"></td>
									<td id="1"></td>

								</tr>
						</table>

								<div class="search" style="background-color:;">
		<h3 class="text-center" style="background-color:#272327;color: #fff;padding: 5px;">Search Here</h3>

		 <div class="formstyle" style="padding:70px;border: 1px solid lightgrey;margin-right: 293px;margin-bottom: 30px;background-color:#f3f3f8;color:#141313;width: 530px;margin-left: 400px;">
					<form action="" method="post" class="form-group">

					<!-- testing -->
					<label>
						Search By:<select  id="address" name="address" type="text" style="width: 110px;margin-right: 175px;">
												<option>-Select-</option>
												<option value="banglore">banglore</option>
												<option value="chennai">chennai</option>
												<option value="Delhi">Delhi</option>
												<option value="Mumbai">Mumbai</option>
												
											</select>

					</label><br><br>
					<!-- testing end-->

					<label>
						 Category:<select name="expertise" id="expertise" type="text" style="width: 110px;margin-right: 175px;">
												<option>-Select-</option>
												<option value="Medicine">Medicine</option>
												<option value="Bone">Bone</option>
												<option value="Neurologis">Neurologist</option>
												<option value="kedney">kedney</option>
												<option value="Cardiologist">Cardiologist</option>
												<option value="Plastic Surgeon">Plastic Surgeon</option>
												<option value="General Physician">General Physician</option>
											</select>

					</label>
					<button name="submit"  onclick="getData()" style="border-radius: 3px;color:#000;margin-left: 145px;margin-top: 8px;">Search</button>
					<br>
					
					</form>



					
		 	</div>
	</div>
								
								<?php 
									include('DatabaseConnection.php');
									$query = "select name,email,product_number,temp,mode,datetime from `reccords` where email='$email' ";
									$result = mysqli_query($conn,$query);
									if(mysqli_num_rows($result) > 0)
									{
										$number=1;
										while($row=mysqli_fetch_array($result))
										{
											echo "<tr><td>".$number."</td><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['product_number']."</td><td>".$row['temp']."</td><td>".$row['mode']."</td><td>".$row['datetime']."</td></tr>";
											$number=$number + 1;
										}
									}
								
								?>
					
						</div>
					<div>
					
				</div>
			</div>
		</div>

		
		
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        function Export() {
            html2canvas(document.getElementById('tblCustomers'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Records.pdf");
                }
            });
        }
    </script>
		

		<script src="jquery.js"></script>
		<script>
			function getData()
			{
				//alert("Hello World");
				$(document).ready(function(){
					var address = $('#address').val();
					var exp =$('#expertise').val();
				//	alert(address + " "+exp);

					$.post("getDoctor.php",{

					address:address,
					exp:exp
				},function(data,status)
				{
					
					var user = JSON.parse(data);
					$('#name2').val(user.name);
					$('#email2').val(user.email);
					$('#contact2').val(user.contact);
					$('#expertisedoc2').val(user.expertise);
					$('#add2').val(user.address);
					$('#fee2').val(user.fee);
					
				});

				})

			}
			


/*

			function getData()
			{
				$(document).ready(function(){
				
				var address = $('#address').val();
				var exp =$('#expertise').val();
				alert(exp+" : "+address);

				$.post("getDoctor.php",{address:address,exp:exp},function(data,status){
				if(status==200)
				{
					alert("Ok success");
				}
				var user = JSON.parse(data);
				//alert(user.name+" : ");				
				$('#name2').html(user.name);
				$('#email2').html(user.email);
				$('#contact2').html(user.contact);
				$('#expertisedoc2').html(user.expertise);
				$('add2').html(user.address);
				$('#fee2').html(user.fee);
			});
		
			});

			}*/


		</script>
		
		
		
		
	</body>
</html>