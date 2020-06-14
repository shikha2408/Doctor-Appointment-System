<?php
session_start();
	if(isset($_POST['capta']))
	{
		$error='';
		if($_POST['capta']==$_SESSION['captcha_text'])
		{
			echo "Captcha is successfully";
		}
		else
		{
			echo "Incorrect Captcha";
		}
	}

?>