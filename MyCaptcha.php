<?php session_start(); ?>

<?php
    if(isset($_POST['txtName']))
	{
        $error = '';
        if(isset($_POST['txtCaptcha']) and $_POST['txtCaptcha'] !='')
		{
            if($_SESSION['captcha_text'] == $_POST['txtCaptcha'])
			{
                // Action of form...
                echo $_POST['txtName'].' is successfully processed';
                exit;
            }else
			{
                $error = '<font color="red">Sorry Incorrect captcha entered...</font>';
            }
        }else{
            $error = '<font color="red">You have not entered captcha.</font>';
        }
    }
?>

<html>
	<head></head>
	<body>
	<?php if(isset($error)){ echo $error; } ?>
		<form action="MyCaptcha.php" method="post">
			<input type="text" name="txtName" placeholder="Enter the name" />
			<br><br>
			<img src="Captcha.php" height="100px" width="250px" /> &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtCaptcha" placeholder="Enter number "/>
			<br>
			<input type="submit" value="Submit Form" name="submit" />
		
		</form>
	</body>
</html>